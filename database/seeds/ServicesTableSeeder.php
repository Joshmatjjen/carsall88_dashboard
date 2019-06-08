<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Accidented Vehicle', 'Battery & Alternator System', 'Brake & Accelerator Repairs', 'Car Servicing', 'Car Scan', 'Car Tint', 'Car Scan', 'Chassis & Suspension', 'Cooling System', 'Engine Service', 'Exhaust System', 'Electrical Repairs', 'Fuel Injection & Pump Repairs', 'Hybrid Car Services', 'Security Lock Repairs', 'Shock and Strut Replacement', 'Oil & Filtering Change', 'Panel Beater', 'Painter', 'Radiator & Fill Service', 'Tow Trucks', 'Transmission Fluid Service', 'Upholstery & Interior', 'Wheel Balancing & Alignment'];
        foreach ( $categories as $category ) {
            DB::table( 'services' )->insert( [
                'name' =>  $category,
                'photo' => $category.'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
