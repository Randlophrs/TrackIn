# 📦 TrackIn  

TrackIn adalah sebuah platform manajemen inventaris sekolah yang membantu pihak sekolah dalam mengelola barang-barang sekaligus mempermudah siswa untuk melakukan peminjaman barang.  

## ✨ Fitur Utama  
Saat ini, proyek masih dalam tahap awal pengembangan, namun sudah memiliki simulasi beberapa fitur:  
- 📊 **Dashboard** – menampilkan ringkasan data inventaris & peminjaman.  
- 📦 **List Barang** – daftar barang yang tersedia di sekolah.  
- 🕒 **History Peminjaman** – catatan riwayat barang yang dipinjam.  
- 🔔 **Notifikasi** – pemberitahuan terkait status peminjaman.  
- 🔍 **Filter** – memudahkan pencarian barang.  
- 🗄️ **Database** – penyimpanan data inventaris dan transaksi.  

## 🛠️ Tech Stack
- Laravel (Backend & Framework)
- MySQL (Database)
- Blade + Tailwind (Frontend)
- Composer & NPM (Dependencies)

⚠️ Catatan:  
- Proyek ini **belum sepenuhnya responsif** di semua perangkat.  
- Masih akan terus dikembangkan dengan penambahan fitur baru & perbaikan.  

## 🚀 Instalasi & Penggunaan  

1. **Clone Repository**  
   ```bash
   git clone https://github.com/Randlophrs/TrackIn.git
   cd TrackIn
   ```

2. **Instalasi Dependensi**  
   Pastikan sudah menginstal [Composer](https://getcomposer.org/) dan [Node.js](https://nodejs.org/).  
   ```bash
   composer install
   npm install 
   npm run dev
   ```

3. **Konfigurasi Environment**  
   Buat file `.env` dari template:  
   ```bash
   cp .env.example .env
   ```
   Lalu sesuaikan konfigurasi database dan pengaturan lain di file `.env`.  

4. **Generate App Key**  
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**  
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan Aplikasi**  
   ```bash
   php artisan serve
   ```  

## 📌 Rencana Pengembangan  
- Responsif untuk semua device.  
- Sistem role user (Admin, Siswa, Guru).  
- Laporan & statistik peminjaman barang.

## 🙏 Penutup  
TrackIn masih dalam tahap awal pengembangan 🚧, tapi kami percaya aplikasi ini akan membantu sekolah dalam mengelola inventaris secara lebih efektif.  
Kami sangat terbuka terhadap kritik, saran, maupun kontribusi dari komunitas.  
