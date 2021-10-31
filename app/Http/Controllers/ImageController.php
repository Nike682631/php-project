<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

	public function store(Request $request)
	{
		$image = $request->file('file');

		$imageName = time().'.'.$image->extension();
		$image->move(public_path('uploads'),$imageName);

		return response()->json(['success'=>$imageName]);
	}

	public function storeMedia(Request $request) {

		$path = storage_path('tmp/uploads');
 
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
	
		$file = $request->file('file');
	
		$name = time() . '_' . trim($file->getClientOriginalName());
	
		$file->move($path, $name);
	
		return response()->json([
			'name'          => $name,
			'original_name' => $file->getClientOriginalName(),
		]);
	}
}
