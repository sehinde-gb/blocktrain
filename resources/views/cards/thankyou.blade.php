@extends('layouts.app')

@section('meta-title', 'Passengers')

@section('content')

    <h2>You have successfully swiped out</h2>

    <h3>Click below to return to your dashboard</h3>
    <a href="/dashboard" class="btn btn-xs btn-info pull-right"><button type="submit" class="btn btn-white">Dashboard</button></a>


@endsection
