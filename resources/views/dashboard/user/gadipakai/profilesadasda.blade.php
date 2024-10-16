@extends('dashboard.layouts.base')
@section('content')


<div class="w-full bg-putihG ">
  @include('dashboard.components.partials.alert')
  <div class="p-6">
    <div class="w-full px-3 ">
      <div class="">
        <img src="{{ asset ('storage/' . $profile->background) }}" class="w-full object-cover" style="height: 400px; border-radius: 0 0 40px 40px" alt="Background Image">
      </div>
    
      <div style="width: 90%; border-radius: 20px" class="backdrop-filter backdrop-blur-lg top-1/2 transform -translate-y-1/2 bg-white px-6 py-4 mx-auto shadow-lg flex justify-between items-center z-10">
        <div class="flex items-center ">
          <img src="{{ asset ('storage/'. $profile->image) }}" class="rounded-full w-20 h-20 mr-4 shadow-lg" style="border-radius: 10px" alt="Profile Image">
          <div>
            <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-500">{{ $profile->current_job }}</p>
          </div>
        </div>
       <div class="flex items-center">
        <!-- Edit Button -->
        <button @click="$dispatch('open-modal', 'background')" class="border border-borderAbu rounded-lg p-2 mr-4 hover:border-primary transition-colors">
          <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
        </button>
        <div>
          <a href="{{ route('dashboard.usersetting') }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Account Settings
          </a>
        </div>
       </div>
      </div>
    </div>
    
    
    
    <div class="grid grid-cols-1 lg:grid-cols-7 gap-4 -mt-4">
      <!-- Profile Information Section -->
      <div class="col-span-4 px-3  rounded-xl">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white rounded-2xl">
          <div class="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
            <div class="flex justify-between items-center mb-6">
              <h4 class="text-2xl font-semibold font-poppins">About</h4>
              <div class="flex space-x-2">
                <!-- Edit Button -->
                <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                  <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
                </button>
                
                <!-- Add Button -->
                <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                  <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
                </button>
              </div>
            </div>
          </div>
          <div class="flex-auto p-4">
            <p class="leading-normal text-sm text-dark"> {{ $profile->description }}</p>
            <hr class="my-6 border-t border-gray-200" />
            <ul class="space-y-2">
              <li class="py-2 text-sm"><strong class="text-slate-700">Full Name:</strong>{{ $profile->name }}</li>
              <li class="py-2 text-sm"><strong class="text-slate-700">Mobile:</strong> {{ $profile->userSocial->phone ?? '' }}
              </li>
              <li class="py-2 text-sm"><strong class="text-slate-700">Email:</strong> {{ $profile->userSocial->email ?? '' }}</li>
              <li class="py-2 text-sm"><strong class="text-slate-700">Location:</strong> {{ $profile->address }}</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Social Links Section -->
      <div class="col-span-2 px-3  rounded-xl">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white rounded-2xl p-6">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Social Media</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'social-media')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          @if ($profile->userSocial)
            <div class="space-y-4">
              <!-- Instagram -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-instagram text-pink-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Instagram</p>
                  <a href="{{ $profile->userSocial->instagram }}" class="text-blue-500 text-sm underline">instagram.com/{{ $profile->userSocial->instagram }}</a>
                </div>
              </div>
              <!-- GitHub -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-github text-gray-800 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">GitHub</p>
                  <a href="{{ $profile->userSocial->github }}" class="text-blue-500 text-sm underline">github.com/{{ $profile->userSocial->github }}</a>
                </div>
              </div>
              <!-- Twitter (X) -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-x-twitter text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Twitter (X)</p>
                  <a href="{{ $profile->userSocial->twitter }}" class="text-blue-500 text-sm underline">twitter.com/{{ $profile->userSocial->twitter }}</a>
                </div>
              </div>
              <!-- Facebook -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-facebook text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">Facebook</p>
                  <a href="{{ $profile->userSocial->facebook }}" class="text-blue-500 text-sm underline">facebook.com/{{ $profile->userSocial->facebook }}</a>
                </div>
              </div>
              <!-- Twitter (X) -->
              <div class="flex items-center space-x-4">
                <i class="fa-brands fa-linkedin text-blue-500 text-xl"></i>
                <div>
                  <p class="text-gray-700 font-medium">LinkedIn</p>
                  <a href="{{ $profile->userSocial->linkedin }}" class="text-blue-500 text-sm underline">linkedin.com/{{ $profile->userSocial->linkedin }}</a>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      
      
      
      
    </div>
    <div class="grid grid-cols-7 gap-4 px-3">
      <!-- Experience Section -->
      <div class="col-span-4 lg:mt-6">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white bg-clip-border p-4  rounded-xl">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Experience</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'experience')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="space-y-6">
            @foreach ($profile->userExperience as $experience)
            <div class="flex items-start space-x-4 pb-8 border-b border-grey">
              <!-- Icon -->
              
        
                <img src="{{ asset('storage/'. $experience->image) }}" class="w-12 h-12" alt="">
                <div>
                  <!-- Job Title and Company -->
                  <p class="font-semibold text-lg text-black">{{ $experience->title }}</p>
                  <p class="text-sm text-gray-500"><span class="text-black">{{ $experience->company }}</span>, {{ $experience->type }}, {{ $experience->start_date }} - {{ $experience->end_date }}</p>
                  <!-- Location -->
                  <p class="text-sm text-gray-500">{{ $experience->location }}</p>
                  <!-- Job Description -->
                  <p class="text-sm text-gray-700 mt-2">{{ $experience->description }}</p>
                </div>
       
            </div>
            @endforeach

          </div>
        </div>
      </div>
      <div class="col-span-3 lg:mt-6 px-3">
        <div class="relative bg-white rounded-xl p-4">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Certificates</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'certificates')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex items-start pb-8 border-b border-gray-300">
              <img src="{{ asset ('img/sertif.jpeg') }}" class="w-full h-auto object-cover" alt="Certificate Image">
            </div>
            <div class="flex items-start pb-8 border-b border-gray-300">
              <img src="{{ asset ('img/sertif.jpeg') }}" class="w-full h-auto object-cover" alt="Certificate Image">
            </div>
            <div class="flex items-start pb-8 border-b border-gray-300">
              <img src="{{ asset ('img/sertif.jpeg') }}" class="w-full h-auto object-cover" alt="Certificate Image">
            </div>
            <div class="flex items-start pb-8 border-b border-gray-300">
              <img src="{{ asset ('img/sertif.jpeg') }}" class="w-full h-auto object-cover" alt="Certificate Image">
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="flex-none w-full max-w-full px-3 mt-6">
      <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex justify-between items-center mb-6">
          <h4 class="text-2xl font-semibold font-poppins">Project</h4>
          <div class="flex space-x-2">
            <!-- Edit Button -->
            <button @click="$dispatch('open-modal', 'project')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
            </button>
            
            <!-- Add Button -->
            <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
              <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
            </button>
          </div>
        </div>
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            @foreach ($profile->userProject as $project)
            <div class="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
              <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                <div class="relative h-40"> {{-- Tetapkan tinggi tetap pada container gambar --}}
                  <a class="block shadow-xl rounded-2xl h-full"> {{-- Pastikan tautan mengambil seluruh tinggi container --}}
                    <img src="{{ asset ('storage/' . $project->image) }}" alt="img-blur-shadow" class="w-full h-full object-cover shadow-soft-2xl rounded-2xl" />
                  </a>
                </div>
                <div class="flex-auto px-1 pt-6">
                  <a href="javascript:;">
                    <h5>{{ $project->title }}</h5>
                  </a>
                  <p class="mb-6 leading-normal text-sm">{{ Str::limit($project->description, 100) }}</p>
                  <div class="flex items-center justify-between">
                    <a href="{{ $project->link }}" target="_blank" class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Project</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          
          </div>
        </div>
      </div>
    </div>
  </div>
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
