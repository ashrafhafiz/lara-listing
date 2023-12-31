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
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 10:29:01',
                'updated_at' => '2023-12-31 10:29:01',
            ),
        ));
        
        
    }
}