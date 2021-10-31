<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller {
	//
	public function index() {
			// Logic goes here
			/* Show only 3 companies for guests*/
			$companiesPerPage = 2;

			if(Auth::user()) {
				$companiesPerPage = 10;
			}


			$category  = Category::find( 1 );
			$companies = User::paginate($companiesPerPage);
			$type       = 'services';


			return view( 'category.show', [
				'category' => $category,
				'companies' => $companies,
				'cat_id' => -1,
				'type' => $type
			] );
	}
	public function companies() {

		/* Show only 3 companies for guests*/
		$companiesPerPage = 2;

		if(Auth::user()) {
			$companiesPerPage = 10;
		}


		$category  = Category::find( 1 );
		$companies = User::paginate($companiesPerPage);
		$type       = 'services';


		return view( 'category.show', [
			'category' => $category,
			'companies' => $companies,
			'type' => $type
		] );

	}

	public function showProductCategories() {
		/* Show only 3 companies for guests*/
		$companiesPerPage = 2;

		if(Auth::user()) {
			$companiesPerPage = 10;
		}

		$category  = Category::find( 2 );
		$companies = User::paginate($companiesPerPage);
		$type      = 'products';


		return view( 'category.show', [
			'category' => $category,
			'companies' => $companies,
			'type' => $type
		] );
	}

	public function productCategories() {

		/* Show only 3 companies for guests*/
		$companiesPerPage = 2;

		if(Auth::user()) {
			$companiesPerPage = 10;
		}


		$category  = Category::find( 5 );
		$companies = User::paginate($companiesPerPage);
		$type = 'products';

		return view( 'category.show', compact( 'category', 'companies', 'type' ) );
	}

	public function showAllCategories() {

		/* Get all top level categories */
		$topLevelCategories = Category::topLevelCategories()->get();	

		return view( 'category.index', compact( 'topLevelCategories' ) );
	}

	public function show( $id ) {

		/* Show only 3 companies for guests*/
		$companiesPerPage = 2;

		if(Auth::user()) {
			$companiesPerPage = 10;
		}

		$category  = Category::find( $id );
		$companies = User::getCompaniesByCategory($id)->paginate($companiesPerPage);
		$type      = 'products';

		$type      = 'services';

		return view( 'category.show', [
			'category' => $category,
			'companies' => $companies,
			'cat_id' => $id,
			'type' => $type
		] );
	}



	public function showProduct( $id ) {

		/* Show only 3 companies for guests*/
		$companiesPerPage = 2;

		if(Auth::user()) {
			$companiesPerPage = 10;
		}

		$category  = Category::find( $id );
		$companies = User::getCompaniesByCategory($id)->paginate($companiesPerPage);
		$type      = 'products';



		return view( 'category.products', [
				'category' => $category,
				'companies' => $companies,
				'type' => $type,
				'cat_id' => $id,
			]
		);
	}
}
