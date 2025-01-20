<?php

declare(strict_types=1);

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public function save()
    {
        $this->validate();

        $key = 'create-post-' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 10)) {
            $this->addError('form.body', 'Oh! Too many attempts.');

            return;
        }

        RateLimiter::hit($key, 60);

        $post = Post::create([
            'uuid' => Str::uuid(),
            'body' => $this->form->body,
        ]);

        $post->tags()->attach(Tag::find($this->form->tag));

        $this->redirect('/posts/' . $post->uuid);
    }
}
