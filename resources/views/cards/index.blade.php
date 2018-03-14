@extends('layouts.app')

@section('meta-title', 'Card Listings')

@section('content')

        <h1>Click a card to Swipe In</h1>

        @if ( !$cards->count() )
            You have no cards
        @else
            <ul>
                @foreach( $cards as $card )
                    <li><a href="{{ route('cards.show', $card) }}">{{ $card->id }}</a></li>
                @endforeach
            </ul>
        @endif




@endsection

