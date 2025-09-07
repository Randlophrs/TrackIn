@extends('layouts.app')

@section('title', 'Riwayat Pinjama')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-[40px] font-bold">Riwayat Pinjaman</h1>
        </div>

        <div class="h-[820px] w-[100%] flex flex-col border-2 border-[#1D4ED850] rounded-lg py-3">
            <div class="h-full flex flex-col justify-between text-center rounded-lg">
                @if ($loans->isEmpty())
                    <p class="py-2 px-4 mt-80 text-[32px]">Belum ada Riwayat Pinjaman.</p>
                @else
                    <table class="min-w-full bg-white text-[20px]">
                        <thead>
                            <tr>
                                <th class="py-2 px-4">ID</th>
                                <th class="py-2 px-4">Nama Barang</th>
                                <th class="py-2 px-4">Jumlah</th>
                                <th class="py-2 px-4">Tanggal Pinjam</th>
                                <th class="py-2 px-4">Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
                                    <td class="py-2 px-4">{{$loan->id}}</td>
                                    <td class="py-2 px-4">{{$loan->item->name}}</td>
                                    <td class="py-2 px-4">{{$loan->quantity}}</td>
                                    <td class="py-2 px-4">{{date('d M Y', strtotime($loan->loan_date))}}</td>
                                    <td class="py-2 px-4">{{date('d M Y', strtotime($loan->return_date))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <div class="mt-4 flex justify-center text-white">
                    {{ $loans->appends(request()->query())->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>
    </div>
@endsection