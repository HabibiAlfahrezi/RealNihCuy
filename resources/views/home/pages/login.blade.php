@extends('home.layouts.dummy')
@section('content')
<section class="bg-gray-50 pt-12">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
            <div class="flex items-center md:mb-10 justify-center md:justify-start">
                <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="h-10 w-auto">

            </div>
            <img src="{{ asset('image/gambar/register.png') }}" alt="Register Image" class="hidden md:block">
        </div>
        <div class="w-full md:w-1/2 px-4">
            {{-- <div class="flex justify-center space-x-4 mb-6 mx-auto  w-full max-w-md">
                <p class="font-semibold text-blue-500 cursor-pointer">Job Seeker</p>
                <p class="font-semibold text-gray-500 cursor-pointer">Company</p>
            </div> --}}
           

            <h4 class="text-3xl font-bold text-gray-800 mb-6 text-center">Welcome Back, Dude</h4>

            <form action="{{ route('login') }}" method="POST"class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Enter Your Email Address" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if ($errors->has('email'))
                        <p class="text-red-500 mt-2">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter Your Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 rounded-md hover:bg-blue-600 transition duration-300">Continue</button>
            </form>

            <p class="text-gray-600 mt-6 text-center">Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:underline">Register</a>
            </p>

            <p class="text-gray-500 text-sm mt-4">By clicking 'Continue', you acknowledge that you have read and accept the 
                <a href="#" class="text-blue-500 hover:underline">Terms of Service</a> 
                and 
                <a href="#" class="text-blue-500 hover:underline">Privacy Policy</a>.
            </p>
        </div>
    </div>
</section>
@endsection