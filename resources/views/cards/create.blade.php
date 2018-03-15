
@extends('layouts.app')

@section('meta-title', 'Create Card')

@section('content')

    <div class="row">
    {!! Form::model($card = new \App\Card,  ['files'=>true, 'url' => 'cards']) !!}
    @include('cards.form', ['submitButtonText' => 'Create Card'])
    {!! Form::close() !!}

    </div><!-- /.row -->


@endsection

