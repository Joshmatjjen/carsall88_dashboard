<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_cars = [ 'SUV', 'Truck', 'Sedan', 'Van', 'Coupe', 'Wagon', 'Convertible', 'Sport Car', 'Diesel', 'Crossover', 'Luxury Car', 'Hybrid/Electric', 'Certified Pre-Owned'];
        foreach ( $categories_cars as $subcategory1 ) {
            DB::table( 'sub_categories' )->insert( [
                'name'       => trim( strtolower( $subcategory1) ),
                'category_id' => 1,
                'photo' => $subcategory1.'.png',
                'created_at' => Carbon::now(),
            ] );
        }

        $categories_car_parts = ['Braker', 'Brake Pads', 'Axle', 'Fuel injector', 'Piston', 'AC compressor', 'Radiator', 'Engine fan', 'Battery','Car jack', 'Spare tire', 'Transmission', 'Shock absorber', 'Air filter', 'Spark plugs', 'Catalytic converters', 'Muffler', 'Pressure gauge', 'Alternator'];

        foreach ( $categories_car_parts as $subcategory2 ) {
            DB::table( 'sub_categories' )->insert( [
                'name'       => trim( strtolower( $subcategory2) ),
                'category_id' => 2,
                'photo' => $subcategory2.'.png',
                'created_at' => Carbon::now(),
            ] );
        }

    }
}
