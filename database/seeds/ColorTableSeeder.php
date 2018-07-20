<?php

use Illuminate\Database\Seeder;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factory;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
        	'1' => [
        		'id' => '1',
        		'color' => 'Red'
        	],
        	'2' => [
        		'id' => '2',
        		'color' => 'White'
        	],
        	'3' => [
        		'id' => '3',
        		'color' => 'Black'
        	],
        	'4' => [
        		'id' => '4',
        		'color' => 'Blue'
        	],
        	'5' => [
        		'id' => '5',
        		'color' => 'Orange'
        	],
        	'6' => [
        		'id' => '6',
        		'color' => 'Yellow'
        	],
        ]);
    }
}
