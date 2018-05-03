<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
        	'name' => 'admin',
        	'email' => 'khanhlong1315@gmail.com',
        	'password' => Hash::make('123456'),
        	'phone' => '01636199366',
        	'add' => 'Hai Bà Trưng, Hà Nội',
        	'roles' => 1,
        ]);
    }
}
