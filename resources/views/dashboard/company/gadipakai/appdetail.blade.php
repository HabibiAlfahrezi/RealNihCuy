@extends('dashboard.layouts.base')

@section('content')
<!-- Sidebar for Applicant Detail -->
<div id="applicant-detail" class="fixed top-0 right-0 h-full w-0 bg-white shadow-lg z-50 overflow-x-hidden transition-all duration-500">
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Applicant Detail</h2>
        <!-- Applicant Detail Content -->
        <div id="applicant-content">
            <!-- Content loaded dynamically -->
        </div>
    </div>
    <button id="close-sidebar" class="absolute top-2 right-2 bg-gray-200 p-2 rounded-full">✖</button>
</div>

<!-- Ensure you have Alpine.js included -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>

@endsection
