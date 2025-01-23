<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Reaction extends Model
{
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'reactionable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Comment::class, 'reactionable');
    }
}
