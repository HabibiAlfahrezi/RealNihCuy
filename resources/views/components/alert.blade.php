@props(['type' => 'info', 'message' => ''])

@php
    $classes = [
        'success' => 'bg-teal-50 border-l-4 border-teal-500 dark:bg-teal-800/30',
        'error' => 'bg-red-50 border-l-4 border-red-500 dark:bg-red-800/30',
        'warning' => 'bg-yellow-50 border-l-4 border-yellow-500 dark:bg-yellow-800/30',
        'info' => 'bg-blue-50 border-l-4 border-blue-500 dark:bg-blue-800/30',
    ];

    $iconClasses = [
        'success' => 'text-teal-500',
        'error' => 'text-red-500',
        'warning' => 'text-yellow-500',
        'info' => 'text-blue-500',
    ];
@endphp

<div id="alert-{{ $attributes->get('id') }}" class="max-w-sm mx-auto {{ $classes[$type] }} rounded-lg p-4 flex items-start shadow-md absolute z-50 mt-22 right-4 " role="alert">
    <div class="shrink-0">
        <span class="inline-flex justify-center items-center h-8 w-8 rounded-full {{ $iconClasses[$type] }}">
            <!-- Icon sesuai tipe alert -->
            @switch($type)
                @case('success')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 12l2 2l4-4"></path>
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                    </svg>
                    @break
                @case('error')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                    @break
                @case('warning')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 22h20L12 2z"></path>
                        <path d="M12 16h.01"></path>
                        <path d="M12 10h.01"></path>
                    </svg>
                    @break
                @case('info')
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="M12 16h.01"></path>
                        <path d="M12 12h.01"></path>
                    </svg>
                    @break
            @endswitch
        </span>
    </div>
    <div class="ml-3">
        <h3 class="text-sm font-medium text-gray-900 dark:text-white">{{ ucfirst($type) }}!</h3>
        <p class="text-sm text-gray-700 dark:text-neutral-400">{{ $message }}</p>
    </div>
    <button onclick="closeAlert('{{ $attributes->get('id') }}')" class="absolute top-2 right-2 focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6L6 18"></path>
            <path d="M6 6l12 12"></path>
        </svg>
    </button>
</div>

<script>
    // Fungsi untuk menutup alert secara manual
    function closeAlert(id) {
        const alert = document.getElementById('alert-' + id);
        if (alert) {
            alert.remove();
        }
    }

    // Otomatis hilang setelah 5 detik
    setTimeout(function() {
        closeAlert('{{ $attributes->get('id') }}');
    }, 10000);  // 5000 milidetik = 5 detik
</script>
