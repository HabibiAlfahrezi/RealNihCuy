@extends('home.layouts.dummy')
@section('content')
<section class="min-h-screen bg-gray-50">
    <div class="flex flex-wrap min-h-screen">
        <!-- Left Column - Login Form -->
        <div class="w-full md:w-5/12 p-8 flex flex-col justify-between">
            <a href="/" class="mb-8">
                <img src="{{ asset('img/LogoJobSync.png') }}" class="w-64 h-20" alt="JobSync Logo">
            </a>

            <div class="flex-grow">
                <div class="mb-8">
                    <h4 class="text-3xl font-bold text-gray-800">Welcome Back, Dude</h4>
                    <p>Sign in to your account</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" 
                            placeholder="Enter Your Email Address" 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('email'))
                            <p class="text-red-500 mt-2">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" id="password" name="password" 
                            placeholder="Enter Your Password" 
                            class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>

                    <button type="submit" 
                        class="w-full bg-primary text-white font-bold py-3 rounded-md hover:bg-secondary transition duration-300">
                        Login
                    </button>
                </form>

                <p class="text-gray-600 mt-6 text-center">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-primary font-semibold hover:underline">Register</a>
                </p>

                <p class="text-gray-500 text-sm mt-4">By clicking 'Continue', you acknowledge that you have read and accept the 
                    <a href="#" class="text-primary hover:underline">Terms of Service</a> 
                    and 
                    <a href="#" class="text-primary hover:underline">Privacy Policy</a>.
                </p>
            </div>

            <div class="mt-8">
                <div class="md:flex items-center gap-4">
                    <div class="flex -space-x-4  mb-4 md:mb-0">
                        <div class="w-10 h-10">
                            <img src="{{ asset('img/avatar.jpg') }}" class="rounded-full w-full h-full object-cover" alt="User avatar">
                        </div>
                        <div class="w-10 h-10">
                            <img src="{{ asset('img/download (3).jpg') }}" class="rounded-full w-full h-full object-cover" alt="User avatar">
                        </div>
                        <div class="w-10 h-10">
                            <img src="{{ asset('img/download (5).jpg') }}" class="rounded-full w-full h-full object-cover" alt="User avatar">
                        </div>
                        <div class="w-10 h-10">
                            <img src="{{ asset('img/download.jpg') }}" class="rounded-full w-full h-full object-cover" alt="User avatar">
                        </div>
                    </div>
                    <div>
                        <p class="font-bold">Bergabunglah dengan 2M+ pengguna kami!</p>
                        <p>Temukan peluang pekerjaan yang sesuai dengan keahlianmu!</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Image -->
        <div class="hidden md:block md:w-7/12 relative">
            <img src="{{ asset('img/loginMale.jpg') }}" 
                class="absolute inset-0 w-full h-full object-cover" 
                alt="Office background">
        </div>
    </div>
</section>
@endsection