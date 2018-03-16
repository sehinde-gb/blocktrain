@extends('layouts.app')

@section('meta-title', 'Start Journey')

@section('content')


    <div id="app">
        <div class="row justify-content-center">
            <div class="col-6">
                One of two columns
            </div>
            <div class="col-6">


            <form method="POST" action="{{ url('/journeys/create') }}" @submit.prevent="onSubmit">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="control">
                <label for="start" class="label">Start</label>

                <input type="text" id="start" name="start" class="input" v-model="form.start">
            </div><!-- /.control -->

        </form>
            </div>
        </div>
    </div><!-- /#app -->






@endsection

