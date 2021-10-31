<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class EditCompanyDescription extends Component
{
    public $origDescription;
    public $newDescription;
    public $userId;
    protected $rules = [
        'newDescription' => "required|min:6"
    ];
    public function mount(User $user)
    {
        $this->origDescription = $user->info->description;
        $this->userId = $user->id;
        $this->updateDescription($user);
    }
    public function render()
    {
        return view('livewire.edit-company-description');
    }
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origDescription) == strtolower($this->newDescription)) {
            $this->updateDescription($user);
            return;
        }else{
            $user->info->update(['description' => $this->newDescription]);
            $user->save();
            $this->updateDescription($user);
        }


    }

    private function updateDescription(User $user)
    {
        $this->origDescription = $user->info->description;
        $this->newDescription = $this->origDescription;
    }
}
