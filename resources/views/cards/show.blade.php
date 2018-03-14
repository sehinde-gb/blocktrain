@extends('layouts.app')

@section('meta-title', 'Swipe In')

@section('content')

<h1>You successfully swiped in</h1>

<h2>{{ $card->id }}</h2>
<h2>Balance: {{ $card->balance }}</h2>
<h2>Source: {{ $card->source }}</h2>

<a href="/cards/{{ $card->id }}/edit" class="btn btn-xs btn-info pull-right"><button type="submit" class="btn btn-white">Swipe Out</button></a>

@endsection

