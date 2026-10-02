<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Authors
        $lary = User::create([
            'name' => 'Lary Laracore',
            'email' => 'lary@laracasts.com',
            'password' => bcrypt('password'),
        ]);

        $jeffrey = User::create([
            'name' => 'Jeffrey Way',
            'email' => 'jeffrey@laracasts.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Categories
        $techniques = Category::create([
            'name' => 'Techniques',
            'slug' => 'techniques',
        ]);

        $updates = Category::create([
            'name' => 'Updates',
            'slug' => 'updates',
        ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $business = Category::create([
            'name' => 'Business',
            'slug' => 'business',
        ]);

        // Common paragraph text from template
        $bodyP1 = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>';
        $bodyP2 = '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>';
        $bodyP3 = '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>';
        $bodyHeader = '<h2 class="font-bold text-lg">Sed quia consequuntur</h2>';
        $bodyP4 = '<p>Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>';
        $fullBody = $bodyP1 . "\n\n" . $bodyP2 . "\n\n" . $bodyP3 . "\n\n" . $bodyHeader . "\n\n" . $bodyP4 . "\n\n" . $bodyP1;

        // 3. Posts
        Post::create([
            'user_id' => $lary->id,
            'category_id' => $techniques->id,
            'title' => 'This is a big title and it will look great on two or even three lines. Wooohoo!',
            'slug' => 'this-is-a-big-title-woohoo',
            'thumbnail' => '/images/illustration-1.png',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'body' => $fullBody,
            'published_at' => now()->subDay(),
        ]);

        Post::create([
            'user_id' => $lary->id,
            'category_id' => $updates->id,
            'title' => 'Building modern web applications with Laravel and Blade templates',
            'slug' => 'building-modern-web-applications',
            'thumbnail' => '/images/illustration-2.png',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
            'body' => $fullBody,
            'published_at' => now()->subDays(2),
        ]);

        Post::create([
            'user_id' => $jeffrey->id,
            'category_id' => $techniques->id,
            'title' => 'Mastering Object Oriented Programming and Eloquent Relationships',
            'slug' => 'mastering-oop-and-eloquent',
            'thumbnail' => '/images/illustration-3.png',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'body' => $fullBody,
            'published_at' => now()->subDays(3),
        ]);

        Post::create([
            'user_id' => $jeffrey->id,
            'category_id' => $personal->id,
            'title' => 'Clean Code and Service Layer Architecture in PHP 8',
            'slug' => 'clean-code-and-service-layer',
            'thumbnail' => '/images/illustration-4.png',
            'excerpt' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.',
            'body' => $fullBody,
            'published_at' => now()->subDays(4),
        ]);

        Post::create([
            'user_id' => $lary->id,
            'category_id' => $business->id,
            'title' => 'Speeding Up Applications with High Performance Caching',
            'slug' => 'speeding-up-applications-with-caching',
            'thumbnail' => '/images/illustration-5.png',
            'excerpt' => 'Magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.',
            'body' => $fullBody,
            'published_at' => now()->subDays(5),
        ]);

        Post::create([
            'user_id' => $lary->id,
            'category_id' => $techniques->id,
            'title' => 'Another year. Another update. Refreshing Laravel from scratch!',
            'slug' => 'refreshing-laravel-from-scratch',
            'thumbnail' => '/images/illustration-1.png',
            'excerpt' => 'We are refreshing the popular Laravel series with new content. I am going to keep you guys up to speed with what is going on!',
            'body' => $fullBody,
            'published_at' => now()->subDays(6),
        ]);
    }
}
