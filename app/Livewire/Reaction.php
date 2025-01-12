<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Reaction extends Component
{
    public string $postId;
    public string $reaction;
    public string $reactionCount;

    public function mount(string $postId, string $reaction)
    {
        $this->postId = $postId;
        $this->reaction = $reaction;
        $this->reactionCount = Post::query()->where('uuid', $this->postId)->first()->reactions()->where('name', $this->reaction)->count();
    }

    public function save()
    {
        $this->reactionCount++;
        Post::query()->where('uuid', $this->postId)->first()->reactions()->attach(\App\Models\Reaction::where('name', $this->reaction)->first());
    }
}
