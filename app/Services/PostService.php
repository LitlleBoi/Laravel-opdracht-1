<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class PostService
{
    /**
     * Cache TTL in seconds (10 minutes).
     */
    protected const CACHE_TTL = 600;

    /**
     * Retrieve all posts, applying filters if provided, with cache support.
     *
     * @param array<string, mixed> $filters
     * @return Collection<int, Post>
     */
    public function getPosts(array $filters = []): Collection
    {
        $hasFilters = !empty($filters['search']) || !empty($filters['category']);

        if ($hasFilters) {
            return Post::latest('published_at')
                ->filter($filters)
                ->get();
        }

        $posts = Cache::remember('posts.index', self::CACHE_TTL, function () {
            return Post::latest('published_at')->get();
        });

        // Safeguard in case of cache deserialization issue
        if (!($posts instanceof Collection)) {
            Cache::forget('posts.index');
            $posts = Post::latest('published_at')->get();
        }

        return $posts;
    }

    /**
     * Retrieve a single post by slug, utilizing cache.
     */
    public function getPostBySlug(string $slug): Post
    {
        $cacheKey = "post.show.{$slug}";

        $post = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($slug) {
            return Post::where('slug', $slug)->firstOrFail();
        });

        if (!($post instanceof Post)) {
            Cache::forget($cacheKey);
            $post = Post::where('slug', $slug)->firstOrFail();
        }

        return $post;
    }

    /**
     * Retrieve all categories with cache.
     *
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        $categories = Cache::remember('categories.all', self::CACHE_TTL * 6, function () {
            return Category::orderBy('name')->get();
        });

        if (!($categories instanceof Collection)) {
            Cache::forget('categories.all');
            $categories = Category::orderBy('name')->get();
        }

        return $categories;
    }

    /**
     * Invalidate all post-related caches.
     */
    public function clearCache(): void
    {
        Cache::forget('posts.index');
        Cache::forget('categories.all');
    }
}
