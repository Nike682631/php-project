<?php

namespace App\Http\Controllers;

use App\LogisticsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use PragmaRX\Countries\Package\Countries;

class LogisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$requests = LogisticsRequest::all();
		return view('logistics.index', compact('requests'));
    }

	public function indexType($type)
	{
        $typeIndex = 0;
		switch($type) {
            case 'air-freight':
                $typeIndex = 1;
                break;
            case 'cargo-truck':
                $typeIndex = 2;
                break;
            case 'courier':
                $typeIndex = 3;
                break;
            case 'container-ship':
                $typeIndex = 4;
                break;
            case 'train':
                $typeIndex = 5;
                break;
        }
		$requests = LogisticsRequest::where('request_type' , '=', $typeIndex)->get();
		return view('logistics.index', compact('requests'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('logistics.create', ['countries' => Countries::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$logisticsRequest = new LogisticsRequest($request->all());
		$logisticsRequest->user_id = Auth::user()->id;
		$logisticsRequest->pack_type = '1';
		$logisticsRequest->pickup_at = now();
		$logisticsRequest->pieces = 1;
		$logisticsRequest->request_type = $request->input('request_type');
        $logisticsRequest->origin_country = Countries::where('cca2', $logisticsRequest->origin_country)->first()->name->common;
        $logisticsRequest->destination_country = Countries::where('cca2', $logisticsRequest->destination_country)->first()->name->common;
		$logisticsRequest->save();

		Session::flash('message', __('Logistics request successfully created'));


//		return redirect()->route('logistics.show', $logisticsRequest->id);
		return redirect()->route('logistics.index');
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
		$logisticsRequest = LogisticsRequest::findOrFail($id);


		return view('logistics.show', compact('logisticsRequest'));
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
    }

    public function getCountries(Request $request) {
        dd($request->search);
    }
}
