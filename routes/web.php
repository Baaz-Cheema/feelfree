<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $recentPosts = App\Models\Post::query()->withCount('comments')->limit(6)->get();
    $popularPosts = App\Models\Post::query()->withCount('comments')->limit(6)->get();

    return view('home', [
        'recentPosts' => $recentPosts,
        'popularPosts' => $popularPosts
    ]);
});
