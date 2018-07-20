<?php

use Illuminate\Database\Seeder;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factory;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Size::class, 5)->create();
        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('sizes')->insert([
                'vehicle_id' => $faker->numberBetween(1, 3),
		        'height' => $faker->numberBetween(200, 400),
		        'weight' => $faker->numberBetween(200, 400),
		        'width' => $faker->numberBetween(200, 400),
		        'colc' => $faker->numberBetween(100, 200),
		        'volume_fuel' => $faker->text(5),
            ]);
        }
    }
}
