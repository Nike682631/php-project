<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BillingForm extends Component
{
    public function render()
    {
        return view('livewire.billing-form');
    }

    public function saveBillingInfo() {
        return redirect()->route('register.step3');
    }
}
