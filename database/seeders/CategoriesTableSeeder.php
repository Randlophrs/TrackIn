<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Alat Tulis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Perabot', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Olahraga', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
