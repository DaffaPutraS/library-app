<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sains & Teknologi',
            'Sejarah',
            'Biografi & Memoar',
            'Anak & Remaja',
            'Agama & Filsafat',
            'Pendidikan',
            'Kesehatan',
            'Bisnis & Ekonomi',
            'Sastra & Seni',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
