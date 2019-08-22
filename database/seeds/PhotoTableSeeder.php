<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = ['slide1', 'slide2', 'slide3', 'slide4', 'slide5'];
        foreach ( $photos as $photo ) {
            DB::table( 'photo' )->insert( [
                'name' => $photo.'.jpeg',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
