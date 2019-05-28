<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Acura', 'Audi', 'BMW'];
        foreach ( $categories as $category ) {
            DB::table( 'brands' )->insert( [
                'name'       => trim( strtolower( $category ) ),
                'logo' => 'No-Logo.png',
                'type' => 1,
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
