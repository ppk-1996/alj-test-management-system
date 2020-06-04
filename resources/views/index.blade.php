@extends('layouts.app')

@section('content')

<div class="container jumbotron text-center">
    <h1>Welcome to ALJ Test</h1>

    <div class="button-group pt-2">
        @auth
        <h3>Test Your PHP Skill</h3>
        <a href="{{route('test.index')}}" class="btn btn-success">Take Test</a>
        @endauth
        @guest()
        <h3>Please Log in or Register to take the test.</h3>
        <a href="/login" class="btn btn-success">Log in</a>
        <a href="/register" class="btn btn-primary">Register</a>
        @endguest
    </div>
</div>

@endsection