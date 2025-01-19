<?php

use App\Models\Post;
use Livewire\Livewire;
use App\Livewire\Reaction;
use Illuminate\Support\Str;
use App\Models\Reaction as ModelsReaction;

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


    $this->assertDatabaseHas('reactionable', [
        'reactionableType' => 'post',
        'reactionableId' => $post->uuid,
    ]);
});
