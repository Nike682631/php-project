<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use App\User;
use App\CompanyLikes;
use Illuminate\Support\Facades\Auth;

class CompanyCard extends Component
{

    public $userId;

    public function mount(User $user) {
        $this->userId = $user->id;
    }

    public function render()
    {
        return view('livewire.services.company-card', [
            'user' => User::findOrFail($this->userId)
        ]);
    }

    public function like($liked_id, $approve) {
        if ($approve) {
            CompanyLikes::create([
                'company_id' => Auth::user()->id,
                'liked_id' => $liked_id
            ]);
        }else {
            CompanyLikes::where('company_id', '=', Auth::user()->id)
                    ->where('liked_id', '=', $liked_id)
                    ->delete();
        }        
    }
}
