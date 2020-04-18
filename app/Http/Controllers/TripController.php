<?php

namespace App\Http\Controllers;

use App\Trip;

use Illuminate\Http\Request;
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
        ])->validated();

        Trip::create([
            'name' => $validate_data['name'],
            'description' => $validate_data['description'],
            'slug' => $validate_data['name'],
            'userID' => 0,
            'picture' => '',
        ]);
        return redirect('/trip/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
