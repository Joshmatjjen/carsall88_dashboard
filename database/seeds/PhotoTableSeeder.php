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
        $photos = ['slider1.jpeg', 'slider2.jpeg', 'slider3.jpeg', 'slider4.jpeg', 'slider5.jpeg'];

        for ($i = 0; $i < count($photos); $i++)  {
            DB::table( 'photos' )->insert( [
                'name' =>  $photos[$i],
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
