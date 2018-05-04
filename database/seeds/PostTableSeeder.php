<?php

use Illuminate\Database\Seeder;
use App\Category

class PostTableSeeder extends Seeder
{
    public function run()
    {
         factory(Category::class, 50)->create();
    }
}
