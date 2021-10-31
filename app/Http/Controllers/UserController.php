<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\MatchMade;
use Illuminate\Support\Facades\DB;
use App\Category;
use Livewire\WithPagination;

class UserController extends Controller
{
	use WithPagination;

	// protected $paginationTheme = 'bootstrap';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

		$user = User::find(Auth::id());
		$reviews = $user->reviews()->orderByDesc('created_at')->paginate(2);
		return view('company.show', [
			'user' => $user,
			'reviews' => $reviews
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

		$user = User::find($id);

		return view('company.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$user = User::find($id);

		return view('company.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$user = User::find($id);

		$user->info($request->all());

		$userInfo = $user->info;

		$userInfo->company_name = $request->input('company_name');
		$userInfo->description = $request->input('description');

		$userInfo->company_name      = $request['company_name'];
		$userInfo->registration_code = $request['registration_code'];
		$userInfo->vat_number        = $request['vat_number'];
		$userInfo->address           = $request['address'];
		$userInfo->employees_number  = $request['employees_number'];
		$userInfo->website           = $request['website'];
		$userInfo->person_skype      = $request['person_skype'];
		$userInfo->person_phone      = $request['person_phone'];
		$userInfo->creation_year      = $request['creation_year'];
		$userInfo->person_full_name      = $request['person_full_name'];
		$userInfo->person_job_title      = $request['person_job_title'];


		$userInfo->save($request->all());

		$userInfo->save();
		$user->save();

		Session::flash('message', __('Company details updated'));

		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function selectPlan() {
		$plans = Plan::all();
    	return view('auth.register.step1', compact('plans'));


	}


	public function userInfoStore(Request $request) {

    	$user = Auth::user();

		$userInfo = new UserInfo();

		$userInfo->company_name      = $request['company_name'];
		$userInfo->registration_code = $request['registration_code'];
		$userInfo->vat_number        = $request['vat_number'];
		$userInfo->country           = $request['country'];
		$userInfo->address           = $request['address'];
		$userInfo->employees_number  = $request['employees_number'];
		$userInfo->person_type       = $request['person_type'];
		$userInfo->person_full_name  = $request['person_full_name'];
		$userInfo->website           = $request['website'];
		$userInfo->person_job_title  = $request['person_job_title'];
		$userInfo->person_skype      = $request['person_skype'];
		$userInfo->person_phone      = $request['person_phone'];
		$userInfo->public      		=  false;

		$userInfo->save();

		$user->user_info_id = $userInfo->id;

		$user->save();


		return redirect()->route('user.payment.bank');
	}

	public function selectPlanStep2(Request $request, $planId = 1) {
		$plans = Plan::all();
    	return view('auth.register.step2', compact(['plans', 'planId']));
	}


	public function companyDetails() {
    	$user = Auth::user();
    	if($user->info) {

		} else {
    		$user->info = new UserInfo();
		}
    	return view('auth.register.company-details', compact('user'));
	}

	public function billing(Request $request) {
		/* TODO: add dynamic plan*/
		$plan = Plan::findOrFail(1);
    	$user = Auth::user();
    	return view('auth.register.step3', compact(['user', 'plan']));
	}


	public function paymentBank(Request $request) {
    	/* TODO: add dynamic plan*/
		$plan = Plan::findOrFail(1);
		Auth::user();

		return view('payments.bank', compact('plan'));
	}

	public function changeLogo(Request $request) {
		$user = Auth::user();

		$user->photo = $request->photo;

		$user->save();

		Session::flash('message', __('Logo successfully updated'));

		return redirect()->back();
	}

	public function assignBuyingCategories(Request $request) {
    	$user = Auth::user();


		$user->buys()->sync($request->input('productCategories'));

		$user->save();

		$sellers = User::whereIn('id', $user->matchesBuy())->get();	
		foreach($sellers as $seller) {
			$categoryIds = DB::table('user_category_sell_product')
							->leftJoin('user_category_buy_product', 'user_category_sell_product.category_id', '=', 'user_category_buy_product.category_id')
							->select('user_category_sell_product.category_id')
							->orderByDesc('user_category_sell_product.created_at')
							->get()
							->pluck('category_id');

			
			$category = Category::findOrFail($categoryIds[0]);
			$seller->notify(new MatchMade($category, 'sell'));
		}

		return response()->json($request->input('productCategories'));
	}

	public function assignSellingCategories(Request $request) {
		$user = Auth::user();


		$user->sells()->sync($request->input('productCategories'));

		$user->save();

		$buyers = User::whereIn('id', $user->matchesSell())->get();	
		foreach($buyers as $buyer) {
			$categoryIds = DB::table('user_category_buy_product')
							->leftJoin('user_category_sell_product', 'user_category_buy_product.category_id', '=', 'user_category_sell_product.category_id')
							->select('user_category_buy_product.category_id')
							->orderByDesc('user_category_buy_product.created_at')
							->get()
							->pluck('category_id');

			
			$category = Category::findOrFail($categoryIds[0]);
			$buyer->notify(new MatchMade($category, 'buy'));
		}

		return response()->json($request->input('productCategories'));
	}

	public function assignBuyingCategoriesServices(Request $request) {
		$user = Auth::user();


		$user->buys()->sync($request->input('serviceCategories'));

		$user->save();

		return response()->json($request->input('productCategories'));

	}

	public function changeCover(Request $request) {
		$user = Auth::user();

		$user->cover = $request->cover;

		$user->save();

		Session::flash('message', __('Cover image successfully updated'));

		return redirect()->back();
	}

	public function productsIndex($id) {
    	$user = User::findOrFail($id);
		$reviews = $user->reviews()->orderByDesc('created_at')->paginate(2);
		$products = $user->products()->paginate(10);
		$userId = $id;

		return view('company.products', compact('products', 'user', 'reviews', 'userId'));

	}


}
