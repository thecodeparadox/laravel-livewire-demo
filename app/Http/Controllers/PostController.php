<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $postRepo)
    {
        $this->post = $postRepo;
    }

    /**
     * Post Listing
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function index()
    {
        $posts = $this->post->getByUserId(Auth::user()->id);
        return view('post.listing', compact('posts'));
    }

    /**
     * View the Post
     * @param string $slug
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function view(string $slug = '')
    {
        $post = $this->post->getBySlug($slug);
        return view('post.view', compact('post'));
    }

    /**
     * Post Edit
     *
     * @param string $slug
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function edit(string $slug = '')
    {
        $post = $this->post->getBySlug($slug);
        return view('post.edit', compact('post'));
    }
}
