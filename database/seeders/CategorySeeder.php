<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB ::table('categories')->insert([
            [
                'category_name' => 'Action',
                'description' => 'Film dengan adegan-adegan penuh aksi dan ketegangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Comedy',
                'description' => 'Film yang bertujuan untuk menghibur dan membuat penonton tertawa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Drama',
                'description' => 'Film yang berfokus pada pengembangan karakter dan konflik emosional',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Sci-fi',
                'description' => 'Film dengan latar belakang fiksi ilmiah dan teknologi futuristik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Romance',
                'description' => 'Film yang berpusat pada hubungan asmara dan cinta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
