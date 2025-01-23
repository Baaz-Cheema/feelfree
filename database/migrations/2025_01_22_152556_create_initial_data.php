<?php

use App\Models\Reaction;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tags = ['family', 'work', 'relationships', 'health', 'finances', 'career', 'parenting', 'rejection', 'fears'];
        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }

        $reactions = [['name' => 'support', 'emoji' => '🙌']];
        foreach ($reactions as $reaction) {
            Reaction::create($reaction);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
