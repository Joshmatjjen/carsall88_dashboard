<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Cars', 'Car Parts', 'Car Accessories'];
        foreach ( $categories as $category ) {
            DB::table( 'categories' )->insert( [
                'name'       =>  $category,
                'photo' => $category.'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
