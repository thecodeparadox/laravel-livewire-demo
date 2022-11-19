<div class="card-footer p-2">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 d-flex justify-content-between justify-content-sm-between">
            <div>{{ $post->updated_at->toDayDateTimeString() }}</div>
            <div class="text-nowrap"><i class="bi bi-star"></i> {{ $post->likes }}</div>
        </div>
        <div class="col-md-6 text-end col-sm-12 col-xs-12">
            @foreach ($post->tags->take(3) as $tag)
                <x-badge :content="$tag->name" type="secondary" />
            @endforeach
        </div>
    </div>
</div>
