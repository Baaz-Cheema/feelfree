<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Validate('required', message: 'Please write something')]
    #[Validate('string')]
    #[Validate('min:5', message: 'Its better to share more')]
    #[Validate('max:2000', message: 'Its too long')]
    public string $body = '';

    #[Validate('required|int')]
    public int $tag = 0;
}
