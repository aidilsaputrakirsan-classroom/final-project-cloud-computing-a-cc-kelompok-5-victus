<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $categories = collect([
                Category::create(['name' => 'Uncategorized', 'slug' => 'uncategorized', 'is_active' => true])
            ]);
        }

        Post::create([
            'title' => 'Welcome to Travesta',
            'slug' => 'welcome-to-travesta',
            'content' => '<p>This is a sample post for Travesta project.</p>',
            'status' => 'published',
            'user_id' => $user->id,
            'category_id' => $categories->first()->id,
            'published_at' => now(),
        ]);
    }
}
