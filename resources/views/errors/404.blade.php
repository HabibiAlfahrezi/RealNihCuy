@extends('home.layouts.dummy')
@section('content')
<div class="flex flex-col justify-center items-center px-6 mx-auto h-screen xl:px-0 dark:bg-gray-900">
    <div class="block md:max-w-lg animate-bounce">
        <img src="{{ asset('illustrations/404.svg') }}" alt="astronaut image" class="w-[500px] h-[500px] transform hover:scale-105 transition-transform duration-300">
    </div>
    <div class="text-center xl:max-w-4xl mt-6">
        <h1 class="mb-3 text-3xl font-extrabold leading-tight text-gray-900 sm:text-4xl lg:text-6xl dark:text-white">Oops! Page not found</h1>
        <p class="mb-5 text-lg font-medium text-gray-500 md:text-xl dark:text-gray-400">It seems like the page you're looking for doesn't exist. If you think this is a mistake, please let us know.</p>
        <a href="{{ route('home') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3 text-center inline-flex items-center mr-3 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 transition-all duration-300">
            <svg class="mr-2 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            Go back home
        </a>
    </div>
</div>
@endsection
