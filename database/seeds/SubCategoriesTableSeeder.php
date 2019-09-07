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
        $categories_cars = [ 'Convertible', 'Coupe', 'Crossover', 'Hatchback', 'Hybrid_Electric', 'Limousine', 'Luxury Car', 'Minivan', 'Pickup Truck', 'Roadster', 'Sedan', 'Sport Car', 'SUV', 'Truck',  'Van', 'Wagon'];
        foreach ( $categories_cars as $subcategory1 ) {
            DB::table( 'sub_categories' )->insert( [
                'name' => $subcategory1,
                'category_id' => 1,
                'photo' => $subcategory1.'.png',
                'created_at' => Carbon::now(),
            ] );
        }

        for ($i = 0; $i < count($categories_cars); $i++)  {
            DB::table( 'sub_categories' )->insert( [
                'name' => $categories_cars[$i],
                'category_id' => 1,
                'photo' => $categories_cars[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }

        $categories_car_parts = ['Braker', 'Brake Pads', 'Axle', 'Fuel injector', 'Piston', 'AC compressor', 'Radiator', 'Engine fan', 'Battery','Car jack', 'Spare tire', 'Transmission', 'Shock absorber', 'Air filter', 'Spark plugs', 'Catalytic converters', 'Muffler', 'Pressure gauge', 'Alternator'];

        for ($i = 0; $i < count($categories_car_parts); $i++)  {
            DB::table( 'sub_categories' )->insert( [
                'name' => $categories_car_parts[$i],
                'category_id' => 1,
                'photo' => $categories_car_parts[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }

    }
}
