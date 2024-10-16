@extends('home.layouts.dummy')

@section('content')
<div class="flex flex-col justify-center items-center min-h-screen px-4 bg-pricB">
  <div class="grid bg-white grid-cols-1 md:grid-cols-3 rounded-lg w-full p-6 max-w-5xl mx-auto">
    <!-- Start posted your jobs panel -->
    <div class="bg-pricL rounded-lg shadow-lg p-8 flex flex-col justify-between">
      <div>
        <img src="{{ asset('images/logo/logo-icon.svg') }}" class="mb-12" alt="">
        <h2 class="text-4xl font-bold mb-6">Start posted <span class="lg:block lg:font-semibold">your jobs</span></h2>
        <p class="text-gray-600 mb-6 text-base">Choose the plan that works best for you, feel free to contact us if you need more details.</p>
      </div>
      <div class="bg-pricLB text-white p-4 rounded-lg shadow-inner">
        <p class="text-gray-400 text-base mb-4">"Fantastic, totally blown away with my savings!"</p>
        <div class="flex text-base items-center">
          <div class="mr-4">
            <img src="{{ asset('img/avatar.jpg') }}" class="w-12 h-12 rounded-lg" alt="">
          </div>
          <div>
            <p class="font-semibold">Roland Stevens</p>
            <p class="text-gray-500">Freelancer</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Subscription Plans --> 
    <div class="flex flex-col col-span-2 bg-white pl-6">
      <div class="bg-white rounded-xl my-6">
        <h2 class="text-3xl font-bold mb-2">Posted Your Job in Top Position</h2>
        <p class="text-gray-600 text-base">Get started, with priority jobs.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Free Plan -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-lg hover:shadow-xl transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-blue-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            <h3 class="text-blue-700 font-semibold text-xl">Free</h3>
          </div>
          <p class="text-gray-800 text-5xl font-bold mb-8">Free <span class="text-gray-600 text-sm">/ month</span></p>
          <ul class="text-gray-700 space-y-3 text-base">
            <li class="flex items-center"><svg class="w-5 h-5 text-blue-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Secure your account</li>
            <li class="flex items-center"><svg class="w-5 h-5 text-blue-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Up to 2 credit cards</li>
            <li class="flex items-center"><svg class="w-5 h-5 text-blue-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Customer support</li>
          </ul>
          <a href="{{ route('home') }}" class="mt-14 block text-center bg-blue-600 text-white px-6 py-3 rounded-lg w-full text-base">Get Started</a>
        </div>
        <!-- Pro Plan -->
        <div class="bg-blue-700 text-white p-6 rounded-lg shadow-lg hover:shadow-xl transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
            <h3 class="font-semibold text-xl">Pro</h3>
          </div>
          <p class="text-white text-5xl font-bold mb-8">$32 <span class="text-blue-200 text-sm">/ month</span></p>
          <ul class="mt-4 space-y-3 text-base">
            <li class="flex items-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Unlimited credit cards</li>
            <li class="flex items-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Virtual credits</li>
            <li class="flex items-center"><svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>Personal support</li>
          </ul>
          <form action="{{ route('payment') }}" method="POST">
            @csrf
            <input type="hidden" name="item_name" value="Premium">
            <input type="hidden" name="price" value="120000">
            <button type="submit" class="mt-14 block text-center bg-white text-blue-700 px-6 py-3 rounded-lg w-full text-base">Start trial</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection