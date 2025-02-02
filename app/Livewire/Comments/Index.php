<?php

declare(strict_types=1);

namespace App\Livewire\Comments;

use App\Models\Post;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public Post $post;

    #[Validate('required|min:3|max:1000')]
    public string $body = '';

    public function save()
    {
        $this->validate();

        $key = 'create-comment-' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            Toaster::error('Oh! Too many attempts. Please try again later.');

            return;
        }

        RateLimiter::hit($key, 60);

        $this->post->comments()->create([
            'body' => $this->body,
        ]);

        $this->body = '';

        Toaster::success('Comment posted!');
    }

    public function render()
    {
        return view('livewire.comments.index', [
            'comments' => $this->post->comments()->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
