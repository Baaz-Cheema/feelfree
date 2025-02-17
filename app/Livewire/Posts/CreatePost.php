<?php

declare(strict_types=1);

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\Tag;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class CreatePost extends Component
{
    public PostForm $form;

    public function save()
    {
        $this->validate();

        $key = 'create-post-' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 10)) {
            Toaster::error('Oh! Too many attempts. Please try again later.');

            return;
        }

        RateLimiter::hit($key, 60);

        $post = Post::create([
            'uuid' => Str::uuid(),
            'body' => $this->form->body,
            'views' => 0,
        ]);

        $post->tags()->attach(Tag::find($this->form->tag));
        $post->reactions()->attach(Reaction::whereName('support')->first());

        session()->flash('message', 'You have shared your worry anonymously.');

        $this->redirect('/posts/' . $post->uuid);
    }
}
