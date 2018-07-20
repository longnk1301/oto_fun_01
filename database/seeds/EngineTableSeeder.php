<?php

use Illuminate\Database\Seeder;
use App\Models\Engine;
use Illuminate\Database\Eloquent\Factory;

class EngineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Engine::class, 5)->create();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('engines')->insert([
                'vehicle_id' => $faker->numberBetween(1, 3),
		        'engine_type' => $faker->text(6),
		        'cylinder_capacity' => $faker->numberBetween(50, 100),
		        'drive_style' => $faker->text(6),
		        'drive_type' => $faker->text(6),
		        'max_capacity' => $faker->numberBetween(100, 120),
            ]);
        }
    }
}
