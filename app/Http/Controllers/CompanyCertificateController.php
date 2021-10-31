<?php

namespace App\Http\Controllers;

use App\CompanyCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CompanyCertificateController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        

        $this->validate(
            $request, 
            [   
                'thumbnail' => 'required|array|min:1',
                'title' => 'required|string|max:255'
            ],
            [   
                'thumbnail.required'    => 'Certificate Image must be provided.',
                'title.required' => 'Certificate Name must be provided.',
            ]
        );

        $certificate = CompanyCertificate::create([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title')
        ]);
 
        foreach ($request->input('thumbnail', []) as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyCertificateThumbnail');
        }

        foreach ($request->input('cert_file', []) as $file) {
            $certificate->addMedia(storage_path('tmp/uploads/' . $file))
                        ->toMediaCollection('CompanyCertificateFile');
        }
    
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyCertificate  $companyCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyCertificate $companyCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyCertificate  $companyCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyCertificate $companyCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyCertificate  $companyCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyCertificate $companyCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyCertificate  $companyCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompanyCertificate::destroy($id);
        return redirect()->route('home');
    }
}
