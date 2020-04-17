@extends('layouts.master')

@section('sidebar')

@show




@section('content')

    @include('components.base')

    <div class="container">
        <div class="row">
            <div class="p m-1 ">

                @foreach($trips as $trip)
                    <p class="p jj-text text-center">  {{$trip->name}} </p>
                    <hr class="solid">
                @endforeach
            </div>
</div>
</div>

@endsection


