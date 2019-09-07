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
        $brands = ['Abarth', 'AC', 'Acura', 'Aixam',  'Alfa Romeo', 'Ariel', 'Arrinera', 'Aston Martin', 'Audi', 'Bentley', 'BMW', 'Bugatti', 'Buick', 'Cadillac', 'Caterham', 'Chevrolet', 'Chrysler', 'Citroen', 'Corvette', 'Dacia', 'Daf', 'Daihatsu', 'Dodge', 'DR Motor', 'Elfin' ,'Ferrari', 'Fiat', 'Ford', 'Gaz', 'Geely', 'Gillet', 'Ginetta', 'GMC', 'Great Wall', 'Gumpert', 'Hennessey', 'Holden', 'Honda', 'Hummer', 'Hyundai', 'Infiniti', 'Innoson', 'Isuzu', 'Jaguar', 'Jeep', 'Joss', 'Kia', 'Koenigsegg', 'Lada', 'Lamborghini', 'Lancia', 'Land Rover', 'Lexus', 'Lincoln', 'Lotus', 'Luxgen', 'Mahindra', 'Maruti Suzuki', 'Maserati', 'Maybach', 'Mclaren', 'Mazda', 'McLaren', 'Mercedes Benz', 'Mercury', 'MG', 'Mini', 'Mitsubishi', 'Morgan', 'Mustang', 'Nissan', 'Noble', 'Opel', 'Pagani', 'Panoz', 'Perodua', 'Peugeot', 'Piaggio', 'Pininfarina', 'Pontiac', 'Porsche', 'Proton', 'Ram', 'Renault', 'Reva', 'Rimac', 'Rolls Royce', 'Ruf', 'Saab', 'Saturn', 'Scion', 'Seat', 'Shelby', 'Skoda', 'Smart', 'Spyker', 'SsangYong', 'SSC', 'Subaru', 'Suzuki', 'Tata Motors', 'Tatra', 'Tesla', 'Toyota', 'Tramontana', 'Troller', 'TVR', 'UAZ', 'Vandenbrink', 'Vauxhall', 'Vector Motors', 'Venturi', 'Volkswagen', 'Volvo', 'Wiesmann', 'Zagato', 'Zaz', 'Zil'];
        for ($i = 0; $i < count($brands); $i++)  {
            DB::table( 'brands' )->insert( [
                'name' =>  $brands[$i],
                'logo' => $brands[$i].'.png',
                'created_at' => Carbon::now(),
            ] );
        }
    }
}
