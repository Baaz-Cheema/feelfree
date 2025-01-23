<?php

declare(strict_types=1);

use App\Livewire\Comments;
use App\Livewire\Reaction;
use App\Models\Post;

test('home page returns a successful response', function () {
    $this->get(route('home'))
        ->assertStatus(200);
});

test('show post page returns a successful response', function () {
    $this->get(route('posts.show', Post::factory()->create()->uuid))
        ->assertStatus(200);
});

test('reaction component exists in home page', function () {
    Post::factory()->create();

    $this->get(route('home'))
        ->assertSeeLivewire(Reaction::class);
});

test('reaction component exists in show post page', function () {
    $this->get(route('posts.show', Post::factory()->create()->uuid))
        ->assertSeeLivewire(Reaction::class);
});

test('comments component exists in show post page', function () {
    $this->get(route('posts.show', Post::factory()->create()->uuid))
        ->assertSeeLivewire(Comments\Index::class);
});
