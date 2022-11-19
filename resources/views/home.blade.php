@extends('layout')

@section('content')
<section class="home">
    @auth
    <div class="bg-dark text-light p-5">
        <div class="bg-dark p-5">
            <h1 class="display-4">
                Welcome, {{ Auth::user()->full_name }}!
            </h1>
            <hr>
            <a href="{{ route('user.posts') }}" class="btn btn-primary">Go to Posts</a>
        </div>
    </div>
    @endauth

    @guest
    <div class="bg-dark text-light p-5">
        <div class="bg-dark p-5">
            <h1 class="display-4">Welcome, Guest!!!</h1>
            {{-- <hr>
            <p>Please <a href="{{ route('user.signup') }}" class="">Sign-up</a> Or <a href="{{ route('user.login') }}" class="">Login</a>
            </p> --}}
        </div>
    </div>
    @endguest
</section>
@endsection