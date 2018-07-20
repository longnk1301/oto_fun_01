<?php

use Illuminate\Database\Seeder;
use App\Models\Operate;
use Illuminate\Database\Eloquent\Factory;

class OperateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Operate::class, 5)->create();
        
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('operates')->insert([
                'vehicle_id' => $faker->numberBetween(1, 3),
		        'tissue_man' => $faker->text(8),
		        'gear' => $faker->numberBetween(4, 16),
            ]);
        }
    }
}
