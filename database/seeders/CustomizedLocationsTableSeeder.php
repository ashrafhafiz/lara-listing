<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedLocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'New York',
                'slug' => 'new-york',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 10:28:44',
                'updated_at' => '2023-12-31 10:28:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'London',
                'slug' => 'london',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 10:28:56',
                'updated_at' => '2023-12-31 10:28:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dubai',
                'slug' => 'dubai',
                'show_at_home' => 0,
                'status' => 1,
                'created_at' => '2023-12-31 10:29:01',
                'updated_at' => '2024-01-02 11:04:27',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Paris',
                'slug' => 'paris',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 10:42:29',
                'updated_at' => '2024-01-02 11:02:43',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'Hong Kong',
                'slug' => 'hong-kong',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 11:02:17',
                'updated_at' => '2024-01-02 11:02:17',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Moscow',
                'slug' => 'moscow',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 11:02:26',
                'updated_at' => '2024-01-02 11:02:26',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Tokyo',
                'slug' => 'tokyo',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 11:02:34',
                'updated_at' => '2024-01-02 11:02:34',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Cairo',
                'slug' => 'cairo',
                'show_at_home' => 0,
                'status' => 1,
                'created_at' => '2024-01-02 11:03:18',
                'updated_at' => '2024-01-02 11:04:16',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Singapore',
                'slug' => 'singapore',
                'show_at_home' => 0,
                'status' => 1,
                'created_at' => '2024-01-02 11:03:28',
                'updated_at' => '2024-01-02 11:04:09',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Korea',
                'slug' => 'korea',
                'show_at_home' => 0,
                'status' => 1,
                'created_at' => '2024-01-02 11:03:37',
                'updated_at' => '2024-01-02 11:04:02',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Thailand',
                'slug' => 'thailand',
                'show_at_home' => 0,
                'status' => 1,
                'created_at' => '2024-01-02 11:03:47',
                'updated_at' => '2024-01-02 11:03:47',
            ),
        ));
        
        
    }
}