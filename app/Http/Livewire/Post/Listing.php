<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Listing extends Component
{
    protected PostRepository $postRepo;

    public $search;

    public function __construct()
    {
        $this->postRepo = new PostRepository();
    }

    public function render()
    {
        return view('livewire.post.listing')->extends('layouts.app');
    }

    public function getPostsProperty()
    {
        return $this->postRepo->searchPosts($this->search);
    }
}
