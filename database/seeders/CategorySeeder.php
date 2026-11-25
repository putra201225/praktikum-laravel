<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Undangan', 'Pemberitahuan', 'Permohonan'] as $nama) {
            Category::firstOrCreate(['nama' => $nama]);
        }
    }
}