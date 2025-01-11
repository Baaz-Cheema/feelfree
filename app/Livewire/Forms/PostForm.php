<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required|string|min:5|max:2000')]
    public string $body = '';

    #[Validate('required|int')]
    public int $tag = 0;
}
