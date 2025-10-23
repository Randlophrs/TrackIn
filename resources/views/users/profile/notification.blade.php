@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let height = window.innerHeight - 300;
            let url = new URL(window.location.href);

            let historyRowHeight = 70;
            let historyPerPage = Math.floor((height) / historyRowHeight);
            if (isNaN(historyPerPage) || historyPerPage <= 0) {
                historyPerPage = 1;
            }

            if (!url.searchParams.has("per_page")) {
                url.searchParams.set("per_page", historyPerPage);
                window.location.href = url.toString();
            }
        });
    </script>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-[40px] font-bold">Notifikasi</h1>
        </div>

        <div class="h-[80vh] flex flex-col border-2 border-[#1D4ED850] rounded-lg py-3">
            <div class="h-full flex flex-col justify-between text-center rounded-lg">
                @if ($notifications->isEmpty())
                    <p class="mt-80 px-4 text-[32px]">Belum ada Notifikasi.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($notifications as $notification)
                            <div class="flex mx-4 mb-5 items-center">
                                <svg width="48" height="48" viewBox="0 0 84 84" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="84" height="84" rx="42" fill="#FBE98E" />
                                    <rect x="10" y="10" width="64" height="64" fill="url(#pattern0_201_2346)" />
                                    <defs>
                                        <pattern id="pattern0_201_2346" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_201_2346" transform="scale(0.0078125)" />
                                        </pattern>
                                        <image id="image0_201_2346" width="128" height="128" preserveAspectRatio="none"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                                <div class="mx-4 w-full">
                                    <div class="flex justify-between items-center w-full ">
                                        <p class="text-[20px] font-bold">{{ $notification->title }}</p>
                                        <p class="text-[16px] font-semibold">
                                            {{date('H:i d M', strtotime($notification->created_at))}}
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <p class="text-[16px]">{{ $notification->message }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="mt-4 flex justify-center text-white">
                    {{ $notifications->appends(request()->query())->links('vendor.pagination.simple') }}
                </div>
            </div>
        </div>
    </div>
@endsection