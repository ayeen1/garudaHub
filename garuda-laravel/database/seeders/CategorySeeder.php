<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $kategori = ['Web', 'Mobile', 'Desain', 'Data', 'AI'];

        foreach ($kategori as $nama) {
            Category::create([
                'name' => $nama,
                'slug' => strtolower($nama),
            ]);
        }
    }
}
