<?php

declare(strict_types=1);

namespace App\Livewire\Comments;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\RateLimiter;

class Index extends Component
{
    public Post $post;

    #[Validate('required|string|min:3|max:1000')]
    public string $body = '';

    public function save()
    {
        $key = 'create-comment-' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 10)) {
            $this->addError('comment', 'Too many attempts. Please try again later.');
            return;
        }

        RateLimiter::hit($key, 60);

        $this->post->comments()->create([
            'body' => $this->body,
        ]);

        $this->body = '';
    }

    public function render()
    {
        return view('livewire.comments.index', [
            'comments' => $this->post->comments()->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
