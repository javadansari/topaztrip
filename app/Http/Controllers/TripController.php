<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Trip;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //   $trips = Trip::get()->orderBy('id', 'desc')->take(2)->get()->reverse();

        $trips = Trip::take(20)->orderBy('id', 'desc')->get()->reverse();

        return view('trip/index',
            ['trips' => $trips]

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trip/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {


        $validate_data = Validator::make(request()->all(), [
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|mimes:jpg,jpeg|max:10240',
        ])->validated();
        $trip = Trip::create([
            'name' => $validate_data['name'],
            'description' => $validate_data['description'],
            'slug' => $validate_data['name'],
            'userID' => 0,
            'picture' => $this->uploadImages($validate_data['file']),
        ]);
        foreach (array_keys(request()->all()) as $item) {
            if (strpos(($item), 'tag') !== false) {
                Tag::create([
                    'tripID' => $trip->id,
                    'PropertiesID' => request()->$item,
                    'value' => 0,
                ]);
            }
        }

        return redirect('/trip/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
dd(request()->all());
        return view('trip/show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImages($file)
    {
        $destinationPath = public_path("/upload/images/");
        $filename = Hash::make('secret') . '.jpg';
        $file->move($destinationPath, $filename);
        return $filename;
    }

}
