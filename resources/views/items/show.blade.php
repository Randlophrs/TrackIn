@extends('layouts.app')

@section('title', 'detail')

@section('content')
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-[40px] font-bold">Peminjaman Barang</h1>
        </div>

        <div class="flex gap-5 border-2 border-[#5260F0] rounded-xl">
            <div class="w-1/3 p-4">
                <img src="{{ asset('images/items/' . $item->image) }}" alt="Image"
                    class="w-24 h-24 object-cover mb-2 rounded-lg">
                <p class="text-3xl font-bold">{{$item->name}}</p>
                <p class="text-base">{{$item->category->name}}</p>

                <p class="text-2xl">Tersedia: {{$item->quantity}}</p>
            </div>
            <div class="w-1/3 p-4">
                <form action="{{route('items.loan', $item->id)}}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <div>
                        <label for="loan_name" class="block text-lg font-medium mb-2">Nama Peminjam:</label>
                        <input type="text" id="loan_name" name="loan_name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none bg-gray-200"
                            required disabled value="{{ $user ? $user->name : '' }}">

                        <label for="loan_quantity" class="block text-lg font-medium mb-2">Jumlah Barang</label>
                        <input type="number" id="loan_quantity" name="loan_quantity"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#FF8811]"
                            required value="1" min="1" max="{{ $item->quantity }}">

                        <label for="loan_date" class="block text-lg font-medium mb-2">Tanggal Pinjam</label>
                        <input type="date" id="loan_date" name="loan_date"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none bg-gray-200"
                            required disabled value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}">

                        <div class="flex justify-center">
                            <button type="submit"
                                class="text-2xl rounded-xl font-bold text-white bg-[#FF8811] px-12 py-1 mt-5 cursor-pointer hover:bg-[#FF6C11] transition duration-300 ease-in-out">Pinjam</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection