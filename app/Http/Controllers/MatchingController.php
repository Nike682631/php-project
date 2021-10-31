<?php

namespace App\Http\Controllers;

use App\User;
use App\NovaSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\CompanyBuysItem;
use App\CompanySellsItem;

class MatchingController extends Controller
{

	public function index() {

		$companies = User::all();

		$user = Auth::user();

		// Check and Remove not exist relations
		CompanyBuysItem::checkIfRelationshipsExists();
		CompanySellsItem::checkIfRelationshipsExists();

		$relatedSellers = User::whereIn('id', $user->matchesBuy())->get();		
		$relatedBuyers = User::whereIn('id', $user->matchesSell())->get();

		$matchSettings = NovaSettings::getMatchSettings();

		// Update Last Match Seen
		$user->info->last_match_seen = Carbon::now();
		$user->info->save();

		return view('matching.index', compact('relatedSellers', 'relatedBuyers', 'matchSettings'));
	}
}
