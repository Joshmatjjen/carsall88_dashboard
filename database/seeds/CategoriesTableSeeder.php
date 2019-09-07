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

        for ($i = 0; $i < count($categories); $i++)  {
            DB::table( 'categories' )->insert( [
                'name' =>  $categories[$i],
                'photo' => $categories[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
