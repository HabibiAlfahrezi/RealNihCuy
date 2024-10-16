@extends('dashboard.layouts.base')
@section('content')

<div class="flex flex-col min-h-screen ">

  <main class="container mx-auto p-6 ">
    <div class="flex flex-col lg:flex-row gap-6">

      <!-- Left Section -->
      <div class="w-full lg:w-2/3  p-6">
        
        <div class="flex justify-between">
          <!-- Profile Section -->
          <div class="flex items-center mb-4">
            <img src="https://via.placeholder.com/52" alt="Profile Picture" class="rounded-full mr-4" />
            <div>
              <h2 class="text-2xl font-bold text-gray-900">Jerome Bell (24)</h2>
              <p class="text-gray-600">Coderspace - Senior Software Developer</p>
            </div>
          </div>
          <!-- LinkedIn Section -->
          <div class="mb-4">
            <a href="#" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded">
              <i class="fab fa-linkedin mr-2"></i> LinkedIn Account
            </a>
          </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex space-x-4 mb-6 mt-3">
          <button class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded">
            <i class="mr-3 fas fa-home"></i> Overview
          </button>
          <button class="bg-gray-100 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
            <i class="mr-3 fas fa-sticky-note"></i> Notes
          </button>
          <button class="bg-gray-100 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
            <i class="mr-3 fas fa-vial"></i> Tests
          </button>
          <button class="bg-gray-100 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
            <i class="mr-3 fas fa-history"></i> History
          </button>
        </div>

       

        <!-- Personal Information Section -->
        <div class="flex justify-between items-center">
          <h3 class="text-2xl font-semibold text-gray-900 mb-6">All Personal Information</h3>
          <button class=" text-primary font-bold py-2 px-4 rounded">
            <i class="fas fa-pen"></i> Edit
          </button>
        </div>
        <div class="space-y-8">
          <div class="grid grid-cols-2 gap-8 pb-8 border-b border-borderAbu">
            <!-- Email -->
            <div class="flex items-center">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-envelope "></i>
              </div>
              <div class="ml-4">
                <p class="font-semibold">jerome.bell@example.com</p>
                <p class="text-gray-500 text-sm">Mail Address</p>
              </div>
            </div>
          
            <!-- Phone Number -->
            <div class="flex items-center">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-phone "></i>
              </div>
              <div class="ml-4">
                <p class="font-semibold">+90 (545) 493 00 00</p>
                <p class="text-gray-500 text-sm">Phone Number</p>
              </div>
            </div>
          
            <!-- Birthday -->
            <div class="flex items-center">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fas fa-birthday-cake "></i>
              </div>
              <div class="ml-4">
                <p class="font-semibold">03 September 2000</p>
                <p class="text-gray-500 text-sm">18 Years Old</p>
              </div>
            </div>
          
            <!-- Salary -->
            <div class="flex items-center">
              <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
                <i class="fa-solid fa-money-bill"></i>
              </div>
              <div class="ml-4">
                <p class="font-semibold">$24,000</p>
                <p class="text-gray-500 text-sm">Expected Salary</p>
              </div>
            </div>
          </div>
          
          <div class="flex items-center">
            <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
              <i class="fas fa-map-marker-alt "></i>
            </div>
            <div class="ml-4">
              <p class="font-semibold">Istanbul, Izmir, Ankara, Turkey, US, Europe</p>
              <p class="text-grey text-sm">Location</p>
            </div>
          </div>
          
          <div class="flex items-center mt-4">
            <div class="bg-gray-100 p-3 rounded-full flex-shrink-0">
              <i class="fas fa-briefcase "></i>
            </div>
            <div class="ml-3">
              <p class="font-semibold">Remote, Fulltime, Part-Time, Internship, Freelance</p>
              <p class="text-grey text-sm">Work Type</p>
            </div>
          </div>
          
        </div>

        <!-- Resume Section -->
        <h3 class="text-xl font-semibold text-gray-900 mt-6 mb-4">Resume</h3>
        <div class="flex justify-between items-center mb-4">
          <div class="flex items-center">
            <!-- Tambahkan bg untuk ikon PDF -->
            <div class="bg-gray-100 rounded-full p-3">
              <i class="fas fa-file-pdf "></i> 
            </div>
            <p class="text-gray-700 ml-3">jerome-bell-resume.pdf</p> <!-- Margin kiri agar teks tidak terlalu dekat dengan ikon -->
          </div>
          <button class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded flex items-center">
            <!-- Tambahkan bg untuk ikon download -->
            <div class="bg-gray-200 rounded-full p-2 mr-2">
              <i class="fas fa-download"></i> 
            </div>
            Download
          </button>
        </div>
        

        <h3 class="text-xl font-semibold text-gray-900 mb-8">All Experiences</h3>
        <div class="space-y-7">
          <!-- Experience Item -->
          <div class="flex items-center space-x-4 border-b border-borderAbu pb-7">
            <img src="https://via.placeholder.com/52" alt="Company Logo" class="rounded-full" />
            <div class="flex-grow">
              <div class="flex items-center space-x-3">
                <h4 class="font-bold text-gray-800 text-lg">Trendyol.com</h4>
                <p class="text-gray-600 py-0.5 px-1 bg-gray-100">Fulltime</p>
              </div>
              <div class="flex items-center space-x-2 ">
                <p class="text-gray-600 ">
                  Front-End Developer &#8226; <!-- Unicode character for a bullet point -->
                </p>
                <p class="text-gray-500">Oct 2021 - Dec 2022</p>
              </div>
            </div>
          </div>

          <div class="flex items-center space-x-4 border-b border-borderAbu pb-7">
            <img src="https://via.placeholder.com/52" alt="Company Logo" class="rounded-full" />
            <div class="flex-grow">
              <div class="flex items-center space-x-3">
                <h4 class="font-bold text-gray-800 text-lg">Trendyol.com</h4>
                <p class="text-gray-600 py-0.5 px-1 bg-gray-100">Fulltime</p>
              </div>
              <div class="flex items-center space-x-2 ">
                <p class="text-gray-600 ">
                  Front-End Developer &#8226; <!-- Unicode character for a bullet point -->
                </p>
                <p class="text-gray-500">Oct 2021 - Dec 2022</p>
              </div>
            </div>
          </div>
          <!-- Add more experience items here... -->
        </div>


        <!-- Education Section -->
        <h3 class="text-xl font-bold text-gray-900 mt-6 mb-4">Education</h3>
        <div class="space-y-7">
          <div class="flex items-start border-b border-borderAbu pb-7">
            <img src="https://via.placeholder.com/52" alt="University Logo" class="rounded-full mr-4" />
            <div class="flex-grow">
              <h4 class="font-bold text-gray-800">Middle Earth Technic University</h4>
              <p class="text-gray-600 mb-4">Master degree in Computer science and Mathematies </p>
              <p class="text-gray-500">January, 2012 &#8226; Istanbul, Turkey</p>
            </div>
          </div>

          <div class="flex items-start border-b border-borderAbu pb-7">
            <img src="https://via.placeholder.com/52" alt="University Logo" class="rounded-full mr-4" />
            <div class="flex-grow">
              <h4 class="font-bold text-gray-800">Middle Earth Technic University</h4>
              <p class="text-gray-600 mb-4">Master degree in Computer science and Mathematies </p>
              <p class="text-gray-500">January, 2012 &#8226; Istanbul, Turkey</p>
            </div>
          </div>

          <!-- Add more education items here... -->
        </div>

        {{-- Skill --}}
        <h3 class="text-xl font-bold text-gray-900 mt-6 mb-4">Skills</h3>
        <div class="flex flex-wrap gap-6">
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
          <div class="px-4 py-2 border border-borderAbu rounded-md">
            <p>Mobile Application</p>
          </div>
        </div>
        
      </div>

      <!-- Right Section -->
      <div class="w-full lg:w-1/3  p-6">
        <!-- Active Positions Section -->
        <h3 class="text-xl font-bold text-gray-900 mb-4">Active Positions</h3>
        <div class="space-y-6">
          <!-- Active Position Item -->
          <div class="border-b border-borderAbu pb-4">
            <img src="https://via.placeholder.com/42" alt="Company Logo" class="rounded-full mb-4 mr-4" />
            <div class="flex items-center">
              <div class="flex-grow">
                <h4 class="font-bold text-gray-800">Front-End Developer</h4>
                <p class="text-gray-600">Trendyol Inch.</p>
              </div>
              <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded">
                <i class="fas fa-calendar-alt"></i> Interview
              </button>
            </div>
          </div>

          <div class="border-b border-borderAbu pb-4">
            <img src="https://via.placeholder.com/42" alt="Company Logo" class="rounded-full mb-4 mr-4" />
            <div class="flex items-center">
              <div class="flex-grow">
                <h4 class="font-bold text-gray-800">Front-End Developer</h4>
                <p class="text-gray-600">Trendyol Inch.</p>
              </div>
              <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded">
                <i class="fas fa-calendar-alt"></i> Interview
              </button>
            </div>
          </div>
        </div>

        <!-- Career Status Section -->
        <h3 class="text-xl font-bold text-gray-900 mt-6 mb-4">Career Status</h3>
        <select class="border border-borderAbu px-4 py-2 rounded text-gray-700 w-full">
          <option value="actively-seeking-job" selected>Actively Seeking Job</option>
          <option value="open-to-offers">Open to Offers</option>
          <option value="not-actively-seeking">Not Actively Seeking</option>
        </select>
      </div>
    </div>
  </main>

