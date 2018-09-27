@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome To Blog!</h1>
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/dashboard') }}" class = "btn btn-success">Home</a>
                @else
                    <a href="{{ url('/login') }}"  class="btn btn-primary btn-lg">Login</a>
                    <a href="{{ url('/register') }}" class="btn btn-success btn-lg">Register</a>
                @endif
            </div>
        </p>
    </div>
@endsection
  

