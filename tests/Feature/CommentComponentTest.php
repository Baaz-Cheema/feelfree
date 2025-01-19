<?php

use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Comments\Index;

it('creates a comment', function () {

    $post = Post::factory()->create();

    Livewire::test(Index::class, ['post' => $post])
        ->set('body', 'This is a test comment content.')
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('comments', [
        'body' => 'This is a test comment content.',
    ]);
});
