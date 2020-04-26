<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Trip;

use http\Env\Response;
use Illuminate\Database\Query\Builder;
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

    public function jj()
    {


        return view('trip/jj'


        );
    }

    public function search()
    {
        $validate_data = Validator::make(request()->all(), [
            'search' => '',
            'hows' => '',
            'prices' => '',
        ])->validated();

//        $tags = Tag::Where('PropertiesID', $validate_data['hows'])
//            ->orWhere('PropertiesID', $validate_data['prices'])
//            ->get();
        //  dd($tags, $validate_data['hows'], $validate_data['prices']);

//        $trips = Trip::has('tags')
//            ->where('property_id',$validate_data['hows'])

        if ($validate_data['hows'] == 0 and $validate_data['prices'] == 0) {

            $trips = Trip::
            where('name', 'like', '%' . $validate_data['search'] . '%')
                ->get();
        } elseif ($validate_data['hows'] == 0) {
            $trips = Trip::
            WhereHas('tags', function ($query) use ($validate_data) {
                $query->where('property_id', $validate_data['prices']);
            })
                ->where('name', 'like', '%' . $validate_data['search'] . '%')
                ->get();
        } elseif ($validate_data['prices'] == 0) {
            $trips = Trip::
            whereHas('tags', function ($query) use ($validate_data) {
                $query->where('property_id', $validate_data['hows']);
            })
                ->where('name', 'like', '%' . $validate_data['search'] . '%')
                ->get();
        } else {
            $trips = Trip::
            whereHas('tags', function ($query) use ($validate_data) {
                $query->where('property_id', $validate_data['hows']);
            })
                ->WhereHas('tags', function ($query) use ($validate_data) {
                    $query->where('property_id', $validate_data['prices']);
                })
                ->where('name', 'like', '%' . $validate_data['search'] . '%')
                ->get();
        }

//        $trips = Trip::whereHas('tags',function (Builder $query){
//                $query->where('id', 11);
//
//            })->get();

        //      dd($trips);
//
        //      $tags = Trip::find(18)->tags()->where('id', '6')->first();


        // $trips = Trip::find(18)->tag;
        //   $trips = Trip::has('tags')->get();
        //      dd($tags);

//        $trips = Trip::whereHas('tags',function (Builder $query){
//                $query->where('id', 11);
//
//            })->get();
        //where('PropertiesID', 0)

        //     ->orWhere('name', 'like', '%' . $validate_data['search'] . '%')

        //   $trips = Trip::take(20)->orderBy('id', 'desc')->get()->reverse();

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
                    'trip_id' => $trip->id,
                    'property_id' => request()->$item,
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
        $trip = Trip::where('id', request()->id)->get();
        return view('trip/show',
            ['trip' => $trip[0]]
        );
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
        $filename = MD5(Hash::make('secret') . Carbon::now()->toDateTimeString() . rand(1, 999)) . '.jpg';
        $file->move($destinationPath, $filename);
        return $filename;
    }

}