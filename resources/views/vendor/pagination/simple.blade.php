@if ($paginator->hasPages())
    <nav class="flex justify-center mt-2">
        <ul class="inline-flex items-center space-x-3 text-xl">
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

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
                    </li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="px-4 py-2 rounded bg-orange-500 text-white font-semibold">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 rounded bg-gray-100 text-gray-700 hover:bg-gray-200">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

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