@extends('layouts.master')

@section('sidebar')

@show




@section('content')


    <li class="nav-item">
        <a class="nav-link" href="\admin\property\create">ثبت مشخصه جدید</a>
    </li>
    @foreach($properties as $property)
        <div class="form-group col-md-6">
            <label for="exampleFormControlSelect1">{{$property->name}}</label>
            <select class="form-control" name="{{$property->name}}"  id="exampleFormControlSelect1">
                @php ($children = DB::table('properties')->get()->where('parent',$property->id))
                @foreach($children as $child)
                    <option>{{$child->name}}</option>
                @endforeach
            </select>
        </div>
    @endforeach
@endsection


