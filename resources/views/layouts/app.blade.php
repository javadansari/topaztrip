<head>
    <meta charset="utf-8">
    ...
    {{-- ChartScript --}}
    @if($usersChart)
        {!! $usersChart->script() !!}
    @endif
</head>



@extends('layouts.app')

@section('content')
    <h1>Users Graphs</h1>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
@endsection