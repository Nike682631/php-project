<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCompanyEmail extends Component
{
    public $origEmail;
    public $newEmail;
    public $userId;
    protected $rules = [
        'newEmail' => "required"
    ];
    public function mount(User $user)
    {
        $this->origEmail = $user->email;
        $this->userId = $user->id;
        $this->updateEmail($user);
    }

    public function render()
    {
        return view('livewire.edit-company-email');
    }

    /**
     * submit new company email
     */
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origEmail) == strtolower($this->newEmail)){
            $this->updateEmail($user);
            return;
        }else{
            $user->update(['email' => $this->newEmail]);
            $user->save();
            $this->updateEmail($user);
        }


    }

    /**
     * update UI text
     * @param User $user
     */
    private function updateEmail(User $user)
    {
        $this->origEmail = $user->email;
        $this->newEmail = $this->origEmail;
    }
}
