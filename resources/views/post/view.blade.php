@extends('layout')

@section('content')
    <div class=" card">
        <div class="card-header d-flex">
            <div class="flex-grow-1">
                <h4>{{ $post->title }}</h4>
            </div>
            <div>
                <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-outline-success btn-sm"
                    title="{{ __('Edit') }}">
                    <i class="bi bi-pencil"></i>
                </a>
                <a title="{{ __('Delete') }}" href="#" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="cart-subheader text-end mb-2">
                <span class="badge bg-success">{{ __($post->status) }}</span>
            </div>
            <div class="content">
                {{ __($post->content) }}
            </div>
            <div class="cart-text mt-2 text-end">
                @foreach ($post->tags as $tag)
                    <span class="badge bg-secondary">{{ __($tag->name) }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
