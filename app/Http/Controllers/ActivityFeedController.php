<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityFeedController extends Controller
{
    //

    public function index() {
       $activity = Activity::all();
       return view('feed.index', compact('activity'));
    }
}
