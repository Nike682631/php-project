<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\CompanyCertificate;

class CompanyCertificateContent extends Component
{

    public $title;
    public $thumbnail = [];
    public $cert_file = [];

    protected $listeners = ['fileUploaded' => 'fileUploaded'];

    protected function rules()
    {
        return [
            'title' => [ 'required', 'string'],
            'thumbnail' => [ 'required', 'array', 'min:1' ],
        ];
    }

    protected $messages = [
        'title.required' => 'Certificate Name must be provided.',
        'thumbnail.required' => 'Certificate Image must be provided.',
    ];

    public function fileUploaded($type, $uploads) {        
        
        if ($type == "thumbnail") {
            $this->thumbnail = [];
            foreach($uploads as $key => $file) {
                array_push($this->thumbnail, $file);
            }
        }else {
            $this->cert_file = [];
            foreach($uploads as $key => $file) {
                array_push($this->cert_file, $file);
            }
        }
    }

    public function create() {

        $this->validate();

        $certificate = CompanyCertificate::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title
        ]);
 
        foreach ($this->thumbnail as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyCertificateThumbnail');
        }

        foreach ($this->cert_file as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyCertificateFile');
        }
    
        Session::flash('message', __('Company certification successfully created'));

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.forms.company-certificate-content');
    }
}