</div>
@endsection



{{-- Background --}}
<x-modal id="background">
  <div x-data class="px-6 py-4 max-w-lg mx-auto bg-white shadow-lg rounded-lg">
    <div class="border-b border-gray-200 pb-4 mb-4">
      <h2 class="text-lg font-semibold text-gray-900">Create New Project</h2>
    </div>
    <div>
      <form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Image Field -->
        <div class="mb-4">
          <label for="background" class="block text-sm font-medium text-gray-700">Background</label>
          <input type="file" name="background" id="background" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
              file:bg-indigo-50 file:text-indigo-700
              file:py-2 file:px-4 file:rounded-full
              file:border-0 file:font-semibold
              hover:file:bg-indigo-100">
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-2">
          <button type="button" @click="$dispatch('close-modal')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
        </div>
      </form>
    </div>
  </div>
</x-modal>

{{-- Social Media --}}
<x-modal id="social-media">
  <div x-data class="px-6 py-4">
      <div class="text-lg font-medium text-gray-900">
          Update Your Social Media
      </div>

      <div class="mt-4">
        <form action="{{ route('sosmed.store') }}" method="POST">
          @csrf
          <div class="space-y-4">
            <!-- Instagram Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 3A2.5 2.5 0 003 5.5v13A2.5 2.5 0 005.5 21h13A2.5 2.5 0 0021 18.5v-13A2.5 2.5 0 0018.5 3h-13zM12 7a5 5 0 100 10 5 5 0 000-10zm4.5 1a.75.75 0 01.75.75v2.5a.75.75 0 01-.75.75h-2.5a.75.75 0 01-.75-.75v-2.5a.75.75 0 01.75-.75h2.5z" />
                </svg>
              </span>
              <input type="text" name="instagram" value="{{ $profile->userSocial->instagram ?? '' }}" id="instagram" placeholder="Instagram" class="w-full px-3 py-2 border-gray-300 rounded-md focus:border focus:border-primary sm:text-sm">
            </div>
        
            <!-- GitHub Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" name="github" value="{{ $profile->userSocial->github ?? '' }}" id="github" placeholder="GitHub" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Facebook Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.36 9.64a.99.99 0 00-.88-.63h-2.71v-.68c0-.35.2-.6.54-.6h2.17a.99.99 0 00.88-.63.99.99 0 00-.88-1.37h-2.17a2.65 2.65 0 00-2.66 2.65v.68H11c-.55 0-1 .45-1 1s.45 1 1 1h1.71v8c0 .55.45 1 1 1s1-.45 1-1v-8h2.71a.99.99 0 00.88-.63c.09-.31.03-.64-.17-.9l-2.25-3.4a.99.99 0 00-1.38-.26c-.26.18-.4.49-.35.8z" />
                </svg>
              </span>
              <input type="text" name="facebook" value="{{ $profile->userSocial->facebook ?? '' }}" id="facebook" placeholder="Facebook" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
            <!-- Twitter Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3C6.48 3 2 7.48 2 12c0 4.42 3.13 8.13 7.38 9.44.54.1.74-.23.74-.51v-1.84c-3.02.66-3.65-1.46-3.65-1.46-.49-1.26-1.2-1.6-1.2-1.6-.98-.67.08-.66.08-.66 1.08.08 1.65 1.11 1.65 1.11.95 1.67 2.48 1.19 3.09.91.09-.69.37-1.19.67-1.46-2.34-.27-4.81-1.17-4.81-5.21 0-1.15.41-2.09 1.08-2.83-.11-.27-.47-1.39.1-2.89 0 0 .88-.28 2.88 1.08a10.04 10.04 0 012.62-.35c.89 0 1.78.12 2.62.35 2-1.36 2.88-1.08 2.88-1.08.57 1.5.21 2.62.1 2.89.67.74 1.08 1.68 1.08 2.83 0 4.05-2.49 4.94-4.84 5.2.38.34.73 1.01.73 2.03v3.02c0 .28.2.62.74.51C20.87 20.13 24 16.42 24 12c0-4.52-4.48-9-12-9z" />
                </svg>
              </span>
              <input type="text" name="twitter" value="{{ $profile->userSocial->twitter ?? '' }}" id="twitter" placeholder="Twitter" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
      
            <!-- LinkedIn Field -->
            <div class="flex items-center border rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-md">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8a6 6 0 100-12 6 6 0 000 12zm-4 3a5 5 0 00-5 5v7h-4v-7a5 5 0 0110 0v7h-4v-7a5 5 0 00-5-5zm14 12v-5.5c0-3.58-1.92-5.5-5.02-5.5-2.63 0-3.8 1.61-4.46 2.73V16h-4v7h4v-5.17c0-1.18.45-2.83 1.88-2.83 1.42 0 1.94 1.28 1.94 2.94V23h4z" />
                </svg>
              </span>
              <input type="text" name="linkedin" value="{{ $profile->userSocial->linkedin ?? '' }}" id="linkedin" placeholder="LinkedIn" class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        
          </div>
        
          <div class="mt-4">
            <div class="flex justify-end">
              <button type="button" @click="$dispatch('close-modal')" class="mr-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
              <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
            </div>
          </div>
        </form>
        
        
      </div>
  </div>
