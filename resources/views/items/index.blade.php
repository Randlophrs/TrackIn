@extends('layouts.app')

@section('title', 'Items')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <h1 class="text-[40px] font-bold mb-4">Daftar Barang</h1>
            {{-- @if (Auth::check() && Auth::user()->is_admin)
                <a href="}"
                    class="flex items-center gap-4 text-[28px] border-2 border-[#FF8811] text-[#FF8811] px-4 py-1 rounded-xl font-semibold">
                    <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_297_1491)">
                            <path
                                d="M30 14H18V2C18 0.895437 17.1046 0 16 0C14.8954 0 14 0.895437 14 2V14H2C0.895437 14 0 14.8954 0 16C0 17.1046 0.895437 18 2 18H14V30C14 31.1046 14.8954 32 16 32C17.1046 32 18 31.1046 18 30V18H30C31.1046 18 32 17.1046 32 16C32 14.8954 31.1046 14 30 14Z"
                                fill="#F97316" />
                        </g>
                        <defs>
                            <clipPath id="clip0_297_1491">
                                <rect width="32" height="32" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    Tambah Barang</a>
            @endif --}}
        </div>

        <div class="flex gap-2 mb-4">
            @php
                $categories = ['semua', 'alat tulis', 'elektronik', 'perabot', 'buku', 'olahraga'];
                $current = request('category', 'semua');
            @endphp
            @foreach ($categories as $category)
                <a href="{{ route('items.index', ['category' => $category === 'semua' ? null : $category]) }}"
                    class="px-4 py-2 rounded-xl font-semibold {{ strtolower($category) === strtolower($current) ? 'bg-[#FF8811] text-[#FDFFFC]' : 'border-1 border-[#FF8811] text-[#FF8811]' }}">
                    {{ ucfirst($category) }}
                </a>
            @endforeach
        </div>

        <div class="flex flex-wrap gap-10">
            @foreach ($items as $item)
                @if ($current === 'semua' || strtolower($item->category->name) === strtolower($current))
                    <div class="flex flex-col justify-between border-2 border-[#5260F0] p-4 rounded-xl w-[23%]">
                        <div>
                            <div class="flex justify-center">
                                <img src="{{ asset('images/items/' . $item->image) }}" alt="Image"
                                    class="w-24 h-24 object-cover mb-2 rounded-lg">
                            </div>
                            <p class="text-3xl font-bold">{{$item->name}}</p>
                            <p class="text-base">{{$item->category->name}}</p>
                        </div>
                        <div class="flex justify-between items-center mt-5">
                            <p class="text-2xl">Tersedia: {{$item->quantity}}</p>
                            <a href="{{ route('items.show', $item->id)}}"
                                class="text-2xl text-[#FDFFFC] bg-[#FF8811] px-8 py-1 font-semibold rounded-xl hover:bg-[#FF6C11] transition duration-300 ease-in-out">Pinjam</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

@endsection