<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Reaction;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tags = ['family', 'work', 'relationships', 'health', 'finances', 'career', 'parenting', 'rejection', 'fears'];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }

        $reactions = [['name' => 'support', 'emoji' => '🤗']];
        foreach ($reactions as $reaction) {
            Reaction::create($reaction);
        }

        Post::factory()->count(10)->create();
    }
}
