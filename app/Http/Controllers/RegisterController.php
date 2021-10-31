<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function step1Action() {
		$step = 1;
		return view('auth.register', compact('step'));
	}

	public function step1_1Action() {

		$plans = Plan::all();
        $planId = 1;
		$step = 1;

		return view('auth.register.step1', compact(['plans', 'planId', 'step']));
	}

	public function step2Action() {
		$step = 2;
		return view('auth.register.step2', compact(['step']));
	}

	public function step3Action() {
		$step = 3;
		return view('auth.register.step3', compact(['step']));
	}
}
