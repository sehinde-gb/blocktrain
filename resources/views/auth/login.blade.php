@extends('layouts.app')

@section('meta-title', 'Login Page')

@section('content')

<div id="app">
    <form method="POST" action="{{ url('/login') }}" @submit.prevent="onSubmit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="control">

            <label for="username" class="label">Username</label>

            <input type="text" id="username" name="username" class="input" v-model="username">

        </div><!-- /.control -->



        <div class="control">
            <label for="password" class="label">Password</label>

            <input type="password" id="password" name="password" class="input" v-model="password">
        </div><!-- /.control -->





        <div class="control">
            <button class="button is-primary">Login</button><!-- /.button -->

        </div><!-- /.control -->

    </form>
</div><!-- /#app -->




@endsection

