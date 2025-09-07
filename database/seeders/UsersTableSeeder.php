<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('admin123'), 'is_admin' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'User1', 'email' => 'user1@gmail.com', 'password' => bcrypt('user123'), 'is_admin' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'User2', 'email' => 'user2@gmail.com', 'password' => bcrypt('user123'), 'is_admin' => 0, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('users')->insert($items);
    }
}
