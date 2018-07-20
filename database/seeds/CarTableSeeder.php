<?php

use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('cars')->insert([
                'comp_id' => $faker->numberBetween(1, 9),
		        'type_id' => $faker->numberBetween(1, 8),
		        'color_id' => $faker->numberBetween(1, 6),
		        'car_name' => $faker->text(6),
		        'summary' => $faker->text(20),
		        'car_number' => $faker->numberBetween(0, 20),
		        'car_year' => $faker->numberBetween(2016, 2018),
		        'car_cost' => $faker->numberBetween(10000, 50000),
            ]);
        }
    }
}
