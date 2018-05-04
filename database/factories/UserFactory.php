<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $title = $faker->realText(50,1);
    $slug = str_slug($title . '-' . microtime(), '-');

    return [
         'cate_id' => rand(1,5),
         'title' => $title,
         'summary' => $faker->realText(100,1),
         'content' => $faker->realText(300,3),
         'views_id' => -1,
         'tags' => -1,
         'created_by' => -1,
         'slug' => $slug,
    ];
});

$factory->define(App\Car::class, function (Faker\Generator $faker) {
    return [
         'car_name' => $faker->text(10),
         'summary' => $faker->realText(60,1),
         'car_type' => $faker->text(10),
         'car_company' => $faker->text(8),
         'car_color' => $faker->text(10),
         'car_years' => $faker->numberBetween(2010, 2018),
         'tags' => -1,
         'view_id' => -1,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
         'cate_name' => $faker->text(10),
         'summary' => $faker->realText(60,1),
         'tags' => -1,
    ];
});