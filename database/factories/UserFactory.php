<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    $title = $faker->text(25);
    $slug = str_slug($title . '-' . microtime(), '-');

    return [
         'title' => $title,
         'category_id' => $faker->numberBetween(1, 10),
         'summary' => $faker->text(40),
         'content' => $faker->text(500),
         'slug' => $slug,
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $cate_name = $faker->text(15);
    $slug = str_slug($cate_name . '-' . microtime(), '-');
    return [
         'category_name' => $cate_name,
         'summary' => $faker->text(25),
         'slug' => $slug,
    ];
});

$factory->define(App\Models\CarType::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->text(6),
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    return [
        'com_name' => $faker->text(6),
        'com_add' => $faker->text(20),
        'com_phone' => $faker->numberBetween(1, 99999999),
    ];
});

$factory->define(App\Models\Color::class, function (Faker\Generator $faker) {
    return [
        'car_id' => $faker->numberBetween(1, 5),
        'color' => $faker->text(8),
    ];
});

$factory->define(App\Models\Car::class, function (Faker\Generator $faker) {
    return [
        'comp_id' => $faker->numberBetween(1, 9),
        'type_id' => $faker->numberBetween(1, 8),
        'color_id' => $faker->numberBetween(1, 10),
        'car_name' => $faker->text(6),
        'summary' => $faker->text(20),
        'car_number' => $faker->numberBetween(0, 20),
        'car_year' => $faker->numberBetween(2016, 2018),
        'car_cost' => $faker->numberBetween(10000, 50000),
    ];
});

$factory->define(App\Models\Vehicle::class, function (Faker\Generator $faker) {
    return [
        'car_id' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\Models\Engine::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id' => $faker->numberBetween(1, 5),
        'engine_type' => $faker->text(6),
        'cylinder_capacity' => $faker->numberBetween(50, 100),
        'drive_style' => $faker->text(6),
        'drive_type' => $faker->text(6),
        'max_capacity' => $faker->numberBetween(100, 120),
    ];
});

$factory->define(App\Models\Exterior::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id' => $faker->numberBetween(1, 5),
        'locks_nearby' => $faker->text(10),
        'locks_remote' => $faker->text(8),
        'turn_signal_light' => $faker->text(10),
    ];
});

$factory->define(App\Models\Operate::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id' => $faker->numberBetween(1, 5),
        'tissue_man' => $faker->text(8),
        'gear' => $faker->numberBetween(4, 16),
    ];
});

$factory->define(App\Models\Size::class, function (Faker\Generator $faker) {
    return [
        'vehicle_id' => $faker->numberBetween(1, 5),
        'height' => $faker->numberBetween(200, 400),
        'weight' => $faker->numberBetween(200, 400),
        'width' => $faker->numberBetween(200, 400),
        'colc' => $faker->numberBetween(100, 200),
        'volume_fuel' => $faker->text(5),
    ];
});
