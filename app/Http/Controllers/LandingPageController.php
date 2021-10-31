<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //

    public function earlyAccess() {
        return view('landing-pages.early-access');
    }
}
