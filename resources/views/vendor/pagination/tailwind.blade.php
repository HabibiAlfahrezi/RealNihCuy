@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col items-center">
        <div class="flex justify-between items-center w-full sm:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center  py-2 text-sm font-medium text-gray-500 bg-white cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center  py-2 text-sm font-medium text-gray-700 bg-white leading-5 rounded-md hover:text-gray-500 dark:text-gray-300 dark:bg-gray-800 dark:hover:text-gray-200">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center  py-2  text-sm font-medium text-gray-700 bg-white leading-5 rounded-md hover:text-gray-500 dark:text-gray-300 dark:bg-gray-800 dark:hover:text-gray-200">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center  py-2  text-sm font-medium text-gray-500 bg-white cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex items-center justify-between w-full">
            <div>
                <p class="text-sm text-gray-700 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="flex items-center space-x-2">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li>
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white cursor-default dark:text-gray-600 dark:bg-gray-800" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white leading-5 hover:text-gray-400 dark:text-gray-300 dark:bg-gray-800 dark:hover:text-gray-200" aria-label="{{ __('pagination.previous') }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white cursor-default dark:text-gray-300 dark:bg-gray-800">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary rounded-md">{{ $page }}</span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-white leading-5 hover:text-gray-500 dark:text-gray-300 dark:bg-gray-800 dark:hover:text-gray-200" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white leading-5 hover:text-gray-400 dark:text-gray-300 dark:bg-gray-800 dark:hover:text-gray-200" aria-label="{{ __('pagination.next') }}">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white cursor-default dark:text-gray-600 dark:bg-gray-800" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
