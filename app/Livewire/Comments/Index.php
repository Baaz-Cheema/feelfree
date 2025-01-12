<?php

namespace App\Livewire\Comments;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.comments.index');
    }
}
