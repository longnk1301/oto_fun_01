<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('cars')->insert(
        //     [
        //         'BMW1' => [
        //             'car_name' => 'BMW01',
        //             'car_type' => 'BMW',
        //             'car_company' => 'BMWcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'BMW2' => [
        //             'car_name' => 'BMW02',
        //             'car_type' => 'BMW',
        //             'car_company' => 'BMWcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'BMW3' => [
        //             'car_name' => 'BMW03',
        //             'car_type' => 'BMW',
        //             'car_company' => 'BMWcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'ABC1' => [
        //             'car_name' => 'ABC01',
        //             'car_type' => 'ABC',
        //             'car_company' => 'ABCcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'ABC2' => [
        //             'car_name' => 'ABC02',
        //             'car_type' => 'ABC',
        //             'car_company' => 'ABCcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'ABC3' => [
        //             'car_name' => 'ABC03',
        //             'car_type' => 'ABC',
        //             'car_company' => 'ABCcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'DEF1' => [
        //             'car_name' => 'DEF01',
        //             'car_type' => 'DEF',
        //             'car_company' => 'DEFompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'DEF2' => [
        //             'car_name' => 'DEF02',
        //             'car_type' => 'DEF',
        //             'car_company' => 'DEFompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'DEF3' => [
        //             'car_name' => 'DEF03',
        //             'car_type' => 'DEF',
        //             'car_company' => 'DEFompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'QWE1' => [
        //             'car_name' => 'QWE01',
        //             'car_type' => 'QWE',
        //             'car_company' => 'QWEcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'QWE2' => [
        //             'car_name' => 'QWE02',
        //             'car_type' => 'QWE',
        //             'car_company' => 'QWEcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        //         'QWE3' => [
        //             'car_name' => 'QWE03',
        //             'car_type' => 'QWE',
        //             'car_company' => 'QWEcompany',
        //             'tags' => -1,
        //             'view_id' => -1,],
        // ]);
        factory(Car::class, 20)->create();
    }
}
