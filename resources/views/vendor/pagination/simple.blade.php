@if ($paginator->hasPages())
    <nav class="flex justify-center mt-2">
        <ul class="inline-flex items-center space-x-3 text-xl">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="px-4 py-2 rounded bg-gray-200 text-gray-500 cursor-not-allowed">&lt;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">&lt;</a>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $start = max(1, $current - 1); // mulai 2 sebelum current
                $end = min($last, $current + 1); // akhir 2 setelah current

                if ($end - $start < 1) {
                    if ($start > 1) {
                        $start = max(1, $end - 1);
                    } elseif ($end < $last) {
                        $end = min($last, $start + 1);
                    }
                }
            @endphp

            {{-- Tampilkan halaman pertama + ... --}}
            @if ($start > 1)
                <li><a href="{{ $paginator->url(1) }}" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">1</a></li>
                @if ($start > 2)
                    <li><span class="px-4 py-2 text-gray-500">...</span></li>
                @endif
            @endif

            {{-- Halaman tengah --}}
            @for ($page = $start; $page <= $end; $page++)
                @if ($page == $current)
                    <li><span class="px-4 py-2 rounded bg-[#FF8811] text-white font-semibold">{{ $page }}</span></li>
                @else
                    <li><a href="{{ $paginator->url($page) }}" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">{{ $page }}</a></li>
                @endif
            @endfor

            {{-- Tampilkan ... + halaman terakhir --}}
            @if ($end < $last)
                @if ($end < $last - 1)
                    <li><span class="px-4 py-2 text-gray-500">...</span></li>
                @endif
                <li><a href="{{ $paginator->url($last) }}" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">{{ $last }}</a></li>
            @endif

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">&gt;</a>
                </li>
            @else
                <li>
                    <span class="px-4 py-2 rounded bg-gray-200 text-gray-500 cursor-not-allowed">&gt;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
