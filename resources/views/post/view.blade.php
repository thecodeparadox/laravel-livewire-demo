@extends('layout')

@section('content')
    <div class="card">
        @include('post.partials.actions')
        @include('post.partials.content', ['showFullContent' => true])
        @include('post.partials.meta-info')
    </div>
@endsection
