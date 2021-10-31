<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCompanyPhone extends Component
{
    public $origPhone;
    public $newPhone;
    public $userId;
    protected $rules = [
        'newPhone' => "required"
    ];
    public function mount(User $user)
    {
        $this->origPhone = $user->info->person_phone;
        $this->userId = $user->id;
        $this->updatePhone($user);
    }

    public function render()
    {
        return view('livewire.edit-company-phone');
    }

    /**
     * submit new company phone
     */
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origPhone) == strtolower($this->newPhone)){
            $this->updatePhone($user);
            return;
        }else{
            $user->info->update(['person_phone' => $this->newPhone]);
            $user->save();
            $this->updatePhone($user);
        }


    }

    /**
     * update UI text
     * @param User $user
     */
    private function updatePhone(User $user)
    {
        $this->origPhone = $user->info->person_phone;
        $this->newPhone = $this->origPhone;
    }
}
