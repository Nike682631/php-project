<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{

    public $email;
    public $name;
    public $user_type = '';
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
        ];
    }

    public function render()
    {
        return view('livewire.login-form', [
            'user_types' => User::$types
        ]);
    }

    public function createUser() {

        $this->validate();

        $user = User::create( [
			'name' => '',
			'email' => $this->email,
			'user_type' => $this->user_type,
			'password' => Hash::make( $this->password ),
		] );

        $user->assignRole('free_trial');

        Auth::login($user, $remember = true);

        return redirect()->route('register.step1');
    }
    
}
