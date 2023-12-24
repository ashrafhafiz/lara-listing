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
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'user_type' => 'admin',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // Create 10 Users
        User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
