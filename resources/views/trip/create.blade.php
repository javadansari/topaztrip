@extends('layouts.master')

@section('sidebar')

@show




@section('content')
    @if(request()->id == null)
        @include('components.create')
    @else
        {{--@include('components.upload', ['id' => request()->id])--}}
        @php(return view('uploadImage'))
    @endif
@endsection


