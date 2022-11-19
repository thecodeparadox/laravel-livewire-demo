<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $postRepo)
    {
        $this->post = $postRepo;
    }

    public function index()
    {
        $posts = $this->post->getByUserId(Auth::user()->id);
        return view('post.listing', compact('posts'));
    }

    public function view(string $slug = '')
    {
    }
}
