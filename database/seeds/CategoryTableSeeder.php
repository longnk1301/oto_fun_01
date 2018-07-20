<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factory;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // factory(Category::class, 10)->create();
        
    	$faker = Faker\Factory::create();
    	$cate_name = $faker->text(15);
    	$slug = str_slug($cate_name . '-' . microtime(), '-');

        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'category_name' => $cate_name,
		        'summary' => $faker->text(25),
		        'slug' => $slug,
            ]);
        }
    }
}
