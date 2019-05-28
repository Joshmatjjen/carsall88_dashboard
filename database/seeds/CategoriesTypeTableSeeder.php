<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoriesTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'SUV', 'Truck', 'Sedan', 'Van', 'Coupe', 'Wagon', 'Convertible', 'Sport Car', 'Diesel', 'Crossover', 'Luxury Car', 'Hybrid/Electric', 'Certified Pre-Owned'];
        foreach ( $categories as $category_type ) {
            DB::table( 'categories_type' )->insert( [
                'name'       => trim( strtolower( $category_type) ),
                'categories_id' => 1,
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
