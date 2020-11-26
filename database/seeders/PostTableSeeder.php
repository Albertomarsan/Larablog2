<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $categories = Category::all();
        foreach ($categories as $key => $c){
            for ($i = 1; $i <= 20; $i++){
                Post::create([
                    'title' => "Post $i",
                    'url_clean' => "post-$i",
                    'content' => "contenido de prueba para que quede esto muy bonito",
                    'posted' => "yes",
                    'category_id' => $c->id
                ]);
            }
        }
    }
}
