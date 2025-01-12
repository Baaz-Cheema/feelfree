<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'uuid' => Str::uuid(),
            'body' => $this->form->body
        ]);

        $post->tags()->attach(Tag::find($this->form->tag));

        $this->redirect('/#' . $post->uuid);
    }
}
