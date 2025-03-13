<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create(['api_token' => 'vg@123']);
        \App\Models\Blog::factory(10)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Like::factory(100)->create();
        \App\Models\Comment::factory(200)->create();
    }
}
