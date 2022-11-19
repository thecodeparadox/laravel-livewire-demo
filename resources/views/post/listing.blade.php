@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-between mt-3 mb-3">
        <div class="col-4">
            <h4>Posts ({{ Auth::user()->full_name }})</h4>
        </div>
        <div class="col-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>
    </div>
    <div class="row">
        <div class="posts col-8">
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">{{ $post->status }}</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $post->title }}
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted text-end text-green">
                            <i class="bi bi-star"></i> {{ $post->likes }}
                        </h6>
                        <p class="cart-text">{{ $post->content }}</p>
                        {{-- <a href="{{ route() }}"></a> --}}
                    </div>
                </div>
            @endforeach

            {{-- <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->status }}</td>
                            <td>
                                <button type="button" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                                <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Tags</div>
                <div class="card-body">
                    <p class="card-text">

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection