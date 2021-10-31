<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCompanyAddress extends Component
{
    public $origAddress;
    public $newAddress;
    public $userId;
    protected $rules = [
        'newAddress' => "required|min:6"
    ];
    public function mount(User $user)
    {
        $this->origAddress = $user->info->address;
        $this->userId = $user->id;
        $this->updateAddress($user);
    }
    public function render()
    {
        return view('livewire.edit-company-address');
    }
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origAddress) == strtolower($this->newAddress)){
            $this->updateAddress($user);
            return;
        }else{
            $user->info->update(['address' => $this->newAddress]);
            $user->save();
            $this->updateAddress($user);
        }


    }
    private function updateAddress(User $user)
    {
        $this->origAddress = $user->info->address;
        $this->newAddress = $this->origAddress;
    }
}
