<main class="container">
    <div class="posts-listing">
        <div class="row justify-content-between mt-3 mb-3">
            <div class="col-8 d-flex">
                <div class="flex-grow-1 hstack">
                    <h4>{{ __('Posts') }}</h4>
                    <div wire:loading class="m-2 spinner-grow spinner-grow-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div>
                    <a class="btn btn-primary" href="{{ route('posts.create') }}">
                        <i class="bi bi-pencil-fill"></i> {{ __('Create Post') }}
                    </a>
                </div>
            </div>
            <div class="col-4">
                <form class="position-relative"" role="search" wire:submit.prevent="save">
                    <input class="form-control me-2" type="search" placeholder="Search By Title" aria-label="Search"
                        wire:model.debounce.300ms="search">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="posts col-8">
                @if ($posts->isNotEmpty())
                    <div class="posts-wrap">
                        @foreach ($posts as $post)
                            <div class="card mb-3">
                                @include('post.partials.actions')
                                @include('post.partials.content')
                                @include('post.partials.meta-info')
                            </div>
                        @endforeach
                    </div>
                    <div aria-label="Page navigation">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="alert alert-warning">No Post found</div>
                @endif
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">{{ __('Tags') }}</div>
                    <div class="card-body">
                        <p class="card-text">

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
