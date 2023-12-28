<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('heroes')->truncate();

        // Create Admin Account
        Hero::insert([
            'bg_img' => '/default/banner_bg.jpg',
            'title' => 'Let us help you Find Buy & Own Dreams',
            'subtitle' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos quasi facilis, cupiditate rem voluptates omnis repellat consectetur nihil quod a, illo nemo eveniet iste, minima delectus doloribus! Praesentium, maiores iusto?',
            'active' => 1,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
