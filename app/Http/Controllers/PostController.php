<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Dependency injection of PostService.
     */
    public function __construct(
        protected PostService $postService
    ) {}

    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request): View
    {
        $filters = $request->only(['search', 'category']);
        $posts = $this->postService->getPosts($filters);
        $categories = $this->postService->getCategories();
        $currentCategory = $request->category ? $categories->firstWhere('slug', $request->category) : null;

        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
        ]);
    }

    /**
     * Display a single blog post.
     */
    public function show(string $slug): View
    {
        $post = $this->postService->getPostBySlug($slug);

        return view('post', [
            'post' => $post,
        ]);
    }
}
