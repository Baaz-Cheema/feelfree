<?php

declare(strict_types=1);

use App\Livewire\Reaction;
use App\Models\Post;
use App\Models\Reaction as ModelsReaction;
use Illuminate\Support\Str;
use Livewire\Livewire;

it('creates a reaction on post', function () {
    $post = Post::factory()->create();
    $reaction = ModelsReaction::create(['name' => $name = Str::random(), 'emoji' => '👏']);

    Livewire::test(Reaction::class, [
        'reactionableId' => $post->uuid,
        'reactionableType' => 'post',
        'reaction' => $name,
    ])
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('reactionables', [
        'reactionable_type' => 'post',
        'reactionable_id' => $post->id,
        'reaction_id' => $reaction->id,
    ]);
});

it('creates a reaction on comment', function () {
    $post = Post::factory()->create();
    $comment = $post->comments()->create(['body' => 'This is a test comment content.']);
    $reaction = ModelsReaction::create(['name' => $name = Str::random(), 'emoji' => '👏']);

    Livewire::test(Reaction::class, [
        'reactionableId' => $comment->id,
        'reactionableType' => 'comment',
        'reaction' => $name,
    ])
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('reactionables', [
        'reactionable_type' => 'comment',
        'reactionable_id' => $comment->id,
        'reaction_id' => $reaction->id,
    ]);
});
