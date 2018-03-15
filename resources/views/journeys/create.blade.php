@extends('layouts.app')

@section('meta-title', 'Start Journey')

@section('content')


    <div class="row">
        {!! Form::model($journey = new \App\Journey,  ['files'=>true, 'url' => 'journeys']) !!}
        @include('journeys.form', ['submitButtonText' => 'Swipe'])
        {!! Form::close() !!}

    </div><!-- /.row -->







@endsection

