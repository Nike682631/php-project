<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Str;
use Livewire\Component;

class EditCompanyEmployee extends Component
{
    public $origEmployeeNb;
    public $newEmployeeNb;
    public $userId;
    protected $rules = [
        'newEmployeeNb' => "required|min:4"
    ];
    public function mount(User $user)
    {
        $this->origEmployeeNb = $user->info->employees_number;
        $this->userId = $user->id;
        $this->updateEmployee($user);
    }
    public function render()
    {
        return view('livewire.edit-company-employee');
    }
    public function save()
    {
        $this->validate();
        $user = User::findOrFail($this->userId);
        if(strtolower($this->origEmployeeNb) == strtolower($this->newEmployeeNb)){
            $this->updateEmployee($user);
            return;
        }else{
            $user->info->update(['employees_number' => $this->newEmployeeNb]);
            $user->save();
            $this->updateEmployee($user);
        }



    }
    private function updateEmployee(User $user)
    {
        $this->origEmployeeNb = $user->info->employees_number;
        $this->newEmployeeNb = $this->origEmployeeNb;
    }
}
