<?php

declare(strict_types=1);

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function mount()
    {
        $this->post->load(['comments', 'tags']);
        $this->post->increment('views');
    }

    public function render()
    {
        seo()
            ->title(str($this->post->body)->limit(20, '')->toString())
            ->description(str($this->post->body)->limit(160)->toString());

        return view('livewire.posts.show');
    }
}
