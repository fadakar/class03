<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 1000; $i++) {
            $newPost = new Post();
            $newPost->title = 'title ' . $i;
            $newPost->description = 'desc ' . $i;
            $newPost->save();
        }


    }
}
