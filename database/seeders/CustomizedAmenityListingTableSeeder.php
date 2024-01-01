<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedAmenityListingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('amenity_listing')->delete();
        
        \DB::table('amenity_listing')->insert(array (
            0 => 
            array (
                'id' => 1,
                'listing_id' => 9,
                'amenity_id' => 1,
                'created_at' => '2024-01-01 19:34:17',
                'updated_at' => '2024-01-01 19:34:17',
            ),
            1 => 
            array (
                'id' => 2,
                'listing_id' => 9,
                'amenity_id' => 2,
                'created_at' => '2024-01-01 19:34:17',
                'updated_at' => '2024-01-01 19:34:17',
            ),
            2 => 
            array (
                'id' => 3,
                'listing_id' => 10,
                'amenity_id' => 1,
                'created_at' => '2024-01-01 19:36:26',
                'updated_at' => '2024-01-01 19:36:26',
            ),
            3 => 
            array (
                'id' => 4,
                'listing_id' => 10,
                'amenity_id' => 2,
                'created_at' => '2024-01-01 19:36:26',
                'updated_at' => '2024-01-01 19:36:26',
            ),
        ));
        
        
    }
}