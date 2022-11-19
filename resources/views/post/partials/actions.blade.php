<div class="d-flex card-header">
    <div class="flex-grow-1">
        <x-post-badge :post="$post" />
    </div>
    <div class="actions">
        @auth
            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-outline-success btn-sm"
                title="{{ __('Edit') }}">
                <i class="bi bi-pencil"></i>
            </a>
            <a title="{{ __('Delete') }}" href="#" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash"></i>
            </a>
        @endauth
    </div>
</div>
