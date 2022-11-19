@extends('layout')

@section('content')
    <div class="container card">
        <form class="card-body row" method="POST" action="{{ route('posts.store') }}">
            @csrf
            <h4>{{ __('Edit') }}</h4>
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    aria-describedby="firstName" maxlength="255" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ __($message) }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">{{ __('Content') }}</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                    aria-describedby="firstName" maxlength="40" value="{{ old('content') }}" required></textarea>
                @error('content')
                    <div class="invalid-feedback">{{ __($message) }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">{{ __('Status') }}</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="option3"
                        disabled>
                    <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">{{ __('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="pass" required
                    minlength="1" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ __($message) }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" minlength="2">

                @error('password_confirmation')
                    <div class="invalid-feedback">{{ __($message) }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
        <hr>
        <div class="alert alert-primary">
            {{ __('Already a member? Please') }} <a href="{{ route('user.login') }}">
                {{ __('Login') }}
            </a>
        </div>
    </div>
@endsection
