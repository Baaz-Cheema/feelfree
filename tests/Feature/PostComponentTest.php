<?php

declare(strict_types=1);

use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\Show;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('creates a post', function () {
    Tag::create([
        'name' => $tagName = Str::random(10),
    ]);

    Livewire::test(CreatePost::class)
        ->set('form.body', 'This is a test post content.')
        ->set('form.tags', $tagName)
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('posts', [
        'body' => 'This is a test post content.',
    ]);
});

it('validates the post body', function () {
    Livewire::test(CreatePost::class)
        ->set('form.body', 'aa')
        ->call('save')
        ->assertHasErrors(['form.body' => ['min']]);

    Livewire::test(CreatePost::class)
        ->set('form.body', str()->random(2001))
        ->call('save')
        ->assertHasErrors(['form.body' => ['max']]);
});

it('shows posts', function () {
    $post = Post::factory()->create();

    Livewire::test(Show::class, ['post' => $post])
        ->assertSee($post->body);
});
