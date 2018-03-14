@extends('layouts.app')

@section('meta-title', 'Swipe Out')

@section('content')

    <h1>{{ $card->source }}</h1>

    {!! Form::model($card, array('route' => array('cards.update', $card->id), 'method' => 'PUT')) !!}

    @include('cards.form', ['submitButtonText' => 'Swipe'])


    {!! Form::close() !!}

@endsection

