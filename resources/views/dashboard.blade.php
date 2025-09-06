@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Selamat Datang di Halaman Utama</h1>
        <p class="mb-4">Ini adalah halaman utama aplikasi TrackIn.</p>
        <a href="{{ route('items.index') }}" class="text-blue-500 underline">Lihat Daftar Barang</a>
    </div>
@endsection