<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Category;
use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serviceCategories = Category::serviceCategories()->get();
        $productCategories = Category::productCategories()->get();

        /*if(Auth()->user()) {
            return redirect()->route('feed');
        }*/

        return view( 'frontend.home', compact('serviceCategories', 'productCategories'));
    }

    public function showPage($slug) {
    	// $page = Page::findOrFail($slug);
        $page = Page::where('slug', $slug)->first();
        if ($page == null) die('TODO: Error 404');
    	return view('pages.show', compact('page'));
	}
}
