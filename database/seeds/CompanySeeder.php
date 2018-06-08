<?php

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factory;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(Company::class, 9)->create();

    	$faker = Faker\Factory::create();

       for ($i = 0; $i < 9; $i++) {
            DB::table('company')->insert([
                'com_name' => $faker->text(6),
		        'com_add' => $faker->text(20),
		        'com_phone' => $faker->numberBetween(1, 99999999),
            ]);
        }
    }
}
