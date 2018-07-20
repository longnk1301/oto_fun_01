<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'1' => [
        		'id' => '100',
        		'role_name' => 'Member'
        	],
        	'2' => [
        		'id' => '300',
        		'role_name' => 'Author'
        	],
        	'3' => [
        		'id' => '900',
        		'role_name' => 'Admin'
        	],
        ]);
    }
}