</x-modal>



{{-- Experience --}}
<x-modal id="experience">
  <div x-data class="py-4 max-w-xl mx-auto bg-white ">
    <div class="border-b border-gray-200 pb-4 mb-4">
      <h2 class="text-lg font-semibold text-gray-900">Add Job Experience</h2>
    </div>
    <div>
      <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-x-8">
          <div>
            <div class="mb-4">
              <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
              <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="companyLogo" class="block text-sm font-medium text-gray-700">Company Logo</label>
              <input type="file" id="companyLogo" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:bg-indigo-50 file:text-indigo-700 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold hover:file:bg-indigo-100">
            </div>
            <div class="mb-4">
              <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
              <input type="text" name="company" id="company" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
              <input type="text" name="type" id="employment_type" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
          </div>

          <div>
            <div class="mb-4">
              <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
              <input type="date" name="start_date" id="start_date" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
              <input type="date" name="end_date" id="end_date" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
              <input type="text" name="location" id="location" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
            </div>
            <div class="mb-4">
              <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
              <textarea name="description" id="description" rows="3" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"></textarea>
            </div>
          </div>
        </div>
        <div class="flex justify-end space-x-2">
          <button type="button" @click="$dispatch('close-modal')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Add Experience</button>
        </div>
      </form>
    </div>
  </div>
