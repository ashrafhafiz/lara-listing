<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        // Create Admin Account
        User::insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'user_type' => 'admin',
            'gender' => 'male',
            'phone' => '01011157600',
            'address' => 'Mokatam Hightes',
            'website' => 'www.gc-3.com',
            'bio' => "Super Admin is a superhero name in Indonesia, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with 'John Doe'",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // Create 10 Users
        User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
