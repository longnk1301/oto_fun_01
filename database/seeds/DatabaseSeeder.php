<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CarTableSeeder::class);
        // $this->call(CarTypeTableSeeder::class);
        // $this->call(CompanySeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(PostTableSeeder::class);
        // $this->call(VehicleTableSeeder::class);
        // $this->call(EngineTableSeeder::class);
        // $this->call(ExteriorTableSeeder::class);
        // $this->call(OperateTableSeeder::class);
        // $this->call(SizeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
    }
}
