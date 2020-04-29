@extends('layouts.master')

@section('sidebar')

@show



@section('content')

    @include('components.upload', ['id' => request()->id])
@endsection


