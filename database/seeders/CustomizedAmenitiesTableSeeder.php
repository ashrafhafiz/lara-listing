<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedAmenitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenities')->delete();
        
        \DB::table('amenities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Elevator in building',
                'slug' => 'elevator-in-building',
                'amenity_icon' => 'fas fa-city',
                'status' => 1,
                'created_at' => '2023-12-31 13:42:50',
                'updated_at' => '2023-12-31 13:42:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Free coffee and tea',
                'slug' => 'free-coffee-and-tea',
                'amenity_icon' => 'fas fa-coffee',
                'status' => 1,
                'created_at' => '2023-12-31 13:47:29',
                'updated_at' => '2023-12-31 13:47:29',
            ),
        ));
        
        
    }
}