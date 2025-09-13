@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let height = window.innerHeight - document.getElementById("header-content").offsetHeight - document.getElementById("top-content").offsetHeight - 300;
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

            let notifRowHeight = 95;
            let notifPerPage = Math.floor((height) / notifRowHeight);
            if (isNaN(notifPerPage) || notifPerPage <= 0) {
                notifPerPage = 1;
            }

            if (!url.searchParams.has("notif_per_page")) {
                url.searchParams.set("notif_per_page", notifPerPage);
                window.location.href = url.toString();
            }
        });
    </script>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center" id="header-content">
            <h1 class="text-[40px] font-bold">Halo, {{$user->name}}</h1>
        </div>

        <div class="flex mt-4 justify-around border-2 border-[#1D4ED850] rounded-lg py-6" id="top-content">
            <div class="flex flex-col items-center">
                <h1 class="text-2xl font-semibold">Total barang</h1>
                <div class="flex items-center gap-4 mt-4">
                    <img src="{{asset('images/icons/dashboard-1.png')}}" alt="icon" class="w-12 h-12">
                    <p class="text-[24px]">{{$items}}</p>
                </div>
            </div>

            <div class="w-1 bg-[#1D4ED820] rounded-lg mx-[-64px]"></div>

            <div class="flex flex-col items-center">
                <h1 class="text-2xl font-semibold">Barang yang dipinjam</h1>
                <div class="flex items-center gap-4 mt-4">
                    <img src="{{asset('images/icons/dashboard-2.png')}}" alt="icon" class="w-12 h-12">
                    <p class="text-[24px]">{{$loans->whereNull('return_date')->count()}}</p>
                </div>
            </div>

            <div class="w-1 bg-[#1D4ED820] rounded-lg mx-[-64px]"></div>

            <div class="flex flex-col items-center">
                <h1 class="text-2xl font-semibold">Banyak pinjaman</h1>
                <div class="flex items-center gap-4 mt-4">
                    <img src="{{asset('images/icons/dashboard-3.png')}}" alt="icon" class="w-12 h-12">
                    <p class="text-[24px]">{{$loans->count()}}</p>
                </div>
            </div>
        </div>

        <div class="h-[65vh] flex justify-between mt-6" id="bottom-content">
            <div class="w-[59%] flex flex-col border-2 border-[#1D4ED850] rounded-lg py-6">
                <div class="flex justify-between mx-6 mb-5">
                    <h1 class="text-2xl font-bold">Riwayat Pinjaman</h1>
                    <a href="{{route('history')}}">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.5331 13.1733L14.4131 7.05333C14.1633 6.805 13.8253 6.66561 13.4731 6.66561C13.1208 6.66561 12.7829 6.805 12.5331 7.05333C12.4081 7.17729 12.3089 7.32475 12.2412 7.48723C12.1735 7.64971 12.1387 7.82399 12.1387 8C12.1387 8.17602 12.1735 8.35029 12.2412 8.51277C12.3089 8.67525 12.4081 8.82272 12.5331 8.94667L18.6664 15.0533C18.7914 15.1773 18.8906 15.3248 18.9583 15.4872C19.0259 15.6497 19.0608 15.824 19.0608 16C19.0608 16.176 19.0259 16.3503 18.9583 16.5128C18.8906 16.6753 18.7914 16.8227 18.6664 16.9467L12.5331 23.0533C12.282 23.3026 12.1402 23.6415 12.139 23.9953C12.1377 24.3491 12.2771 24.6889 12.5264 24.94C12.7757 25.1911 13.1145 25.3328 13.4684 25.3341C13.8222 25.3353 14.162 25.196 14.4131 24.9467L20.5331 18.8267C21.2821 18.0767 21.7029 17.06 21.7029 16C21.7029 14.94 21.2821 13.9233 20.5331 13.1733Z"
                                fill="#0B0C0C" />
                        </svg>
                    </a>
                </div>
                <div class="flex flex-col justify-between text-center rounded-lg">
                    @if ($loans->whereNotNull('return_date')->isEmpty())
                        <p class="mt-50 px-4 text-[32px]">Belum ada riwayat pinjaman.</p>
                    @else
                        <table class="min-w-full bg-white text-[20px]">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">Nama Barang</th>
                                    <th class="py-2 px-4">Jumlah</th>
                                    <th class="py-2 px-4">Tanggal Pinjam</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($loans->whereNotNull('return_date') as $loan)
                                    <tr>
                                        <td class="py-2 px-4">{{$loan->item->name}}</td>
                                        <td class="py-2 px-4">{{$loan->quantity}}</td>
                                        <td class="py-2 px-4">{{date('d M Y', strtotime($loan->loan_date))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <div class="flex justify-center text-white">
                        {{ $loans->appends(request()->query())->links('vendor.pagination.simple') }}
                    </div>
                </div>
            </div>

            <div class="w-[39%] flex flex-col border-2 border-[#1D4ED850] rounded-lg py-6">
                <div class="flex justify-between mx-6 mb-5">
                    <h1 class="text-2xl font-bold">Notifikasi</h1>
                    <a href="{{route('notification')}}">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.5331 13.1733L14.4131 7.05333C14.1633 6.805 13.8253 6.66561 13.4731 6.66561C13.1208 6.66561 12.7829 6.805 12.5331 7.05333C12.4081 7.17729 12.3089 7.32475 12.2412 7.48723C12.1735 7.64971 12.1387 7.82399 12.1387 8C12.1387 8.17602 12.1735 8.35029 12.2412 8.51277C12.3089 8.67525 12.4081 8.82272 12.5331 8.94667L18.6664 15.0533C18.7914 15.1773 18.8906 15.3248 18.9583 15.4872C19.0259 15.6497 19.0608 15.824 19.0608 16C19.0608 16.176 19.0259 16.3503 18.9583 16.5128C18.8906 16.6753 18.7914 16.8227 18.6664 16.9467L12.5331 23.0533C12.282 23.3026 12.1402 23.6415 12.139 23.9953C12.1377 24.3491 12.2771 24.6889 12.5264 24.94C12.7757 25.1911 13.1145 25.3328 13.4684 25.3341C13.8222 25.3353 14.162 25.196 14.4131 24.9467L20.5331 18.8267C21.2821 18.0767 21.7029 17.06 21.7029 16C21.7029 14.94 21.2821 13.9233 20.5331 13.1733Z"
                                fill="#0B0C0C" />
                        </svg>
                    </a>
                </div>
                <div class="h-[calc(100vh-50%)] flex flex-col justify-between text-center rounded-lg">
                    @if ($notifications->isEmpty())
                        <p class="mt-50 px-4 text-[32px]">Belum ada notifikasi.</p>
                    @else
                        <div class="space-y-4">
                            @foreach ($notifications as $notification)
                                <div class="border-2 border-[#1D4ED850] rounded-lg p-3 mx-4">
                                    <div class="flex flex-col gap-2 justify-between">
                                        <div class="flex justify-between">
                                            <p class="text-[18px] font-bold">{{ $notification->title }}</p>
                                            <p class="text-[16px] font-semibold">
                                                {{date('H:i d M', strtotime($notification->created_at))}}
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <p class="text-[18px]">{{ $notification->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @endif
                        <div class="flex justify-center text-white">
                            {{ $notifications->appends(request()->query())->links('vendor.pagination.simple') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection