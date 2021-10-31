<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCompanyName extends Component
{
    public $origName;
    public $newName;
    public $userId;
    protected $rules = [
        'newName' => "required|min:6"
    ];
    public function mount(User $user)
    {
        $this->origName = $user->info->company_name;
        $this->userId = $user->id;
        $this->updateName($user);
    }

    public function render()
    {
        return view('livewire.edit-company-name');
    }

    /**
     * submit new company name
     */
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origName) == strtolower($this->newName)){
            $this->updateName($user);
            return;
        }else{
            $user->info->update(['company_name' => $this->newName]);
            $user->save();
            $this->updateName($user);
        }


    }

    /**
     * update UI text
     * @param User $user
     */
    private function updateName(User $user)
    {
        $this->origName = $user->info->company_name;
        $this->newName = $this->origName;
    }
}
