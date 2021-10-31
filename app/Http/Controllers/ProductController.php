<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

		return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();

		$product = new Product($request->all());
		$product->user_id = Auth::user()->id;
		$product->save();

        $categoryIDs = explode(",", $request->get('categoryStr'));
        $product->categories()->attach($categoryIDs);

        foreach ($request->input('images', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('ProductImage');
        }

		Session::flash('message', __('Product successfully created'));

		return redirect()->route('products.show', $product->id);
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

		$product = Product::findOrFail($id);

		return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
		$product = Product::findOrFail($id);

		if(Auth::user()->id === $product->user_id) {
			$product->delete();
			Session::flash('message', __('Product deleted'));
		} else {
			Session::flash('message', __("You're not allowed to perform this action"));
		}

		return redirect()->back();

    }
}
