@extends('layouts.app')

@section('title', 'Riwayat Pinjama')

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let height = window.innerHeight - 300;
            let url = new URL(window.location.href);

            let historyRowHeight = 45;
            let historyPerPage = Math.floor((height) / historyRowHeight);
            if (isNaN(historyPerPage) || historyPerPage <= 0) {
                historyPerPage = 1;
            }

            if (!url.searchParams.has("history_per_page")) {
                url.searchParams.set("history_per_page", historyPerPage);
                window.location.href = url.toString();
            }
        });
    </script>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-[40px] font-bold">Riwayat Pinjaman</h1>
        </div>

        <div class="flex gap-2 mb-4">
            @php
                $categories = ['semua', 'alat tulis', 'elektronik', 'perabot', 'buku', 'olahraga'];
                $current = request('category', 'semua');
            @endphp
            @foreach ($categories as $category)
                <a href="{{ route('history', ['category' => $category === 'semua' ? null : $category]) }}"
                    class="px-4 py-2 rounded-xl font-semibold {{ strtolower($category) === strtolower($current) ? 'bg-[#FF8811] text-[#FDFFFC]' : 'border-1 border-[#FF8811] text-[#FF8811]' }}">
                    {{ ucfirst($category) }}
                </a>
            @endforeach
        </div>

        <div class="h-[80vh] w-[100%] flex flex-col border-2 border-[#1D4ED850] rounded-lg py-3">
            <div class="h-full flex flex-col justify-between text-center rounded-lg">
                @if ($loans->isEmpty())
                    <p class="mt-80 px-4 text-[32px]">Belum ada Riwayat Pinjaman.</p>
                @else
                    <table class="min-w-full bg-white text-[20px]">
                        <thead>
                            <tr>
                                <th class="py-2 px-4">Nama Barang</th>
                                <th class="py-2 px-4">Jumlah</th>
                                <th class="py-2 px-4">Tanggal Pinjam</th>
                                <th class="py-2 px-4">Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
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