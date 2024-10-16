@extends('dashboard.layouts.base')
@section('content')

<div class="px-4">
  <section class="container mx-auto pt-6 border-b border-borderAbu">
    @include('dashboard.components.partials.alert')
    <div class="bg-white p-4 md:p-6">
      <div class="flex flex-col md:flex-row justify-between items-start space-y-4 md:space-y-0">
        <!-- Logo and Company Info -->
        <div class="flex flex-col md:flex-row items-start space-y-4 md:space-y-0 md:space-x-6">
          <img src="{{ asset ('storage/'. Auth::user()->company->logo) }}" alt="Company Logo" class="w-24 h-24">
          <div>
            <h1 class="text-xl font-semibold">{{$company->name }}</h1>
            @if (Auth::user()->company->website){
              <a href="https://nomad.com" class="text-blue-500 hover:underline">{{ Auth::user()->company->website }}</a>
            }
            @else
            <a href="https://nomad.com" class="text-blue-500 hover:underline">Anda belum menambahkan website</a>
              
            @endif
            <!-- Company Stats -->
            <div class="flex flex-wrap gap-4 mt-4">
              <div class="flex items-center space-x-2">
                <div class="text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m9 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <div class="text-sm text-gray-500">Founded</div>
                  @if (Auth::user()->company->founded)
                    <div class="font-semibold">{{ Auth::user()->company->founded }}</div>
                  @else
                    <div class="font-semibold"></div>
                  @endif
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <div class="text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m9 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <div class="text-sm text-gray-500">Employees</div>
                  @if (Auth::user()->company->employe)
                    <div class="font-semibold">{{ Auth::user()->company->employe }}</div>
                  @else
                    <div class="font-semibold"></div>
                  @endif
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <div class="text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m9 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <div class="text-sm text-gray-500">Location</div>
                  @if (Auth::user()->company->location)
                    <div class="font-semibold">{{ Auth::user()->company->location }}</div>
                  @else
                    <div class="font-semibold"></div>
                  @endif
                </div>
              </div>
              <div class="flex items-center space-x-2">
                <div class="text-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m9 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <div class="text-sm text-gray-500">Industry</div>
                  @if (Auth::user()->company->industry)
                    <div class="font-semibold">{{ Auth::user()->company->industry }}</div>
                  @else
                    <div class="font-semibold"></div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Actions -->
        <div class="flex space-x-4">
          <button class="flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.5V12M9 11h6M9 7h6M5 7h.01M5 11h.01M12 19v2m0-10v2m0-2V5m0 4V3m4 8h-8a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2v-6a2 2 0 00-2-2z" />
            </svg>
            <span class="ml-2">Public View</span>
          </button>
          <button class="flex items-center text-blue-600 hover:text-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.5V12M9 11h6M9 7h6M5 7h.01M5 11h.01M12 19v2m0-10v2m0-2V5m0 4V3m4 8h-8a2 2 0 00-2 2v6a2 2 0 002 2h8a2 2 0 002-2v-6a2 2 0 00-2-2z" />
            </svg>
            <span class="ml-2">Profile Settings</span>
          </button>
        </div>
      </div>
    </div>
  </section>
  
  <section class="py-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- Left Section (2/3) -->
      <div class="w-full bg-white p-6 lg:col-span-2 flex flex-col space-y-6">
        <!-- Company Profile -->
        <div class="w-full pb-6 border-b border-borderAbu">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Description</h4>
          </div>
          @if (Auth::user()->company->description)
            <div class="font-semibold">{{ Auth::user()->company->description }}</div>
          @else
            <p class="text-textSecondary text-base">
            </p>
          @endif  
          
        </div>

        <!-- Contact -->
        <div class="w-full pb-6 border-b border-borderAbu">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Social Media</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button  @click="$dispatch('open-modal', 'tech-stack')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="flex flex-wrap gap-4">

            @if (Auth::user()->company->companySocial)
              
            <!-- Instagram -->
            <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold">
                <img src="{{ asset('img/instagram.png') }}" class="w-8 h-8" alt="Instagram">
                <p class="ml-4">{{ Auth::user()->company->companySocial->instagram }}</p>
            </div>
        
            <!-- GitHub -->
            <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold">
                <img src="{{ asset('img/github.png') }}" class="w-8 h-8" alt="GitHub">
                <p class="ml-4">{{ Auth::user()->company->companySocial->github }}</p>
            </div>
        
            <!-- Facebook -->
            <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold">
                <img src="{{ asset('img/facebook.png') }}" class="w-8 h-8" alt="Facebook">
                <p class="ml-4">{{ Auth::user()->company->companySocial->facebook }}</p>
            </div>
        
            <!-- Twitter -->
            <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold">
                <img src="{{ asset('img/twitter.png') }}" class="w-8 h-8" alt="Twitter">
                <p class="ml-4">{{ Auth::user()->company->companySocial->twitter }}</p>
            </div>
        
            <!-- LinkedIn -->
            <div class="flex items-center text-primary text-lg border border-primary px-4 py-2 font-semibold">
                <img src="{{ asset('img/linkedin.png') }}" class="w-8 h-8" alt="LinkedIn">
                <p class="ml-4">{{ Auth::user()->company->companySocial->linkedin }}</p>
            </div>
            @endif
      
          
          
          </div>
        </div>

        <!-- Working at Nomad -->
        <div class="w-full pb-6 border-b border-borderAbu">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Working at Nomad</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'image')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="flex flex-col md:flex-row gap-4 h-[415px]">
            <!-- Gambar utama di sebelah kiri -->
            @if (Auth::user()->company->companyImage)
            <div class="flex-1">
              <img src="{{ asset('storage/' . (Auth::user()->company->companyImage->image1 ?? 'default-image-path')) }}" alt="" class="w-full h-auto object-cover rounded-lg">
            </div>
        
            <!-- Gambar kecil di sebelah kanan, diatur secara vertikal dengan tinggi sama -->
            <div class="flex flex-row md:flex-col flex-1 gap-4">
              <img src="{{ asset ('storage/' . Auth::user()->company->companyImage->image2 ?? 'default-image-path') }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
              <img src="{{ asset ('storage/' . Auth::user()->company->companyImage->image3 ?? 'default-image-path') }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
              <img src="{{ asset ('storage/' . Auth::user()->company->companyImage->image4 ?? 'default-image-path') }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
            </div>
            @endif
          </div>
        </div>
             
        <!-- Benefits -->
        <div class="w-full pb-6 border-b border-borderAbu">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Benefits</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'benefit')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Benefit items -->
            @if (Auth::user()->company->companyBenefit->first())
            @foreach (Auth::user()->company->companyBenefit as $benefit)
              <div class="flex flex-col">
                <img src="{{ asset ('storage/'. $benefit->image ?? 'default-image-path') }}" alt="Healthcare Icon" class="w-12 h-12 md:w-16 md:h-16 mb-4">
                <h4 class="text-xl font-semibold font-poppins text-gray-800 mb-2">{{ $benefit->title }}</h4>
                <p class="text-gray-600">
                  {{ $benefit->description }}
                </p>
              </div>
            @endforeach
            @endif
            <!-- Repeat for other benefit items -->
          </div>
        </div>
        
        <!-- Open Positions -->
        <div class="w-full">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Position open at Nomad</h4>
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
          <div class="w-full flex flex-col gap-y-4">
            <!-- Job position items -->
            @if (Auth::user()->company->pekerjaan)
              @foreach (Auth::user()->company->pekerjaan as $pekerjaan)
                <div class="w-full p-4 xl:p-6 bg-white rounded-lg sm:flex sm:space-x-4 border border-borderAbu">
                  <div>
                    <img src="{{ asset ('storage/'. $pekerjaan->company->logo) }}" alt="Company Icon" class="mb-3 sm:mt-1 sm:w-12 sm:h-12">
                  </div>
                  <div>
                    <p class="font-semibold text-xl mb-1">{{ $pekerjaan->title }}</p>
                    <div class="flex gap-x-2 text-sm text-gray-600 mb-2">
                      <p>{{ Auth::user()->company->name }}</p>
                      <span>•</span>
                      <p>{{ Auth::user()->company->location }}</p>
                    </div>
                    <div class="flex gap-2 flex-wrap items-center">
                      @foreach ($pekerjaan->type as $type)
                        <p class="bg-green-100 text-green-600 font-semibold px-2 py-1 rounded-full">{{ $type->title }}</p>
                      @endforeach
                      @foreach ($pekerjaan->category as $category)
                        <p class="border border-yellow-400 text-yellow-600 font-semibold px-2 py-1 rounded-full">{{ $category->title }}</p>
                      @endforeach
                    </div>
                  </div>
                </div>
              @endforeach
            @endif            
            <!-- Repeat for other job positions -->
          </div>
        </div>
      </div>

      <!-- Right Section (1/3) -->
      <div class="w-full space-y-6 bg-white p-6">
        <!-- Tech Stack -->
        <div class="border-b border-border pb-8">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Tech Stack</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'tech')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          

          <div class="grid grid-cols-3 gap-y-12 px-4">
            <!-- Tech stack items -->
            @if (Auth::user()->company->tech)
              @foreach (Auth::user()->company->tech as $tech)
              <div class="flex flex-col items-center">
                {{-- 'storage/'. --}}
                  <img src="{{ asset('storage/'.$tech->logo) }}" class="w-20 h-20 object-contain" alt="">
                  <p class="text-grey mt-2 text-center">{{ $tech->name }}</p>
              </div>
              @endforeach
            @endif
            <!-- Repeat for other tech stack items -->
          </div>
          <p class="font-semibold text-primary hidden md:block mt-6">View tech stack <i class="fa-solid fa-arrow-right"></i></p>
        </div>

        <!-- Office Location -->
        <div class="border-b border-border pb-8 md:border-none">
          <div class="flex justify-between items-center mb-6">
            <h4 class="text-2xl font-semibold font-poppins">Location</h4>
            <div class="flex space-x-2">
              <!-- Edit Button -->
              <button @click="$dispatch('open-modal', 'location')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/edit.png') }}" class="w-6 h-6" alt="Edit">
              </button>
              
              <!-- Add Button -->
              <button @click="openModal" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
              </button>
            </div>
          </div>
          <div class="flex flex-col gap-y-4">
            <!-- Location items -->
            <div class="flex flex-col ">
              <p>{{ Auth::user()->company->companyLocation->first()->title ?? ''}}</p>
              <p>{{ Auth::user()->company->companyLocation->first()->location ?? '' }}</p>
            </div>
            <!-- Repeat for other locations -->
          </div>
        </div>
      </div>
    </div>
  </div> 