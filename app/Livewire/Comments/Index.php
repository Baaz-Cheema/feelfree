<?php

namespace App\Livewire\Comments;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Index extends Component
{
    public Post $post;

    #[Validate('required|string|min:3|max:1000')]
    public string $body = '';

    public function save()
    {
        $this->post->comments()->create([
            'body' => $this->body
        ]);
    }

    public function render()
    {
        return view('livewire.comments.index', [
            'comments' => $this->post->comments()->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
