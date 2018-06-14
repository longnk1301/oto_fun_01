<?php

use Illuminate\Database\Seeder;
use App\Models\CarType;
use Illuminate\Database\Eloquent\Factory;

class CarTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(CarType::class, 8)->create();

    	$faker = Faker\Factory::create();

        for ($i = 0; $i < 8; $i++) {
            DB::table('car_type')->insert([
                'type' => $faker->text(6),
            ]);
        }
    }
}
