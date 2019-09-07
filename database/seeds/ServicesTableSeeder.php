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
        $services = ['Accidented Vehicle', 'Battery & Alternator System', 'Brake & Accelerator Repairs', 'Car Scan', 'Car Servicing',  'Car Tint', 'Chassis & Suspension', 'Cooling System', 'Engine Service', 'Exhaust System', 'Electrical Repairs', 'Fuel Injection & Pump Repairs', 'Hybrid Car Services', 'Security Lock Repairs', 'Shock and Strut Replacement', 'Oil & Filtering Change', 'Panel Beater', 'Painter', 'Radiator & Fill Service', 'Tow Trucks', 'Transmission Fluid Service', 'Upholstery & Interior', 'Wheel Balancing & Alignment'];
        for ($i = 0; $i < count($services); $i++)  {
            DB::table( 'services' )->insert( [
                'name' =>  $services[$i],
                'photo' => $services[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
