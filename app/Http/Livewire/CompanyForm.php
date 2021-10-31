<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\CountryTrait;
use Illuminate\Support\Facades\Log;

class CompanyForm extends Component
{

    use CountryTrait;

    public $company_name;
    public $registration_code;
    public $vat_number;
    public $country = "AW";
    public $address;
    public $person_type = "Mr.";
    public $employees_number = "1-10";
    public $website;
    public $person_full_name;
    public $person_job_title;
    public $person_skype;
    public $person_phone;

    protected function rules()
    {
        return [
            'company_name' => [ 'required', 'string'],
            'registration_code' => [ 'required', 'string'],
            'vat_number' => [ 'required', 'string'],
            'country' => [ 'required', 'string'],
            'address' => [ 'required', 'string'],
            'person_type' => [ 'required', 'string'],
            'employees_number' => [ 'required', 'string'],
            'website' => [ 'required', 'string'],
            'person_full_name' => [ 'required', 'string'],
            'person_job_title' => [ 'required', 'string'],
            'person_phone' => [ 'required', 'string'],
        ];
    }

    public function render()
    {
        $user = Auth::user();

        if ($user != null) {
            if($user->info == null) {
                $user->info = new UserInfo();
            }else {
                $this->company_name = $user->info->company_name;
                $this->registration_code = $user->info->registration_code;
                $this->vat_number = $user->info->vat_number;
                $this->country = $user->info->country;
                $this->address = $user->info->address;
                $this->person_type = $user->info->person_type;
                $this->employees_number = $user->info->employees_number;
                $this->website = $user->info->website;
                $this->person_full_name = $user->info->person_full_name;
                $this->person_job_title = $user->info->person_job_title;
                $this->person_skype = $user->info->person_skype;
                $this->person_phone = $user->info->person_phone;
            }            
        }

        $countries = $this->getAllCountries();

        return view('livewire.company-form', compact(['user', 'countries']));
    }

    public function saveUserInfo() {
        $this->validate();

        $user = Auth::user();

        // Common Country Name
        // $countries = new Countries();
        // $country = $countries->where('cca2', $this->country)->first()->name->common;
        if($user->info == null) {
            $userInfo = new UserInfo();
        }else {
            $userInfo = $user->info;
        }

		$userInfo->company_name      = $this->company_name;
		$userInfo->registration_code = $this->registration_code;
		$userInfo->vat_number        = $this->vat_number;
		$userInfo->country           = $this->country;
		$userInfo->address           = $this->address;
		$userInfo->employees_number  = $this->employees_number;
		$userInfo->person_type       = $this->person_type;
		$userInfo->person_full_name  = $this->person_full_name;
		$userInfo->website           = $this->website;
		$userInfo->person_job_title  = $this->person_job_title;
		$userInfo->person_skype      = $this->person_skype;
		$userInfo->person_phone      = $this->person_phone;
		$userInfo->public      		 = false;

		$userInfo->save();

		$user->user_info_id = $userInfo->id;

		$user->save();

        return redirect()->route('register.step2');
    }
}
