<div
    x-data="{ isOpen: false }"
    @open-modal.window="isOpen = true"
    @close-modal.window="isOpen = false"
    x-show="isOpen"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    x-cloak
>
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform translate-y-1/2"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        @click.away="isOpen = false"
        @keydown.escape="isOpen = false"
    >
        <!-- Header (optional) -->
        @if (isset($title))
        <header class="flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                {{ $title }}
            </h2>
            <button
                @click="isOpen = false"
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
            >
                <svg
                    class="w-4 h-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    role="img"
                    aria-hidden="true"
                >
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </header>
        @endif

        <!-- Modal body -->
        <div class="mt-4">
            
        </div>

        <!-- Footer (optional) -->
        <footer class="flex justify-end mt-4">
            @if (isset($footer))
                {{ $footer }}
            @else
                <button @click="isOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-300 rounded hover:bg-gray-400">
                    Close
                </button>
            @endif
        </footer>
    </div>
</div>
