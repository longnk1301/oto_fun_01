<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factory;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        // factory(Post::class, 30)->create();

        $faker = Faker\Factory::create();
        $title = $faker->text(25);
    	$slug = str_slug($title . '-' . microtime(), '-');

        for ($i = 0; $i < 30; $i++) {
            DB::table('posts')->insert([
                'title' => $title,
		        'category_id' => $faker->numberBetween(1, 10),
		        'summary' => $faker->text(40),
		        'content' => $faker->text(500),
		        'slug' => $slug,
            ]);
        }
    }
}
