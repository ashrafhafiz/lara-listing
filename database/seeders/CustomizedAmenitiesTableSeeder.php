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
            2 => 
            array (
                'id' => 4,
                'name' => 'Good for kids',
                'slug' => 'good-for-kids',
                'amenity_icon' => 'fas fa-bicycle',
                'status' => 1,
                'created_at' => '2024-01-02 11:05:41',
                'updated_at' => '2024-01-02 11:05:41',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Reservations',
                'slug' => 'reservations',
                'amenity_icon' => 'far fa-star',
                'status' => 1,
                'created_at' => '2024-01-02 11:05:58',
                'updated_at' => '2024-01-02 11:05:58',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Alcohol',
                'slug' => 'alcohol',
                'amenity_icon' => 'fas fa-glass-martini-alt',
                'status' => 1,
                'created_at' => '2024-01-02 11:06:55',
                'updated_at' => '2024-01-02 11:06:55',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Bike Parking',
                'slug' => 'bike-parking',
                'amenity_icon' => 'fas fa-parking',
                'status' => 1,
                'created_at' => '2024-01-02 11:07:08',
                'updated_at' => '2024-01-02 11:07:08',
            ),
        ));
        
        
    }
}