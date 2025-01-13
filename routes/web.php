<?php

declare(strict_types=1);

use App\Livewire\Posts\Index;
use App\Livewire\Posts\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $recentPosts = App\Models\Post::query()->withCount(['comments'])->with(['tags'])->latest()->limit(4)->get();
    $popularPosts = App\Models\Post::query()->withCount(['comments'])->with(['tags'])->latest('views')->limit(4)->get();

    return view('home', [
        'recentPosts' => $recentPosts,
        'popularPosts' => $popularPosts,
    ]);
})->name('home');

Route::get('/posts', Index::class)
    ->name('posts.index');

Route::get('/posts/{post:uuid}', Show::class)
    ->name('posts.show');
