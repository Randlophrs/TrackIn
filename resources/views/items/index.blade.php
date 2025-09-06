@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Barang</h1>
        @if (Auth::check() && Auth::user()->is_admin)
            <a href="{{ route('items.create') }}" class="text-blue-500 px-4 py-2 rounded mb-4 inline-block">Tambah Barang</a>
        @endif
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200">ID</th>
                    <th class="py-2 px-4 border-b border-gray-200">Nama Barang</th>
                    <th class="py-2 px-4 border-b border-gray-200">Category</th>
                    <th class="py-2 px-4 border-b border-gray-200">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $item->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $item->category ? $item->category->name : '-' }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection