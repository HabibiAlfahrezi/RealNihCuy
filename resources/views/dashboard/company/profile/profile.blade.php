@extends('dashboard.layouts.base')
@section('content')

@include('dashboard.components.partials.alert')
<div class="bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Company Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
      <div class="flex items-center">
        <img class="md:h-16 md:w-16 w-20 h-20 rounded-full mr-2 md:mr-4" src="{{ asset('storage/' . Auth::user()->company->logo) }}" alt="{{ Auth::user()->company->name }} logo">
        <div>
          <h1 class="md:text-2xl text-xl font-bold">{{ Auth::user()->company->name }}</h1>
          <p class="text-gray-600 text-sm">We Design Delightful Digital Experiences</p>
        </div>
      </div>
      {{-- <div class="mt-4 md:mt-0 w-full md:w-auto">
        <button class="px-4 py-2 bg-blue-500  w-full text-white rounded-md hover:bg-blue-600">+ Follow</button>
      </div> --}}
    </div>

    <!-- Company Info -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 text-sm border-b border-borderAbu pb-8">
      <div class="flex flex-col justify-center items-center">
        <p class="font-medium">Website</p>
        <a href="{{ Auth::user()->company->website }}" class="text-blue-500 font-semibold text-md hover:underline">
          {{ Auth::user()->company->website ?? 'No website available.' }}
        </a>
      </div>
      
      <div class="flex flex-col justify-center items-center">
        <p class="font-medium">Location</p>
        <p class="font-semibold text-md">{{ Auth::user()->company->location ?? 'No location available.' }}</p>
      </div>
      
      <div class="flex flex-col justify-center items-center">
        <p class="font-medium">Company Size</p>
        <p class="font-semibold text-md text-center capitalize">
          {{ Auth::user()->company->employe ?? 'No size available.' }} Employees
        </p>
      </div>
      
      <div class="flex flex-col justify-center items-center">
        <p class="font-medium">Company Type</p>
        <p class="font-semibold text-md capitalize">
          {{ Auth::user()->company->industry ?? 'No type available.' }}
        </p>
      </div>
    </div>
    

    <!-- Main Content -->
    <div class="flex flex-col lg:flex-row  lg:space-y-0 lg:space-x-8">
      <!-- Left Column -->
      <div class="lg:w-2/3">

        <!-- About -->
        <div class="mb-8">
          <h2 class="text-xl font-semibold mb-4">About {{ Auth::user()->company->name }}</h2>
          <p class="text-gray-600">{{ Auth::user()->company->description ?? 'No description available.' }}</p>
  
          @if (Auth::user()->company->description)
            <a href="{{ Auth::user()->company->website }}" class="text-blue-500 hover:underline">Read more</a>
          @endif
        </div>

        {{-- Social Media --}}
        <div class="mb-8">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">{{ Auth::user()->company->name }} Social Media</h2>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'social')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                @if (Auth::user()->company->companySocial)
                  <img src="{{ asset('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
                @else
                  <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
                @endif
              </button>
            </div>
          </div>
          
          <div class="flex flex-wrap gap-4">
            @if (Auth::user()->company->companySocial) 
              <!-- Instagram -->
              <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold rounded-lg">
                <img src="{{ asset('img/instagram.png') }}" class="w-8 h-8" alt="Instagram">
                <p class="ml-3 truncate">{{ Auth::user()->company->companySocial->instagram }}</p>
              </div>

              <!-- GitHub -->
              <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold rounded-lg">
                <img src="{{ asset('img/github.png') }}" class="w-8 h-8" alt="GitHub">
                <p class="ml-3 truncate">{{ Auth::user()->company->companySocial->github }}</p>
              </div>

              <!-- Facebook -->
              <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold rounded-lg">
                <img src="{{ asset('img/facebook.png') }}" class="w-8 h-8" alt="Facebook">
                <p class="ml-3 truncate">{{ Auth::user()->company->companySocial->facebook }}</p>
              </div>

              <!-- Twitter -->
              <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold rounded-lg">
                <img src="{{ asset('img/twitter.png') }}" class="w-8 h-8" alt="Twitter">
                <p class="ml-3 truncate">{{ Auth::user()->company->companySocial->twitter }}</p>
              </div>

              <!-- LinkedIn -->
              <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold rounded-lg">
                <img src="{{ asset('img/linkedin.png') }}" class="w-8 h-8" alt="LinkedIn">
                <p class="ml-3 truncate">{{ Auth::user()->company->companySocial->linkedin }}</p>
              </div>
            @else
              <p class="text-gray-500 ">No social media available.</p>
            @endif
          </div>
        </div>



        <!-- Working at Nomad -->
        <div class="mb-8">
          <div class="flex justify-between items-center mb-4 ">
            <h2 class="text-xl font-semibold">Working at {{ Auth::user()->company->name }}</h2>
            <div class="flex space-x-2">
              <button @click="$dispatch('open-modal', 'image')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                @if (Auth::user()->company->companySocial)
                  <img src="{{ asset('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
                @else
                  <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
                @endif
              </button>
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4 gap-y-4 md:gap-y-0 ">
            @if (Auth::user()->company->companyImage)
              <div class="md:col-span-2">
                <img src="{{ asset('storage/' . (Auth::user()->company->companyImage->image1 ?? 'default-image-path')) }}" alt="" class="w-full h-full object-cover rounded-lg">
              </div>
              <div class="flex flex-col md:flex-col gap-4">
                <img src="{{ asset('storage/' . Auth::user()->company->companyImage->image2 ?? 'default-image-path') }}" alt="" class=" object-cover rounded-lg">
                <img src="{{ asset('storage/' . Auth::user()->company->companyImage->image3 ?? 'default-image-path') }}" alt="" class=" object-cover rounded-lg">
              </div>
            @else
              <p class="text-gray-500 ">No image available.</p>
            @endif
          </div>
        </div>

        <!-- Jobs -->
        <div class="mb-8">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Jobs From {{ Auth::user()->company->name }}</h2>
            <a href="#" class="text-blue-500 hover:underline">View All Jobs</a>
          </div>
          <div class="space-y-4">
            @if (Auth::user()->company->pekerjaan->isNotEmpty())
              @foreach (Auth::user()->company->pekerjaan as $pekerjaan)
                <a href="{{ route('dashboard.company.jobDetail', $pekerjaan->id) }}" class="border border-borderAbu p-4 rounded-lg block">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center">
                      <img class="h-14 w-14 rounded-full mr-2" src="{{ asset('storage/' . Auth::user()->company->logo) }}" alt="{{ Auth::user()->company->name }} logo">
                      <div>
                        <h3 class="font-semibold">{{ $pekerjaan->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $pekerjaan->company->name }} • {{ $pekerjaan->company->location }}</p>
                      </div>
                    </div>
                    <button class="text-blue-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                      </svg>
                    </button>
                  </div>
                  <div class="mt-2 flex flex-wrap gap-2">
                    @foreach ($pekerjaan->type as $type)
                      <span class="inline-block px-2 py-1 text-xs font-semibold rounded-lg 
                        {{ $loop->first ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                        {{ $type->title }}
                      </span>
                    @endforeach
                    @foreach ($pekerjaan->category as $category)
                      <span class="inline-block px-2 py-1 text-xs font-semibold rounded-lg bg-yellow-100 text-yellow-800">
                        {{ $category->title }}
                      </span>
                    @endforeach
                  </div>
                  <p class="text-gray-600 text-sm mt-4">
                    {{ $pekerjaan->created_at->diffForHumans() }} • {{ $pekerjaan->applicant->count() ?? 0 }} Applicants
                  </p>
                </a>
              @endforeach
            @else
              <p class="text-gray-600">No open positions at the moment.</p>
            @endif
          </div>
        </div>
      </div>

      

      <!-- Right Column -->
      <div class="lg:w-1/3 md:px-6">
         <!-- Tech Stack -->
        <div class="mb-8">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Tech Stack {{ Auth::user()->company->name }}</h2>
            <div class="flex space-x-2">
              <button @click="$dispatch('open-modal', 'tech')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                @if (Auth::user()->company->tech)
                  <img src="{{ asset('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
                @else
                  <img src="{{ asset('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
                @endif
              </button>
            </div>
          </div>

          <div class="grid grid-cols-3 md:grid-cols-3 gap-6 md:px-4">
            <!-- Tech stack items -->
            @if (Auth::user()->company->tech->isNotEmpty())
              @foreach (Auth::user()->company->tech as $tech)
              <div class="flex flex-col items-center">
                {{-- <img src="{{ asset('storage/' . $tech->logo) }}" class="w-16 h-16 object-contain" alt="{{ $tech->name }}"> --}}
                <img src="{{ asset($tech->logo) }}" class="w-16 h-16 object-contain" alt="{{ $tech->name }}">
                <p class="text-grey mt-2 text-center text-sm">{{ $tech->name }}</p>
              </div>
              @endforeach
            @else
              <p class="text-gray-500  col-span-3">No tech stack at the moment.</p>
            @endif
          </div>
        </div>

        <!-- People at Company -->
        {{-- <div class="mb-8">
          <h2 class="text-xl font-semibold mb-4">People at {{ Auth::user()->company->name }}</h2>
          <div class="space-y-4">
            @foreach (Auth::user()->company->employees()->take(4)->get() as $employee)
              <div class="flex items-center">
                <img src="{{ asset('storage/' . $employee->avatar) }}" alt="{{ $employee->name }}" class="w-12 h-12 rounded-full mr-4">
                <div>
                  <p class="font-semibold">{{ $employee->name }}</p>
                  <p class="text-gray-600 text-sm">{{ $employee->position }}</p>
                </div>
              </div>
            @endforeach
          </div>
          <button class="mt-4 w-full py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200">Show All</button>
        </div> --}}

        <!-- People Also View -->
        <div class="mb-8">
          <h2 class="text-xl font-semibold mb-4">People Also View</h2>
          <div class="space-y-4">
            @foreach($listCompany as $company)
              <div class="flex items-center gap-4 border border-borderAbu p-4 rounded-lg bg-white shadow-sm">
                <!-- Information about the company -->
                <div class="flex-1">
                  <p class="font-semibold">{{ $company->name }}</p>
                  <p class="text-gray-600">{{ $company->location }}</p>
                </div>

                <!-- Company logo -->
                <div class="flex-shrink-0">
                  <img src="{{ asset('storage/' . $company->logo) }}" class="w-12 h-12 object-cover rounded-md" alt="{{ $company->name }}">
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>












 {{-- Social Media --}}
<x-mainModal id="social">
  <div x-data class="">
    <x-slot name="header">
      <h4 class="text-xl font-bold text-gray-900 mb-4">
        @if (Auth::user()->company->companySocial)
              Update Your Social Media
            @else
              Create New Social Media
            @endif
      </h4>
    </x-slot>

      <div class="mt-4">
        <form action="{{ route('company.social') }}" id="socialForm" method="POST">
          @csrf
          <div class="space-y-4">
            <!-- Instagram Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 3A2.5 2.5 0 003 5.5v13A2.5 2.5 0 005.5 21h13A2.5 2.5 0 0021 18.5v-13A2.5 2.5 0 0018.5 3h-13zM12 7a5 5 0 100 10 5 5 0 000-10zm4.5 1a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5z" />
                </svg>
              </span>
              <input type="text" value="{{ Auth::user()->company->companySocial->instagram ?? '' }}" name="instagram" id="instagram" placeholder="Instagram" class="w-full px-3 py-2 border-gray-300 rounded-md focus:border focus:border-primary sm:text-sm">
            </div>
        
            <!-- GitHub Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" value="{{ Auth::user()->company->companySocial->github ?? '' }}" name="github" id="github" placeholder="GitHub" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Facebook Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 9.64a.99.99 0 00-.88-.63h-2.71v-.68c0-.35.2-.6.54-.6h2.17a.99.99 0 00.88-.63.99.99 0 00-.88-1.37h-2.17a2.65 2.65 0 00-2.66 2.65v.68H11c-.55 0-1 .45-1 1s.45 1 1 1h1.71v8c0 .55.45 1 1 1s1-.45 1-1v-8h2.71a.99.99 0 00.88-.63c.09-.31.03-.64-.17-.9l-2.25-3.4a.99.99 0 00-1.38-.26c-.26.18-.4.49-.35.8z" />
                </svg>
              </span>
              <input type="text" value="{{ Auth::user()->company->companySocial->facebook ?? '' }}" name="facebook" id="facebook" placeholder="Facebook" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Twitter Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" value="{{ Auth::user()->company->companySocial->twitter ?? '' }}" name="twitter" id="twitter" placeholder="Twitter" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
      
            <!-- LinkedIn Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 100-12 6 6 0 000 12zm-4 3a5 5 0 00-5 5v7h-4v-7a5 5 0 0110 0v7h-4v-7a5 5 0 00-5-5zm14 12v-5.5c0-3.58-1.92-5.5-5.02-5.5-2.63 0-3.8 1.61-4.46 2.73V16h-4v7h4v-5.17c0-1.18.45-2.83 1.88-2.83 1.42 0 1.94 1.28 1.94 2.94V23h4z" />
                </svg>
              </span>
              <input type="text" value="{{ Auth::user()->company->companySocial->linkedin ?? '' }}" name="linkedin" id="linkedin" placeholder="LinkedIn" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
          </div>
        
          <x-slot name="footer">
            <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button type="submit" form="socialForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
                Add Social Media
            </button>
          </x-slot>
        </form>
        
        
      </div>
  </div>
</x-mainModal>

<x-mainModal id="tech">
  <div x-data class="">
    <x-slot name="header">
      <h4 class="text-xl font-bold text-gray-900 mb-4">
        @if (Auth::user()->company->companyTech)
              Update Your Tech Stack
            @else
              Create New Tech Stack
            @endif
      </h4>
    </x-slot>

    <form action="{{ route('company.tech') }}" id="techForm" method="POST" class="space-y-4">
      @csrf
      
      <!-- Tech Selection Field -->
      <div>
        <label for="tech" class="block text-sm font-medium text-gray-700 mb-1">
          Select Technologies
        </label>
        <div class="w-full">
          <select 
            class="tech w-[327px] md:w-[527px]  form-control appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
            id="tech" 
            name="tech[]" 
            multiple="multiple">
            @if (!empty($companyTech))
              @foreach($allTech as $tech) <!-- Menggunakan `alltechs` untuk mendapatkan semua tech yang tersedia -->
                  <option value="{{ $tech->id }}" {{ in_array($tech->id, $companyTech) ? 'selected' : '' }}>
                      {{ $tech->name }}
                  </option>
              @endforeach
      `     @else
              <p>No tech found</p>
            @endif
            <!-- Options will be populated dynamically -->
          </select>
        </div>
        <p class="mt-1 text-xs text-gray-500">You can select multiple technologies</p>
      </div>

      <!-- Form Actions -->
      <x-slot name="footer">
        <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
        </button>
        <button type="submit" form="techForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
            Add Tech
        </button>
      </x-slot>
    </form>
  </div>
</x-mainModal>

 {{-- Image --}}
 <x-mainModal id="image">
  <div x-data class="">
      <x-slot name="header">
        <h4 class="text-lg font-medium text-gray-900">
          @if (Auth::user()->company->companyImage)
            Update Your Company Image
          @else
            Create New Company Image
          @endif
        </h4>
      </x-slot>

      <div class="mt-4 overflow-hidden">
        <form action="{{ route('company.image') }}" id="imageForm" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="space-y-4 ">
            <div class="flex flex-col gap-5.5">
              <div>
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Your Main Image
                </label>
                <input
                name="image1"
                value="{{ Auth::user()->company->companyImage->image1 ?? '' }}"
                  type="file"
                  class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                />
                @if(isset($company->companyImage) && $company->companyImage->image1)
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Current file: {{ basename($company->companyImage->image1) }}
                  </div>
                @endif
              </div>
              <div>
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Image 2
                </label>
                <input
                name="image2"
                  type="file"
                  class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                />
                @if(isset($company->companyImage) && $company->companyImage->image2)
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Current file: {{ basename($company->companyImage->image2) }}
                  </div>
                @endif
              </div>
              <div>
                <label
                  class="mb-3 block text-sm font-medium text-black dark:text-white"
                >
                  Image 3
                </label>
                <input
                  name="image3"
                  type="file"
                  class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                />
                @if(isset($company->companyImage) && $company->companyImage->image3)
                  <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Current file: {{ basename($company->companyImage->image3) }}
                  </div>
                @endif
              </div>
            </div>
          </div>
        
          <x-slot name="footer">
            <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
                Cancel
            </button>
            <button type="submit" form="imageForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
                Add Image
            </button>
          </x-slot>
        </form>
        
        
      </div>
  </div>
</x-mainModal>

{{-- 
<x-modal id="location">
  <div x-data class="">
    <div class="text-2xl font-bold text-gray-900 mb-6">
      Create Address
    </div>

    <form action="{{ route('company.location') }}" method="POST" class="space-y-6">
      @csrf
      
      <!-- Title Field -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
          Title
        </label>
        <input 
          type="text" 
          name="title" 
          id="title" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
      </div>

      <!-- Location Field -->
      <div>
        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
          Location
        </label>
        <textarea 
          name="location" 
          id="location" 
          rows="4" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        ></textarea>
      </div>

      <!-- Form Actions -->
      <div class="flex items-center justify-end space-x-3 mt-6">
        <button type="button" @click="$dispatch('close-modal')" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Cancel
        </button>
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
          Create
        </button>
      </div>
    </form>
  </div>
</x-modal> --}}

{{-- <x-modal id="benefit">
  <div x-data class="">
    <div class="text-2xl font-bold text-gray-900 mb-6">
      Create Benefits
    </div>

    <form action="{{ route('company.benefit') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
      @csrf
      
      <!-- Image Upload -->
      <div>
        <label for="image2" class="block text-sm font-medium text-gray-700 mb-2">
          Image
        </label>
        <input
          name="image"
          type="file"
          class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
        />
      </div>

      <!-- Title Field -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
          Title
        </label>
        <input 
          type="text" 
          name="title" 
          id="title" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        >
      </div>

      <!-- Location Field -->
      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
          Description
        </label>
        <textarea 
          name="description" 
          id="description" 
          rows="4" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        ></textarea>
      </div>

      <!-- Form Actions -->
      <x-slot name="footer">
        <button type="button" @click="isModalOpen = false" class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
        </button>
        <button type="submit" form="benefitForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-indigo-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
            Add Project
        </button>
      </x-slot>
    </form>
  </div>
</x-modal> --}}
<script>
     $(document).ready(function() {
        $('.tech').select2({
            placeholder: 'Select Tech',
            allowClear: true,
            ajax: {
                url: "{{ route('get-tech') }}",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                },
                cache: true
            }
        });  



    });
</script>
@endsection