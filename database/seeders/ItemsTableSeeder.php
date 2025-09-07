<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['name' => 'Pensil', 'category_id' => 1, 'quantity' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pulpen', 'category_id' => 1, 'quantity' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptop', 'category_id' => 2, 'quantity' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Proyektor', 'category_id' => 2, 'quantity' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Meja', 'category_id' => 3, 'quantity' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kursi', 'category_id' => 3, 'quantity' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku Matematika', 'category_id' => 4, 'quantity' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku Bahasa Indonesia', 'category_id' => 4, 'quantity' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bola Sepak', 'category_id' => 5, 'quantity' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raket', 'category_id' => 5, 'quantity' => 8, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('items')->insert($items);
    }
}
