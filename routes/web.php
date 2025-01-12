<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $recentPosts = App\Models\Post::query()->withCount(['comments'])->with(['tags'])->latest()->limit(4)->get();
    $popularPosts = App\Models\Post::query()->withCount('comments')->orderByDesc('views')->limit(4)->get();

    return view('home', [
        'recentPosts' => $recentPosts,
        'popularPosts' => $popularPosts
    ]);
})->name('home');

Route::get('recent', function (){
    $recentPosts = App\Models\Post::query()->withCount(['comments'])->with(['tags'])->latest()->get();

    return view('posts.recent', [
        'recentPosts' => $recentPosts,
    ]);
})->name('recent');
