<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Livewire\Posts\Index;
use App\Livewire\Posts\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)
    ->name('home');

Route::get('/posts', Index::class)
    ->name('posts.index');

Route::get('/posts/{post:uuid}', Show::class)
    ->name('posts.show');
