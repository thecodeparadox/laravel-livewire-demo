<?php

namespace App\Http\Livewire;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Repositories\PostRepository;
use App\Traits\PostTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination, PostTrait;

    protected PostRepository $postRepo;

    // Post fields
    public $title = '';
    public $content = '';
    public $status = PostStatus::DRAFT;
    public $slug = '';

    // tracking props
    public $search;
    public $posts;
    public $post;
    public $postId = '';
    public $opMode = 'listing';
    public $componentTitle = 'Posts Listing';
    public $postStatuses;

    public function __construct()
    {
        parent::__construct();

        $this->postStatuses = PostStatus::getEnumValues();
        $this->postRepo = new PostRepository();
        $this->posts = Post::where('user_id', Auth::user()->id)->latest()->paginate(6);
    }

    protected function rules(): array
    {
        return $this->getPostValidationRules();
    }

    public function mount($id = ''): void
    {
        $this->postId = $id;
        $this->opMode = 'listing';
        $routeName = request()->route()->getName();

        switch ($routeName) {
            case 'post.create':
                $this->componentTitle = 'Create Post';
                $this->opMode = 'create';
                break;

            case 'post.edit':
                $this->componentTitle = 'Update Post';
                $this->opMode = 'update';
                break;

            case 'post.view':
                $this->componentTitle = 'View Post';
                $this->opMode = 'view';
                break;
        }

        $this->refreshProperties();
        $this->posts = $this->postRepo->searchPosts();
    }

    public function render(): mixed
    {
        // $this->posts = $this->postRepo->searchPosts();
        return view('livewire.posts')->extends('layouts.app');
    }

    public function updatedPost()
    {
        session()->forget(['error', 'success']);
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function resetFilters(): void
    {
        $this->resetExcept(['opMode']);
    }

    public function updateSlug(): void
    {
        $this->slug = Str::slug($this->title);
    }

    public function savePost()
    {
        $action = ucwords($this->opMode);
        try {
            $this->validate();
            $data = [
                'user_id' => $this->post->user_id ?? Auth::user()->id,
                'title' => $this->title,
                'content' => $this->content,
                'slug' => $this->slug,
                'status' => $this->status,
                'published_at' => PostStatus::is($this->status, PostStatus::PUBLISHED) ? Carbon::now() : null
            ];

            $post = $this->postRepo->upsert($data, $this->post->id ?? null);

            return redirect()
                ->route('post.view', ['id' => $post->id])
                ->with('success', __('Post ' . $action . ' successfully'));
        } catch (Exception $e) {
            dd($e);
            session()->put('error', __($e->getMessage() ?? $action . ' Failed'));
        }
    }

    public function performDelete($postId)
    {
        $this->postId = $postId;
        dd($this->postId);
        $this->postRepo->deleteById($this->postId);
        return redirect()->route('posts')->with('success', __('Post deleted successfully'));
    }

    private function fetchPostOrFail()
    {
        if (!$this->postId) {
            return;
        }

        $this->post = $this->postRepo->getById($this->postId);
        if (!$this->post) {
            return redirect()->route('posts')->with('error', __('Post Not Found'));
        }
    }

    private function refreshProperties()
    {
        $this->fetchPostOrFail();

        $this->title = $this->post->title ?? '';
        $this->content = $this->post->content ?? '';
        $this->status = $this->post->status ?? PostStatus::getValue(PostStatus::DRAFT);
        $this->slug = $this->post->slug ?? 'N/A';
    }
}
