<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            // Alat Tulis (category_id = 1)
            ['name' => 'Pensil', 'category_id' => 1, 'quantity' => 200, 'image' => 'pensil.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pulpen', 'category_id' => 1, 'quantity' => 180, 'image' => 'pen.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penghapus', 'category_id' => 1, 'quantity' => 120, 'image' => 'penghapus papan tulis.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rautan', 'category_id' => 1, 'quantity' => 80, 'image' => 'peraut.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buku Tulis', 'category_id' => 1, 'quantity' => 250, 'image' => 'buku tulis.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Penggaris', 'category_id' => 1, 'quantity' => 100, 'image' => 'penggaris.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Spidol', 'category_id' => 1, 'quantity' => 90, 'image' => 'spidol.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tinta Spidol', 'category_id' => 1, 'quantity' => 60, 'image' => 'tinta spidol.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gunting', 'category_id' => 1, 'quantity' => 50, 'image' => 'gunting.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lakban', 'category_id' => 1, 'quantity' => 70, 'image' => 'lakban.png', 'created_at' => now(), 'updated_at' => now()],

            // Elektronik (category_id = 2)
            ['name' => 'Komputer', 'category_id' => 2, 'quantity' => 10, 'image' => 'komputer.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Proyektor', 'category_id' => 2, 'quantity' => 5, 'image' => 'proyektor.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Printer', 'category_id' => 2, 'quantity' => 6, 'image' => 'printer.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kabel HDMI/VGA', 'category_id' => 2, 'quantity' => 20, 'image' => 'kabel vga.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kabel LAN', 'category_id' => 2, 'quantity' => 15, 'image' => 'kabel lan.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flashdisk', 'category_id' => 2, 'quantity' => 40, 'image' => 'flashdisk.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Speaker', 'category_id' => 2, 'quantity' => 12, 'image' => 'speaker.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tablet', 'category_id' => 2, 'quantity' => 8, 'image' => 'tablet.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Monitor LCD', 'category_id' => 2, 'quantity' => 10, 'image' => 'monitor lcd.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'stop kontak', 'category_id' => 2, 'quantity' => 6, 'image' => 'stop kontak.png', 'created_at' => now(), 'updated_at' => now()],

            // Perabot (category_id = 3)
            ['name' => 'Meja', 'category_id' => 3, 'quantity' => 20, 'image' => 'meja.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kursi', 'category_id' => 3, 'quantity' => 40, 'image' => 'kursi.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'locker', 'category_id' => 3, 'quantity' => 5, 'image' => 'locker.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Papan Tulis', 'category_id' => 3, 'quantity' => 8, 'image' => 'papan tulis.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rak Buku', 'category_id' => 3, 'quantity' => 10, 'image' => 'rak buku.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tempat Sampah', 'category_id' => 3, 'quantity' => 15, 'image' => 'tong sampah.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sapu', 'category_id' => 3, 'quantity' => 7, 'image' => 'sapu.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pengki', 'category_id' => 3, 'quantity' => 6, 'image' => 'pengki.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kipas', 'category_id' => 3, 'quantity' => 10, 'image' => 'kipas angin.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AC', 'category_id' => 3, 'quantity' => 4, 'image' => 'ac.png', 'created_at' => now(), 'updated_at' => now()],

            // Buku (category_id = 4)
            ['name' => 'Matematika', 'category_id' => 4, 'quantity' => 30, 'image' => 'buku matematika.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B.Indonesia', 'category_id' => 4, 'quantity' => 30, 'image' => 'buku bahasa indonesia.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B.Inggris', 'category_id' => 4, 'quantity' => 25, 'image' => 'buku bahasa inggris.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Novel', 'category_id' => 4, 'quantity' => 20, 'image' => 'novel.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sejarah', 'category_id' => 4, 'quantity' => 20, 'image' => 'buku sejarah.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Atlas/Globe', 'category_id' => 4, 'quantity' => 15, 'image' => 'atlas.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fisika', 'category_id' => 4, 'quantity' => 25, 'image' => 'buku fisika.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kimia', 'category_id' => 4, 'quantity' => 25, 'image' => 'buku kimia.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ekonomi', 'category_id' => 4, 'quantity' => 20, 'image' => 'buku ekonomi.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'B.Mandarin', 'category_id' => 4, 'quantity' => 15, 'image' => 'buku mandarin.png', 'created_at' => now(), 'updated_at' => now()],

            // Olahraga (category_id = 5)
            ['name' => 'Tenis Meja', 'category_id' => 5, 'quantity' => 30, 'image' => 'tenis meja.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bola Sepak', 'category_id' => 5, 'quantity' => 20, 'image' => 'bola sepak.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bola Basket', 'category_id' => 5, 'quantity' => 15, 'image' => 'bola basket.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bola Voli', 'category_id' => 5, 'quantity' => 15, 'image' => 'bola volly.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raket Badminton', 'category_id' => 5, 'quantity' => 12, 'image' => 'raket badminton.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Matras', 'category_id' => 5, 'quantity' => 10, 'image' => 'matras.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bola Kasti', 'category_id' => 5, 'quantity' => 10, 'image' => 'bola kasti.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Peluit', 'category_id' => 5, 'quantity' => 20, 'image' => 'peluit.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Net', 'category_id' => 5, 'quantity' => 5, 'image' => 'net.png', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tali Tambang', 'category_id' => 5, 'quantity' => 8, 'image' => 'tali tambang.png', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('items')->insert($items);
    }
}
