<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    private PostRepository $postRepo;
    public string $search = '';
    protected $paginationTheme = 'bootstrap';
    public $pageSize = 3;

    /**
     * Reset pagination
     *
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function render()
    {
        $posts = $this->findPosts();
        return view('livewire.posts', compact('posts'));
    }

    private function findPosts()
    {
        $builder = Post::where('user_id', Auth::user()->id);
        if ($this->search) {
            return $builder->where('title', 'LIKE', '%' . $this->search . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate();
        }
        return $builder->latest()->paginate($this->pageSize);
    }
}
