@extends('layout')

@section('content')
<div class="container">
    <h4>Posts</h4>
    <div class="posts">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->author->full_name }}</td>
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
        </table>
    </div>
</div>
@endsection