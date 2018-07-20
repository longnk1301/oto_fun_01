<?php

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factory;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Vehicle::class, 5)->create();
        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 3; $i++) {
            DB::table('vehicles')->insert([
                'car_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
