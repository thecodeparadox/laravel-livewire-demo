<main class="container">
    <div class="posts-listing">
        <div class="row justify-content-between mt-3 mb-3">
            <div class="col-8 d-flex">
                <h4 class="flex-grow-1">Your Posts ({{ Auth::user()->full_name }})</h4>
                <div>
                    <a class="btn btn-primary" href="{{ route('posts.create') }}">
                        <i class="bi bi-pencil-fill"></i> {{ __('Create Post') }}
                    </a>
                </div>
            </div>
            <div class="col-4">
                <form class="d-flex" role="search" wire:submit.prevent="save">
                    <input class="form-control me-2" type="search" placeholder="Search By Title" aria-label="Search" wire:model="search">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="posts col-8">
                @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-header d-flex">
                        <div class="flex-grow-1">
                            {{ $post->status }}
                        </div>
                        <div class="actions">
                            @auth
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-outline-success btn-sm" title="{{ __('Edit') }}">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a title="{{ __('Delete') }}" href="#" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </a>
                            @endauth
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $post->title }}
                        </h4>
                        <h6 class="card-subtitle mb-2 text-muted text-end text-green">
                            <i class="bi bi-star"></i> {{ $post->likes }}
                        </h6>
                        <p class="cart-text">
                            {{ $post->short_content }} <a href="{{ route('posts.view',$post->slug) }}"><i class="bi bi-eye-fill"></i></a>
                        </p>
                        <p class="cart-text mb-0 text-end">
                            @foreach ($post->tags as $tag)
                            <span class="badge bg-secondary">{{ __($tag->name) }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
                @endforeach
                <div aria-label="Page navigation">
                    {{ $posts->links() }}
                </div>
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
</main>