@if (!isset($edit) || $edit === true)
    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-outline-success btn-sm"
        title="{{ __('Edit') }}">
        <i class="bi bi-pencil"></i>
    </a>
@endif

@if (!isset($delete) || $delete === true)
    {{-- data-bs-toggle="modal" data-bs-target="#staticBackdrop" --}}
    <button type="button" title="{{ __('Delete') }}" class="btn btn-outline-danger btn-sm post-delete-modal-trigger-btn"
        data-post-id="{{ $post->id }}" data-target-model="#staticBackdrop"
        data-is-lw="{{ intval(isset($isLw) && $isLw) }}">
        <i class="bi bi-trash"></i>
    </button>
@endif
