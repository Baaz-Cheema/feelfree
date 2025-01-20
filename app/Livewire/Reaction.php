<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Reaction extends Component
{
    public string $reactionableId;
    public string $reactionableType;
    public string $reaction;
    public int $reactionCount = 0;

    /**
     * @param string $reactionableType The type of the reactionable model eg post or comment
     */
    public function mount(string $reactionableId, string $reactionableType, string $reaction)
    {
        $this->reactionableId = $reactionableId;
        $this->reactionableType = $reactionableType;
        $this->reaction = $reaction;

        match (true) {
            $this->reactionableType === 'post' => $this->reactionCount = Post::query()->where('uuid', $this->reactionableId)->first()->reactions()->where('name', $this->reaction)->count(),
            $this->reactionableType === 'comment' => $this->reactionCount = Comment::find($this->reactionableId)->reactions()->where('name', $this->reaction)->count(),
        };
    }

    public function save()
    {
        $key = 'create-reaction-' . request()->ip() . $this->reactionableId . $this->reactionableType;

        if (RateLimiter::tooManyAttempts($key, 1)) {
            $this->addError('reaction', 'Oh! Too many attempts.');

            return;
        }

        RateLimiter::hit($key, 60);

        $this->reactionCount++;

        match (true) {
            $this->reactionableType === 'post' => Post::query()->where('uuid', $this->reactionableId)->first()->reactions()->attach(\App\Models\Reaction::where('name', $this->reaction)->first()),
            $this->reactionableType === 'comment' => Comment::find($this->reactionableId)->reactions()->attach(\App\Models\Reaction::where('name', $this->reaction)->first()),
        };
    }
}
