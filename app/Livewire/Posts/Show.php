<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public Post $post;

    public function mount()
    {
        $this->post->load(['comments', 'tags']);
    }

    public function render()
    {
        return view('livewire.posts.show')
                ->title('ss');
    }
}
