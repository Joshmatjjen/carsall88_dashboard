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

        for ($i = 0; $i < count($photos); $i++)  {
            DB::table( 'photo' )->insert( [
                'name' =>  $photos[$i],
                'photo' => $photos[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
