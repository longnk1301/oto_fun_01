<?php

use Illuminate\Database\Seeder;
use App\Models\Exterior;
use Illuminate\Database\Eloquent\Factory;

class ExteriorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Exterior::class, 5)->create();
        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('exteriors')->insert([
                'vehicle_id' => $faker->numberBetween(1, 3),
		        'locks_nearby' => $faker->text(10),
		        'locks_remote' => $faker->text(8),
		        'turn_signal_light' => $faker->text(10),
            ]);
        }
    }
}
