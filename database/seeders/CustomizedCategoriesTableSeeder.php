<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomizedCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('Categories')->delete();
        
        \DB::table('Categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Office',
                'slug' => 'office',
                'icon_img' => '/uploads/media_icon_img_6593ec2b6a47e.png',
                'bg_img' => '/uploads/media_bg_img_65911bd2de8c1.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 07:44:18',
                'updated_at' => '2024-01-02 10:57:47',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business',
                'slug' => 'business',
                'icon_img' => '/uploads/media_icon_img_6593ec38ef557.png',
                'bg_img' => '/uploads/media_bg_img_65911c06a8e6d.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2023-12-31 07:45:10',
                'updated_at' => '2024-01-02 10:58:00',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'University',
                'slug' => 'university',
                'icon_img' => '/uploads/media_icon_img_6593ec70bab7e.png',
                'bg_img' => '/uploads/media_bg_img_6593ec70bafce.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 10:58:56',
                'updated_at' => '2024-01-02 10:58:56',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Park',
                'slug' => 'park',
                'icon_img' => '/uploads/media_icon_img_6593ec904114a.png',
                'bg_img' => '/uploads/media_bg_img_6593ec904162d.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 10:59:28',
                'updated_at' => '2024-01-02 10:59:28',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'Restaurant',
                'slug' => 'restaurant',
                'icon_img' => '/uploads/media_icon_img_6593ecaa4469e.png',
                'bg_img' => '/uploads/media_bg_img_6593ecaa44d64.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 10:59:54',
                'updated_at' => '2024-01-02 10:59:54',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'Home',
                'slug' => 'home',
                'icon_img' => '/uploads/media_icon_img_6593ecc0d9337.png',
                'bg_img' => '/uploads/media_bg_img_6593ecc0d99b0.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 11:00:16',
                'updated_at' => '2024-01-02 11:00:16',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'Hotel and Resort',
                'slug' => 'hotel-and-resort',
                'icon_img' => '/uploads/media_icon_img_6593ecd6d5749.png',
                'bg_img' => '/uploads/media_bg_img_6593ecd6d5beb.jpg',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => '2024-01-02 11:00:38',
                'updated_at' => '2024-01-02 11:00:38',
            ),
        ));
        
        
    }
}