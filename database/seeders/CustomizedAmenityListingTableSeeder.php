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
                'id' => 3,
                'listing_id' => 10,
                'amenity_id' => 1,
                'created_at' => '2024-01-01 19:36:26',
                'updated_at' => '2024-01-01 19:36:26',
            ),
            1 => 
            array (
                'id' => 4,
                'listing_id' => 10,
                'amenity_id' => 2,
                'created_at' => '2024-01-01 19:36:26',
                'updated_at' => '2024-01-01 19:36:26',
            ),
            2 => 
            array (
                'id' => 15,
                'listing_id' => 9,
                'amenity_id' => 2,
                'created_at' => '2024-01-02 09:39:22',
                'updated_at' => '2024-01-02 09:39:22',
            ),
            3 => 
            array (
                'id' => 16,
                'listing_id' => 3,
                'amenity_id' => 1,
                'created_at' => '2024-01-02 09:39:45',
                'updated_at' => '2024-01-02 09:39:45',
            ),
            4 => 
            array (
                'id' => 17,
                'listing_id' => 3,
                'amenity_id' => 2,
                'created_at' => '2024-01-02 09:39:45',
                'updated_at' => '2024-01-02 09:39:45',
            ),
            5 => 
            array (
                'id' => 18,
                'listing_id' => 4,
                'amenity_id' => 2,
                'created_at' => '2024-01-02 09:40:22',
                'updated_at' => '2024-01-02 09:40:22',
            ),
            6 => 
            array (
                'id' => 19,
                'listing_id' => 5,
                'amenity_id' => 1,
                'created_at' => '2024-01-02 09:40:53',
                'updated_at' => '2024-01-02 09:40:53',
            ),
            7 => 
            array (
                'id' => 20,
                'listing_id' => 1,
                'amenity_id' => 2,
                'created_at' => '2024-01-02 09:41:25',
                'updated_at' => '2024-01-02 09:41:25',
            ),
            8 => 
            array (
                'id' => 21,
                'listing_id' => 7,
                'amenity_id' => 1,
                'created_at' => '2024-01-02 09:43:47',
                'updated_at' => '2024-01-02 09:43:47',
            ),
        ));
        
        
    }
}