</x-modal>



{{-- Experience --}}
<x-modal id="certificates">
  <div x-data class="px-6 py-4">
      <div class="text-lg font-medium text-gray-900">
          Create New Certificate
      </div>

      <div class="mt-4">
          <form action="" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                  <input type="text" name="name" id="name" class="py-2 px-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <div class="mb-4">
                  <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
              <div class="flex justify-end">
                  <button type="button" @click="$dispatch('close-modal')" class="mr-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
                  <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
              </div>
          </form>
      </div>
  </div>
</x-modal>

{{-- Project --}}
<x-modal id="project">
  <div x-data class="px-6 py-4 max-w-lg mx-auto bg-white shadow-lg rounded-lg">
    <div class="border-b border-gray-200 pb-4 mb-4">
      <h2 class="text-lg font-semibold text-gray-900">Create New Project</h2>
    </div>
    <div>
      <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title Field -->
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input type="text" name="title" id="title" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
        </div>

        <!-- Image Field -->
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
          <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500
              file:bg-indigo-50 file:text-indigo-700
              file:py-2 file:px-4 file:rounded-full
              file:border-0 file:font-semibold
              hover:file:bg-indigo-100">
        </div>

        <!-- Description Field -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea name="description" id="description" rows="4" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"></textarea>
        </div>

        <!-- Link Field -->
        <div class="mb-4">
          <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
          <input type="text" name="link" id="link" class="mt-1 block w-full py-2 px-3 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-2">
          <button type="button" @click="$dispatch('close-modal')" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
        </div>
      </form>
    </div>
  </div>
</x-modal>
