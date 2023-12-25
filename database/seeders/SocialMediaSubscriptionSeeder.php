<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SocialMediaSubscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialMediaSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('social_media_subscriptions')->truncate();

        $users = User::all();
        $social_media_types_array = [
            'adn', 'bitbucket', 'dropbox', 'facebook', 'flickr', 'foursquare', 'github',
            'google', 'instagram', 'linkedin', 'microsoft', 'odnoklassniki', 'openid',
            'pinterest', 'reddit', 'soundcloud', 'tumblr', 'twitter', 'vimeo', 'vk', 'yahoo'
        ];

        // for each user do the following
        foreach ($users as $user) {
            // generate a random number will represent the number of social media subscriptions
            $random_value = rand(1, 5);
            $data = [];
            // repeat for the genareted random number
            for ($i = 1; $i < $random_value; $i++) {
                // select random item form $social_media_types_array and get the value $value = $array[array_rand($array)];
                $social_media_type = $social_media_types_array[array_rand($social_media_types_array)];
                // dump($social_media_type);
                // construct the table record
                $item = [
                    'user_id' => $user->id,
                    'social_media_type' => $social_media_type,
                    'social_media_link' => 'https://www.' . $social_media_type . '.com/ashrafhafiz',
                ];
                // append the user data records
                array_push($data, $item);
            }
            // create the user's record.
            SocialMediaSubscription::insert($data);
        }
        // SocialMediaSubscription::insert([
        //     [
        //         'user_id' => 1,
        //         'social_media_type' => 'facebook',
        //         'social_media_link' => 'https://www.facebook.com/ashrafhafiz',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'social_media_type' => 'twitter',
        //         'social_media_link' => 'https://www.twitter.com/ashrafhafiz',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'social_media_type' => 'github',
        //         'social_media_link' => 'https://www.github.com/ashrafhafiz',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'social_media_type' => 'reddit',
        //         'social_media_link' => 'https://www.reddit.com/ashrafhafiz',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'social_media_type' => 'yahoo',
        //         'social_media_link' => 'https://www.yahoo.com/ashrafhafiz',
        //     ],
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
