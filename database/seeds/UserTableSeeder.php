<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

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
        	'role' => 900,
        ]);
    }
}
