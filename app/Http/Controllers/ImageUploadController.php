<?php

namespace App\Http\Controllers;

use App\ImageUpload;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trip/upload',
            ['id', request()->id]);

    //    return view('trip/upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $image = request()->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imageUpload = new ImageUpload;
        $imageUpload->filename = $imageName;
        $imageUpload->trip_id =  request()->id;
        Log::error(request()->all());
        $imageUpload->save();

        return response()->json(['success' => $imageName]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageUpload $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $filename = $request->get('filename');
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path() . '/images/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
