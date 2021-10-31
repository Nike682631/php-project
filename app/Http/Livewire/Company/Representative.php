<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\CompanyRepresentative;

class Representative extends Component
{

    public $person_full_name;
    public $person_job_title;
    public $person_phone;
    public $representative_name;
    public $email;
    public $linkedin_url;
    public $phone;
    public $photo = [];
    public $selectedRepresent = -1;
    public $oldRepresent = -1;

    protected $listeners = ['photoUploaded' => 'fileUploaded'];

    public function mount() {

        $user = Auth::user();

        $this->person_full_name = $user->info->person_full_name;
        $this->person_job_title = $user->info->person_job_title;
        $this->person_phone = $user->info->person_phone;

        $this->selectedRepresent = CompanyRepresentative::first()->id;
        
    }

    protected function rules()
    {
        return [
            'representative_name' => [ 'required', 'string'],
            'email' => [ 'required', 'email' ]
        ];
    }

    protected $messages = [
        'representative_name.required' => 'Representative Name must be provided.',
        'email.required' => 'Representative Email must be provided.'
    ];

    public function fileUploaded($uploads) {        
        
        $this->photo = [];
        foreach($uploads as $key => $file) {
            array_push($this->photo, $file);
        }
    }

    public function render()
    {
        if ($this->oldRepresent != $this->selectedRepresent) {
            $this->setFields();
        }

        return view('livewire.company.representative', [
            'representatives' => Auth::user()->representatives
        ]);
    }

    public function create() {

        $this->validate();

        $user = Auth::user();

        $user->info->person_full_name = $this->person_full_name;
        $user->info->person_job_title = $this->person_job_title;
        $user->info->person_phone = $this->person_phone;

        $user->info->save();

        $representative = CompanyRepresentative::create([
            'company_id' => $user->id,
            'representative_name' => $this->representative_name,
            'email' => $this->email,
            'linkedin_url' => $this->linkedin_url,
            'phone' => $this->phone
        ]);
 
        foreach ($this->photo as $file) {
            $representative->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyRepresentative');
        }
    
        Session::flash('message', __('Company representative successfully created'));

        $this->resetFields();
    }

    public function deleteRepresent() {
        CompanyRepresentative::destroy($this->selectedRepresent);
        Session::flash('message', __('Deleted Successfully!'));
    }

    public function updateRepresent() {
        $old_represent = CompanyRepresentative::findOrFail($this->selectedRepresent);
        $old_represent->company_id = Auth::user()->id;
        $old_represent->representative_name = $this->representative_name;
        $old_represent->email = $this->email;
        $old_represent->linkedin_url = $this->linkedin_url;
        $old_represent->phone = $this->phone;

        $old_represent->save();

        foreach ($this->photo as $file) {
            $old_represent->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyRepresentative');
        }

        Session::flash('message', __('Updated Successfully!'));
    }

    public function setFields() {
        $old_represent = CompanyRepresentative::findOrFail($this->selectedRepresent);
        $this->representative_name = $old_represent->representative_name;
        $this->email = $old_represent->email;
        $this->linkedin_url = $old_represent->linkedin_url;
        $this->phone = $old_represent->phone;
        $this->oldRepresent = $this->selectedRepresent;
    }

    public function resetFields() {
        $this->representative_name = "";
        $this->email = "";
        $this->linkedin_url = "";
        $this->phone = "";
    }
}
