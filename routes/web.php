<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $recentPosts = App\Models\Post::query()->withCount(['comments'])->with(['tags'])->limit(4)->get();
    $popularPosts = App\Models\Post::query()->withCount('comments')->orderByDesc('views')->limit(4)->get();

    return view('home', [
        'recentPosts' => $recentPosts,
        'popularPosts' => $popularPosts
    ]);
});
