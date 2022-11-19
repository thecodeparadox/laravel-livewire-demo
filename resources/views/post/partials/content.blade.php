<div class="card-body">
    <h4 class="card-title">
        {{ $post->title }}
    </h4>
    <p class="cart-text">
        @if (isset($showFullContent) && $showFillContent)
            {{ __($post->content) }}
        @else
            {{ __($post->short_content) }} <a href="{{ route('posts.view', $post->slug) }}" title="View More">
                <i class="bi bi-eye-fill"></i>
            </a>
        @endif
    </p>
</div>
