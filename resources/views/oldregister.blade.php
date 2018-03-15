@extends('layouts.app')

@section('meta-title', 'Tell us about yourself')

@section('content')

<div id="app">


    <form method="POST" action="{{ url('/register') }}" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="control">
            <label for="username" class="label">Username</label>

            <input type="text" id="username" name="username" class="input" v-model="form.username">
        </div><!-- /.control -->
        <div class="control">
            <span class="help is-danger" v-if="form.errors.has('firstName')" v-text="form.errors.get('firstName')"></span><!-- /.help -->
            <label for="firstName" class="label">First Name</label>

            <input type="text" id="firstName" name="firstName" class="input" v-model="form.firstName">

        </div><!-- /.control -->

        <div class="control">
            <span class="help is-danger" v-if="form.errors.has('lastName')" v-text="form.errors.get('lastName')"></span><!-- /.help -->
            <label for="lastName" class="label">Last Name</label>

            <input type="text" id="lastName" name="lastName" class="input" v-model="form.lastName">
        </div><!-- /.control -->

        <div class="control">
            <label for="email" class="label">Email</label>

            <input type="text" id="email" name="email" class="input" v-model="form.email">
        </div><!-- /.control -->


        <div class="control">
            <label for="password" class="label">Password</label>

            <input type="password" id="password" name="password" class="input" v-model="form.password">
        </div><!-- /.control -->

        <div class="control">
            <label for="password_confirmation"  class="label">Confirm Password</label>

            <input id="password_confirmation"
                   type="password"
                   id="password_confirmation"
                   class="input"
                   name="password_confirmation"
                   placeholder="Confirm password">
        </div><!-- /.control -->



        <div class="control">
            <button class="button is-primary" :disabled="form.errors.any()">Create</button><!-- /.button -->

        </div><!-- /.control -->

    </form>

</div><!-- /#app -->





@endsection


