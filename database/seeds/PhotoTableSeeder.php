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
        $photos = ['slider1', 'slider2', 'slider3', 'slider4'];
        foreach ( $photos as $photo ) {
            DB::table( 'photo' )->insert( [
                'name' => $photo.'.jpg',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
