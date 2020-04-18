@extends('layouts.master')

@section('sidebar')

@show




@section('content')
    <h2>ساخت مشخصه</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/admin/property/create" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="project">Property list:</label>
                <select class="form-control" name="parent">
                    <option  value="0">-- جدید</option>
                    @foreach($properties as $property)
                        <option value="{{$property->id}}">{{ $property->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" name="name" class="form-control">
        </div>

        <input type="hidden" name="status" value="request"></input>

        <button class="btn btn-success form-control btn-lg mb-2 mt-1">Send</button>

    </form>



@endsection


