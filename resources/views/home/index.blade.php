@extends('home.layouts.home')
@section('content')
<style>
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
</style>


<section>
    <div class="container mx-auto p-4 items-center">
        <div class="grid md:grid-cols-12 mt-12 lg:mt-0 items-center relative ">
            <div class="w-full sm:w-auto pb-20  md:col-span-6 lg:col-span-7 -mt-10 lg:mt-10 overflow-hidden" data-aos="fade-down"    data-aos-duration="1500" >
                <h4 class="font-montserrat font-[550] text-5xl lg:text-6xl xl:text-8xl tracking-tight">Your Dream Careers Starts
                    <span class=" lg:flex items-center lg:w-[560px]">
                        Here
                        <span class="lg:text-sm mt-4 text-base block lg:inline-block font-medium text-gray-400 tracking-normal lg:leading-[24px] lg:ml-6">
                            Job Hunting Made Easy: Get instant alerts for jobs matching your skills and innovative job finder.
                        </span>
                    </span>
                </h4>

                <div class="input flex justify-between mt-5 md:mt-10 rounded-full">
                    <form action="{{ route('jobs') }}" method="GET" class="md:flex w-full items-center">
                        <!-- Search Box -->
                        <div class="flex items-center flex-grow relative md:mr-4">
                            <input type="text" class="py-2 md:py-3 px-4 w-full  bg-transparent border  border-gray-400 rounded-xl md:rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
                            <!-- Updated search icon -->
                            <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                        </div>

                        <div class="flex items-center mt-5  md:hidden flex-grow relative md:mr-4">
                            <input type="text" class="py-2 md:py-3 px-4 w-full  bg-transparent border  border-gray-400 rounded-xl md:rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="location" placeholder="Search for a Job Location">
                            <!-- Updated search icon -->
                            <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                        </div>
                
                        <!-- Button -->
                        <div class="mt-5 md:mt-0">
                            <button type="submit" class="block  w-full bg-primary border text-white font-medium md:px-4 lg:px-8 py-3 md:py-4 rounded-xl  transition-colors duration-300 ease-in-out hover:bg-purple-600 lg:mr-4">
                                Get Started
                            </button>
                        </div>
                    </form>
                </div>

                <div class=" relative flex justify-center  items-center bg-white shadow-md rounded-xl px-4 py-2 md:space-x-2 max-w-xs mx-auto mt-8 md:mt-15">
                    <!-- Garis Lengkung Kiri (Arrow Kiri) -->
                    <div class="absolute -left-6 md:-left-50  -top-14">
                        <img src="{{ asset('img/arrowkiri.png') }}" class="w-20 h-20 md:w-36 md:h-26" alt="">
                    </div>
                
                    <!-- Avatar Circles -->
                    <div class="flex -space-x-2">
                        <!-- Avatar 1 (warna pertama) -->
                        <div class="w-10 h-10 rounded-full bg-yellow-400 border-2 border-white"></div>
                        <!-- Avatar 2 (warna kedua) -->
                        <div class="w-10 h-10 rounded-full bg-purple-400 border-2 border-white"></div>
                        <!-- Avatar 3 (warna ketiga) -->
                        <div class="w-10 h-10 rounded-full bg-pink-400 border-2 border-white"></div>
                    </div>
                
                    <!-- Text -->
                    <div class="text-gray-700">
                        <span class="font-bold text-primary">60k+ </span>
                        <span class="font-semibold">Talents Found Their Dream Job!</span>
                    </div>
                
                    <!-- Garis Lengkung Kanan (Arrow Kanan) -->
                    <div class="absolute -right-6 md:-right-40 top-12 md:top-6">
                        <img src="{{ asset('img/arrowkanan.png') }}" class="w-20 h-20 md:w-26 md:h-26" alt="">
                    </div>
                </div>

            </div>
            <div class="w-full md:col-span-6 lg:col-span-5 hidden md:block " data-aos="fade-left" data-aos-duration="1500" >
                <img src="{{ asset('img/bg-hero.jpg') }}" class="w-full lg:w-full lg:h-auto md:absolute lg:relative md:-top-10 lg:top-0 md:w-[400px] md:h-[350px]" alt="">
                <div class="md:grid md:grid-cols-2 gap-6 md:mt-73 lg:mt-6 md:pl-22 xl:pl-28  ">
                    <!-- Job Section -->
                    <div class="flex flex-col items-center justify-center bg-blue-100 text-black md:rounded-tr-[60px] md:rounded-bl-[60px] lg:rounded-tr-[80px] lg:rounded-bl-[80px] p-6  transition duration-300 ease-in-out md:h-34 lg:h-50 w-full">
                        <i class="fa-solid fa-briefcase text-blue-600  text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Jobs</h4>
                        <p class="text-3xl font-bold">{{ $jobs->count() }}</p>
                    </div>
                
                    <!-- Company Section -->
                    <div class="flex flex-col items-center justify-center bg-purple-100 text-black md:rounded-t-[60px] md:rounded-br-[60px] lg:rounded-t-[80px] lg:rounded-br-[80px]  p-6 transition duration-300 ease-in-out md:h-34 lg:h-50 w-full">
                        <i class="fa-solid fa-building text-purple-600 text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Company</h4>
                        <p class="text-3xl font-bold">{{ $companies->count() }}</p>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="mt-20">
            <h4 class="font-medium text-xl font-poppins mb-2">Several Companies are Ready to Help You</h4>
            <div class="flex flex-wrap gap-x-3">
                @foreach ($companies as $company)
                    <a href="{{ route('jobs', $company->id) }}">
                        <img src="{{ asset('storage/' . $company->logo) }}" class="w-10 h-10 rounded-full mr-2 grayscale hover:grayscale-0" alt="">
                    </a>
                @endforeach
            </div>
        </div> --}}

       
    </div>
</section>


<section class="bg-purple-50 mt-10 md:mt-8">
    <div class="container mx-auto " data-aos="fade-up" data-aos-duration="1000">
        <p class="font-thin text-xl text-center md:text-start">Join Connect Today</p>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-y-4 md:gap-8 mt-2 lg:mt-4">
            <div class="lg:col-span-5 md:text-left">
                <h4 class="text-4xl lg:text-6xl text-center font-medium md:text-start font-poppins">Experience with Number</h4>
            </div>
    
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-4 px-8 text-center">
                <div class="px-4">
                    <h4 class="text-primary text-3xl md:text-4xl font-poppins font-semibold">92%</h4> 
                    <p class="font-thin md:mt-2">Many users find relevant jobs according to their skills</p>
                </div>
        
                <div class="px-4 border-t sm:border-t-0 sm:border-r sm:border-l border-borderAbu">
                    <h4 class="text-primary text-3xl md:text-4xl font-poppins font-semibold">90%</h4>
                    <p class="font-thin md:mt-2">Data filtering from companies based on job requirements</p>
                </div>
        
                <div class="px-4">
                    <h4 class="text-primary text-3xl md:text-4xl font-poppins font-semibold">89%</h4>
                    <p class="font-thin md:mt-2">Many top employers and can connect with many users</p>
                </div>
            </div>
        </div>
    </div>
</section>


@guest 
    <section class="mt-12 ">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-center lg:justify-between">
                <!-- Bagian Gambar -->
                <div class="hidden lg:w-1/2 lg:flex justify-center mb-10 lg:mb-0" data-aos="fade-right" data-aos-duration="1500"  data-aos-offset="300"
                >
                    <img src="{{ asset('img/laptopw.png') }}" class="w-full max-w-sm lg:max-w-lg" alt="">
                </div>
    
                <!-- Bagian Teks -->
                <div class="w-full lg:w-1/2 text-center lg:text-left" data-aos="fade-up"  data-aos-duration="1500"  data-aos-offset="400">
                    <h4 class="font-thin text-xl mb-2 lg:my-5 ">Create Profile</h4>
                    <h2 class="text-4xl lg:text-6xl font-medium font-poppins ">Build Your Personal 
                        <span class="block">Account Profile</span>
                    </h2>
                    <p class="mt-5 mb-5 lg:mb-10 text-md lg:text-lg">Create an account for the job information you want, get daily notifications and you can easily apply directly to the company you want and create an account now for free.</p>
                    <a href="" class="inline-block py-3 px-4 lg:py-4 lg:px-6 bg-primary font-semibold text-white rounded-2xl">Create Account</a>
                </div>
            </div>
        </div>
    </section>
@endguest


<section class=" mt-12 ">
    <div class="container mx-auto">
        <div class="flex flex-wrap  lg:flex-nowrap items-center">
            <!-- Bagian Teks -->
            <div class="lg:w-1/2 mb-6 lg:mb-0 mr-6" data-aos="fade-up" data-aos-duration="1500" >
                <h2 class="text-4xl lg:text-6xl  font-medium text-left  font-poppins text-gray-900 tracking-tight">Let's us help you choose the category you want</h2>
                <p class=" text-md md:text-lg mt-4 lg:mt-6 text-left">But I must explain to you how all this mistaken idea of pleasure and praising pain was born and I will teach you.</p>
            </div>

            <!-- Kategori -->
    
            <div class="lg:w-1/2 w-full lg:grid lg:grid-cols-2 max-w-7xl mx-auto  gap-6 hidden " data-aos="fade-left" ata-aos-duration="1500" data-aos-offset="200">
                @if ($categories->count() > 0)
                    @foreach ($categories->take(2) as $category)
                        @php
                            $colors = ['bg-blue-500', 'bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-primary']; // Daftar warna yang diinginkan
                            $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                        @endphp
                        <div class="relative p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out w-full">
                            <a href="{{ route('jobs').'?category='.$category->id }}" class="">
                                <div class="p-3 rounded-full {{ $randomColor }} flex items-center justify-center w-16 h-16">
                                    <i class="{{ $category->icon }} text-white text-2xl"></i>
                                </div>
                                <div class="mt-4">
                                    <h4 class="text-xl font-bold mb-2 text-gray-900">{{ $category->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ $category->pekerjaan->count() }} Jobs Available</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="md:w-1/2 w-full flex overflow-x-auto max-w-7xl mx-auto  gap-6 md:hidden no-scrollbar" >
            @if ($categories->count() > 0)
                @foreach ($categories->take(6) as $category)
                    @php
                        $colors = ['bg-blue-500', 'bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-primary']; // Daftar warna yang diinginkan
                        $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                    @endphp
                    <div class="relative p-6 bg-white rounded-lg border border-borderAbu hover:shadow-md transition duration-300 ease-in-out w-50 sm:w-64 flex flex-col justify-between flex-shrink-0 h-49">
                        <a href="{{ route('jobs').'?category='.$category->id }}" class="flex flex-col h-full">
                            <div class="p-3 rounded-full {{ $randomColor }} flex items-center justify-center w-12 h-12">
                                <i class="{{ $category->icon }} text-white text-xl"></i>
                            </div>
                            <div class="mt-auto">
                                <h4 class="text-xl font-normal mb-2 uppercase text-gray-900">{{ $category->title }}</h4>
                                <p class="text-sm text-gray-600">{{ $category->pekerjaan->count() }} Jobs Available</p>
                            </div>
                        </a>
                    </div>
                @endforeach
                
            @endif
        </div>
        <a href="{{ route('jobs') }}" class="text-end font-light mt-4 text-sm  font-poppins text-primary  block md:hidden">Show All Categories <i class="fa-solid fa-arrow-right"></i></a>
        
        
        

        <!-- Kategori Lainnya -->
        <div class="mx-auto  lg:mt-10 hidden md:block" data-aos="fade-up" data-aos-duration="500" data-aos-duration="300">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
                @foreach ($categories->slice(2, 4) as $category)
                    @php
                        $colors = ['bg-blue-500', 'bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-primary']; // Daftar warna yang diinginkan
                        $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                    @endphp
                    <div class="relative p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <a href="{{ route('jobs') . '?category=' . $category->id }}" class="">
                            <div class="p-3 rounded-full {{ $randomColor }} w-16 h-16 flex items-center justify-center">
                                <i class="{{ $category->icon }} text-white text-2xl"></i>
                            </div>
                            <div class="mt-4">
                                <h4 class="text-xl font-bold mb-2 text-gray-900">{{ $category->title }}</h4>
                                <p class="text-sm text-gray-600">{{ $category->pekerjaan->count() }} Jobs Available</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>




<section>
    <div class="container mt-12" data-aos="zoom-in-up" data-aos-duration="500" data-aos-offset="200">
        <div class="text-center">
            <p class="font-light text-xl mb-2">Your Dream Jobs</p>
            <h4 class="font-poppins font-medium text-4xl lg:text-6xl">Explore and Find <br> your Job Here</h4>
        </div>
        <div class="input flex justify-between mt-6 md:mt-10 rounded-full max-w-2xl mx-auto">
            <form action="{{ route('jobs') }}" method="GET" class="flex w-full items-center">
                <!-- Search Box -->
                <div class="flex items-center flex-grow relative md:mr-4">
                    <input type="text" class="py-3 px-4 w-full  bg-transparent border  border-borderAbu rounded-l-full md:rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
                    <!-- Updated search icon -->
                    <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                </div>
        
                <!-- Button -->
                <div>
                    <button type="submit" class="bg-primary border text-white font-medium  px-6 md:px-8 py-3 rounded-r-full  md:rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600 mr-4">
                        Search
                    </button>
                </div>
            </form>
        </div>


        @guest  
            <div class="flex items-center justify-center text-center md:gap-x-4 mt-10 hidden md:block">
                <i class="fa-solid fa-bolt-lightning text-primary"></i>
                <a href="{{ route('dashboard.userprofile') }}" class="font-poppins text-primary text-xl">Upload your resume - let's employers find you</a>
            </div>
            <div class="flex items-center justify-center text-center  mt-5 md:hidden">
                <a href="{{ route('dashboard.userprofile') }}" class="font-poppins text-primary text-xl ">
                    Upload your resume - let's employers find you
                </a>
            </div>
        @endguest
        @auth    
            @if (Auth::user()->prosesi === 'company')

            @else
                <div class="flex items-center justify-center gap-x-4 mt-10">
                    <i class="fa-solid fa-bolt-lightning text-primary"></i>
                    <a href="{{ route('dashboard.userprofile') }}" class="font-poppins text-primary text-xl">Upload your resume - let's employers find you</a>
                </div>
            @endif
        @endauth

        <div class="my-8">
            <div class="flex md:gap-x-4 justify-center text-sm md:text-base">
                <div class="">
                    <a href="#featured" class="tab-link bg-primary rounded-full inline-block px-4 py-2 sm:px-6 lg:px-8 md:py-4 text-white hover:bg-primary hover:text-white transition duration-300 ease-in-out ">
                        Featured Jobs
                    </a>
                </div>
                <div class="">
                    <a href="#latest" class="tab-link  rounded-full inline-block px-4 py-2 sm:px-6 lg:px-8 md:py-4 text-gray-600 hover:bg-primary hover:text-white transition duration-300 ease-in-out">
                        Latest Jobs
                        
                    </a>
                </div>
                <div class="">
                    <a href="#popular-jobs" class="tab-link  rounded-full inline-block px-4 py-2 sm:px-6 lg:px-8 md:py-4 text-gray-600 hover:bg-primary hover:text-white transition duration-300 ease-in-out">
                        Populer Jobs
                    </a>
                </div>
                <div class="hidden md:block">
                    <a href="#popular-company" class="tab-link  rounded-full inline-block px-4 py-2 sm:px-6 lg:px-8 md:py-4 text-gray-600 hover:bg-primary hover:text-white transition duration-300 ease-in-out">
                        Popular Company
                    </a>
                </div>
            </div>
        </div>

        <!-- featured Applications Tab -->
        <div id="featured" class="tab-content active mt-2 ">
            <div class="flex gap-x-4 overflow-x-auto no-scrollbar snap-mandatory  md:hidden">
                @foreach ($featured as $job)
                    <a href="{{ route('jobDetail', $job->id) }}" class="space-y-4 snap-start block">
                        <div class="bg-white rounded-lg p-4 w-80 h-full scroll-snap-align-start  border w border-borderAbu ">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-1">
                                    <div class="w-20 h-20 rounded-full flex items-center justify-center text-white font-bold">
                                        <img src="{{ asset('storage/' . $job->company->logo) }}" alt="">
                                    </div>
                                    <div>
                                        <h2 class="font-semibold text-sm mt-1">{{ $job->company->name }}</h2>
                                        <p class=" font-semibold text-xl">{{ $job->title }}</p>
                                        <p class="text-xs text-gray-500 mb-2">{{ $job->company->location }} - 
                                            @foreach ($job->type->take(2) as $type)
                                                {{ $type->title }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <form action="" method="POST" class="group">
                                    <button class="cursor-pointer border border-borderAbu px-3.5 py-2 group-hover:bg-purple-400 transition duration-150 ease-in-out rounded-full">
                                        <i class="fa-regular fa-bookmark text-lg group-hover:text-white"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="flex justify-between items-center text-xs">
                                <span class="rounded-full text-gray-800 px-2 py-1 ">Rp. {{ number_format($job->salary) }} / month</span>
                                @foreach ($job->category->take(1) as $category)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $category->title }}</span>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-500 mt-3 border-b border-gray-300 pb-3">{{ Str::limit($job->description, 100) }}</p>
                            <div class="flex items-center justify-between mt-2  text-xs text-gray-400">
                                <p class="">{{ $job->applicant->count() }} Applicant</p>
                                <p>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }} </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class=" md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 hidden md:block">
                <!-- Google Job Listing -->
                @foreach ($featured as $job)    
                    @php
                        $colors = ['bg-blue-100', 'bg-green-100', 'bg-red-100', 'bg-yellow-100', 'bg-purple-100']; // Daftar warna yang diinginkan
                        $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                    @endphp
                    <div class="h-full">
                        <a href="{{ route('jobDetail', $job->id) }}" class="h-full">
                            <div class="border border-borderAbu rounded-xl p-2 hover:border-primary hover:scale-105 transition duration-300 ease-in-out">
                                <div class="{{ $randomColor }} flex flex-col justify-between rounded-xl p-6 h-67">
                                    <div>
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex items-center">
                                                <div class="rounded-full mr-2">
                                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="" class="h-16 w-20 md:h-12 md:w-12 rounded-full">
                                                </div>
                                                <p class="text-sm text-gray-600 bg-white px-3 py-2 font-bold rounded-full">{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                            </div>
                                            
                                            <button class="text-gray-600 bg-white px-3 py-2 font-bold rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="font-semibold mt-2">{{ $job->company->name }}</p>
                                        
                                        <div class="flex justify-between mb-5">
                                            <div class="flex items-start">
                                                <h3 class="text-4xl font-semibold">{{ $job->title }}</h3>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap overflow-x-auto gap-2">
                                        @foreach ($job->category as $category  )
                                        <span class="border border-borderAbu text-sm px-2 py-1 rounded-full">{{ $category->title }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-3">
                                    <div class="= px-6 py-2">
                                        <p class="text-xl font-bold">RP. {{ number_format($job->salary) }} <span class="font-normal text-sm">/ month</span></p>
                                        <p class="text-sm text-gray-600">{{ $job->company->location }}</p>
                                    </div>
                                    <div class="px-6 py-2">
                                        <a href="{{ route('jobDetail', $job->id) }}" class=" bg-gray-800 text-white px-5 py-2 rounded-full text-sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>

        <!-- In Review Applications Tab -->
        <div id="latest" class="tab-content mt-2 ">

            <div class="flex gap-x-4 overflow-x-auto no-scrollbar snap-mandatory  md:hidden">
                @foreach ($latests as $job)
                    <a href="{{ route('jobDetail', $job->id) }}" class="space-y-4 snap-start block">
                        <div class="bg-white rounded-lg p-4 w-80 h-full scroll-snap-align-start  border w border-borderAbu ">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-1">
                                    <div class="w-20 h-20 rounded-full flex items-center justify-center text-white font-bold">
                                        <img src="{{ asset('storage/' . $job->company->logo) }}" alt="">
                                    </div>
                                    <div>
                                        <h2 class="font-semibold text-sm mt-1">{{ $job->company->name }}</h2>
                                        <p class=" font-semibold text-xl">{{ $job->title }}</p>
                                        <p class="text-xs text-gray-500 mb-2">{{ $job->company->location }} - 
                                            @foreach ($job->type->take(2) as $type)
                                                {{ $type->title }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <form action="" method="POST" class="group">
                                    <button class="cursor-pointer border border-borderAbu px-3.5 py-2 group-hover:bg-purple-400 transition duration-150 ease-in-out rounded-full">
                                        <i class="fa-regular fa-bookmark text-lg group-hover:text-white"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="flex justify-between items-center text-xs">
                                <span class="rounded-full text-gray-800 px-2 py-1 ">Rp. {{ number_format($job->salary) }} / month</span>
                                @foreach ($job->category->take(1) as $category)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $category->title }}</span>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-500 mt-3 border-b border-gray-300 pb-3">{{ Str::limit($job->description, 100) }}</p>
                            <div class="flex items-center justify-between mt-2  text-xs text-gray-400">
                                <p class="">{{ $job->applicant->count() }} Applicant</p>
                                <p>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }} </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>



            <div class=" md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 hidden">
                <!-- Google Job Listing -->
                @foreach ($latests as $job)    
                    @php
                        $colors = ['bg-blue-100', 'bg-green-100', 'bg-red-100', 'bg-yellow-100', 'bg-purple-100']; // Daftar warna yang diinginkan
                        $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                    @endphp
                    <div class="h-full">
                        <a href="{{ route('jobDetail', $job->id) }}" class="h-full">
                            <div class="border border-borderAbu rounded-xl p-2 hover:border-primary hover:scale-105 transition duration-300 ease-in-out">
                                <div class="{{ $randomColor }} flex flex-col justify-between rounded-xl p-6 h-67">
                                    <div>
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex items-center">
                                                <div class="rounded-full mr-2">
                                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="" class="h-16 w-20 md:h-12 md:w-12 rounded-full">
                                                </div>
                                                <p class="text-sm text-gray-600 bg-white px-3 py-2 font-bold rounded-full">{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                            </div>
                                            
                                            <button class="text-gray-600 bg-white px-3 py-2 font-bold rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="font-semibold mt-2">{{ $job->company->name }}</p>
                                        
                                        <div class="flex justify-between mb-5">
                                            <div class="flex items-start">
                                                <h3 class="text-4xl font-semibold">{{ $job->title }}</h3>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap overflow-x-auto gap-2">
                                        @foreach ($job->category as $category  )
                                        <span class="border border-borderAbu text-sm px-2 py-1 rounded-full">{{ $category->title }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-3">
                                    <div class="= px-6 py-2">
                                        <p class="text-xl font-bold">RP. {{ number_format($job->salary) }} <span class="font-normal text-sm">/ month</span></p>
                                        <p class="text-sm text-gray-600">{{ $job->company->location }}</p>
                                    </div>
                                    <div class="px-6 py-2">
                                        <a href="{{ route('jobDetail', $job->id) }}" class=" bg-gray-800 text-white px-5 py-2 rounded-full text-sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>        
        </div>

        <!-- populer Applications Tab -->
        <div id="popular-jobs" class="tab-content mt-2 ">

            <div class="flex gap-x-4 overflow-x-auto no-scrollbar snap-mandatory  md:hidden">
                @foreach ($populars as $job)
                    <a href="{{ route('jobDetail', $job->id) }}" class="space-y-4 snap-start block">
                        <div class="bg-white rounded-lg p-4 w-80 h-full scroll-snap-align-start  border w border-borderAbu ">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center space-x-1">
                                    <div class="w-20 h-20 rounded-full flex items-center justify-center text-white font-bold">
                                        <img src="{{ asset('storage/' . $job->company->logo) }}" alt="">
                                    </div>
                                    <div>
                                        <h2 class="font-semibold text-sm mt-1">{{ $job->company->name }}</h2>
                                        <p class=" font-semibold text-xl">{{ $job->title }}</p>
                                        <p class="text-xs text-gray-500 mb-2">{{ $job->company->location }} - 
                                            @foreach ($job->type->take(2) as $type)
                                                {{ $type->title }}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <form action="" method="POST" class="group">
                                    <button class="cursor-pointer border border-borderAbu px-3.5 py-2 group-hover:bg-purple-400 transition duration-150 ease-in-out rounded-full">
                                        <i class="fa-regular fa-bookmark text-lg group-hover:text-white"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <div class="flex justify-between items-center text-xs">
                                <span class="rounded-full text-gray-800 px-2 py-1 ">Rp. {{ number_format($job->salary) }} / month</span>
                                @foreach ($job->category->take(1) as $category)
                                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded">{{ $category->title }}</span>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-500 mt-3 border-b border-gray-300 pb-3">{{ Str::limit($job->description, 100) }}</p>
                            <div class="flex items-center justify-between mt-2  text-xs text-gray-400">
                                <p class="">{{ $job->applicant->count() }} Applicant</p>
                                <p>{{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }} </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class=" md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 hidden">
                <!-- Google Job Listing -->
                @foreach ($populars as $job)    
                    @php
                        $colors = ['bg-blue-100', 'bg-green-100', 'bg-red-100', 'bg-yellow-100', 'bg-purple-100']; // Daftar warna yang diinginkan
                        $randomColor = $colors[array_rand($colors)]; // Pilih warna acak
                    @endphp
                    <div class="h-full">
                        <a href="{{ route('jobDetail', $job->id) }}" class="h-full">
                            <div class="border border-borderAbu rounded-xl p-2 hover:border-primary hover:scale-105 transition duration-300 ease-in-out">
                                <div class="{{ $randomColor }} flex flex-col justify-between rounded-xl p-6 h-67">
                                    <div>
                                        <div class="flex justify-between items-start mb-4">
                                            <div class="flex items-center">
                                                <div class="rounded-full mr-2">
                                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="" class="h-16 w-20 md:h-12 md:w-12 rounded-full">
                                                </div>
                                                <p class="text-sm text-gray-600 bg-white px-3 py-2 font-bold rounded-full">{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</p>
                                            </div>
                                            
                                            <button class="text-gray-600 bg-white px-3 py-2 font-bold rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="font-semibold mt-2">{{ $job->company->name }}</p>
                                        
                                        <div class="flex justify-between mb-5">
                                            <div class="flex items-start">
                                                <h3 class="text-4xl font-semibold">{{ $job->title }}</h3>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    
                                    <div class="flex flex-wrap overflow-x-auto gap-2">
                                        @foreach ($job->category as $category  )
                                        <span class="border border-borderAbu text-sm px-2 py-1 rounded-full">{{ $category->title }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-3">
                                    <div class="= px-6 py-2">
                                        <p class="text-xl font-bold">RP. {{ number_format($job->salary) }} <span class="font-normal text-sm">/ month</span></p>
                                        <p class="text-sm text-gray-600">{{ $job->company->location }}</p>
                                    </div>
                                    <div class="px-6 py-2">
                                        <a href="{{ route('jobDetail', $job->id) }}" class=" bg-gray-800 text-white px-5 py-2 rounded-full text-sm">Details</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- popular company Applications Tab -->
        <div id="popular-company" class="tab-content mt-2 ">
 
        </div>
    </div>
</section>

 

<section class="">
    <div class="container mx-auto mt-12 px-4">
        <p class="font-light text-xl mb-2"  data-aos="fade-right" data-aos-duration="500" data-aos-offset="200">Top Companies</p>
        <div class="flex flex-col lg:flex-row justify-between space-y-6 lg:space-y-0">
            <!-- Left section -->
            <div class="lg:w-1/3">
                <h4 class="text-4xl lg:text-6xl font-poppins font-medium" data-aos="fade-right" data-aos-duration="500" data-aos-offset="200">Best Places to Work 2024</h4>
            </div>
            <!-- Right section -->
            <div class="lg:w-1/3" data-aos="fade-left" data-aos-duration="500" data-aos-offset="300">  
                <p class="text-sm lg:text-base">
                    Leverage the job finder's company review section to gain insights into employee experiences at different companies.
                </p>    
                <div class="md:mt-6 mt-10">
                    <form action="{{ route('jobs') }}" method="GET" class="hidden md:flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <!-- Search Box -->
                        <div class="relative flex-grow w-full sm:w-auto">
                            <input type="text" class="py-3 px-4 w-full bg-transparent border border-gray-400 rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
                            <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-4 top-1/2 transform -translate-y-1/2"></i>
                        </div>
                        <!-- Button -->
                        <div>
                            <button type="submit" class="bg-primary text-white font-medium px-8 py-3 rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600">
                                Get Started
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Grid Section -->
        <div class="flex overflow-x-auto no-scrollbar gap-6 md:mt-10 h-[365px] md:hidden    ">
            <!-- Card 1 -->
            @foreach ($companies as $company)
                <div class="bg-white rounded-3xl border p-6 relative min-w-[300px] h-full">
                    <div class="flex justify-between items-start mb-4">
                        <img src="{{ asset('storage/'. $company->logo) }}" alt="Upwork" class="h-16 w-16">
                        <div class="absolute top-0 right-0 bg-gray-900 rounded-tr-3xl rounded-bl-3xl p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-2 mt-16 ">
                        {{-- <h3 class="text-sm text-gray-500">Upwork</h3> --}}
                        <h2 class="text-3xl font-semibold">{{ $company->name }}</h2>
                        <p class="text-gray-600 text-sm">{{ Str::limit($company->description, 200)  }}</p>
                    </div>
                </div>
            @endforeach

            

        </div>


        <!-- Grid Section -->
        <div class="md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:mt-10 hidden">
            <!-- Card 1 -->
            @foreach ($companies as $company)
                <a href="#" class="bg-white cursor-pointer rounded-3xl border p-6 relative">
                    <div class="flex justify-between items-start mb-4">
                        <img src="{{ asset('storage/'. $company->logo) }}" alt="Upwork" class="h-16 w-16">
                        <div class="absolute top-0 right-0 bg-gray-900 rounded-tr-3xl rounded-bl-3xl p-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="space-y-2 mt-14">
                        {{-- <h3 class="text-sm text-gray-500">Upwork</h3> --}}
                        <h2 class="text-3xl font-semibold">{{ $company->name }}</h2>
                        <p class="text-gray-600 text-sm">{{ Str::limit($company->description, 200) }}</p>
                    </div>
                </a>
            @endforeach
            
        </div>
    </div>
</section>




<section class="mt-12">
    <div class="container">
        <div class="py-6 text-center">
            <h1 class="lg:text-6xl text-4xl font-medium  font-poppins text-gray-800" data-aos="fade-right" data-aos-duration="500" data-aos-offset="200">Why Connect is Right <span class="md:block">for You?</span></h1>
            <div class="mt-6 flex justify-center gap-2 md:gap-4 md:text-base text-sm">
                <button class="bg-yellow-50 py-2 px-4 md:px-6 rounded-full "data-aos="fade-right" data-aos-duration="500" data-aos-offset="240">Make</button>
                <button class="bg-green-50 py-2 px-4 md:px-6 rounded-full "data-aos="fade-right" data-aos-duration="500" data-aos-offset="280">it</button>
                <button class="bg-purple-50 py-2 px-4 md:px-6 rounded-full "data-aos="fade-right" data-aos-duration="500" data-aos-offset="320">easier</button>
                <button class="bg-gray-200 py-2 px-4 md:px-6 rounded-full "data-aos="fade-right" data-aos-duration="500" data-aos-offset="340">with</button>
                <button class="bg-primary py-2 px-4 md:px-6 rounded-t-full rounded-bl-full  text-white"data-aos="fade-right" data-aos-duration="500" data-aos-offset="380">Connect</button>
            </div>
        </div>
        <div class="mx-auto md:mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">01</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Time-Saving Efficiency</h3>
                <p>Stop wasting time scouring multiple job boards and company websites. Our comprehensive search engine aggregates listings from a vast network of sources.</p>
            </div>
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l-9 5 9 5 9-5-9-5z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">02</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Personalized Results</h3>
                <p>Tailor your job hunt to your unique goals. Save your search filters and receive instant alerts whenever new opportunities matching your criteria are posted.</p>
            </div>
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">03</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Uncover Hidden Gems</h3>
                <p>Go beyond basic job boards and access a wider pool of job postings from diverse sources.</p>
            </div>
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l3 3l3 -3m-3 3H12m2 1h.01M17 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">04</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Unmatched Accuracy</h3>
                <p>Our advanced search and filter system allows you to target the exact type of job you're looking for.</p>
            </div>
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">05</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Save Valuable Time</h3>
                <p>No more sifting through irrelevant postings! Find the perfect job faster with precise filtering options.</p>
            </div>
            <div class="p-8 border border-borderAbu rounded-md">
                <div class="flex items-center justify-between mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l-9 5 9 5 9-5-9-5z" />
                    </svg>
                    <h2 class="text-3xl font-light  text-primary">06</h2>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Laser Focus Your Search</h3>
                <p>Explore industries and roles you might not have considered before, broadening your job search horizons.</p>
            </div>
        </div>
    </div>
</section>



<div class="container mx-auto py-6  md:px-10 rounded-tl-[60px] rounded-br-[60px]  md:rounded-[60px] md:bg-yellow-50 relative mt-12 ">
    <div class="grid md:grid-cols-12 ">
        <div class="col-span-5">
            <h1 class="text-xl md:text-2xl font-thin text-gray-800 mb-4">Let's Find Your Dream Job</h1>
            <h2 class="text-4xl md:text-5xl font-poppins font-medium text-gray-900 mb-8">Ready to take your career to the next level?</h2>
            <p class="font-thin">Our job finder website is more than just a search engine. Sign up today <span class="md:block">and unlock a world of possibilities!</span></p>
        </div>  
        <div class=" col-span-7 md:flex flex-col w-full items-end justify-end  relative">
            <div class="hidden md:block">
                <div class="absolute -left-10 top-10">
                    <img src="{{ asset('img/arrowkiri.png') }}" class="w-32 h-32" alt="">
                </div>
                <div class="bg-slate-100 rounded-lg p-4 absolute md:right-18  lg:right-80 -top-6 lg:-top-18 rotate-12 shadow-md">
                    <p class="text-gray-800  mt-2">Google</p>
                    <div class="flex gap-x-6 w-55">
                        <p class="text-gray-600 text-xl w-55 font-bold mt-1">Sr. UI/UX Designer</p>
                        <div class="w-16 h-10 rounded-full bg-red-100 mr-2">
                            <img src="{{ asset('img/google.svg') }}" alt="">
                        </div>
                        
                    </div>
                </div>
                <div class="bg-slate-100 rounded-lg p-4 absolute -right-12 top-32 lg:top-12 -rotate-12 shadow-md">
                
                    <p class="text-gray-800  mt-2">Figma</p>
                    <div class="flex gap-x-6 w-55">
                        <p class="text-gray-600 text-xl w-55 font-bold mt-1">Senior Figma Designer</p>
                        <div class="w-16 h-10 rounded-full bg-gray-200 mr-2">
                            <img src="{{ asset('img/figma.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input flex justify-between mt-6 md:mt-10 rounded-full max-w-2xl mx-auto block md:hidden">
                <form action="{{ route('jobs') }}" method="GET" class="flex w-full items-center">
                    <!-- Search Box -->
                    <div class="flex items-center flex-grow relative md:mr-4">
                        <input type="text" class="py-3 px-4 w-full  bg-transparent border  border-borderAbu rounded-l-full md:rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
                        <!-- Updated search icon -->
                        <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                    </div>
            
                    <!-- Button -->
                    <div>
                        <button type="submit" class="bg-primary border text-white font-medium  px-6 md:px-8 py-3 rounded-r-full  md:rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600 mr-4">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class=" justify-between md:pt-[220px] rounded-full w-full hidden md:flex">
                <form action="{{ route('jobs') }}" method="GET" class="flex ml-4 lg:ml-32 w-full items-center">
                    <!-- Search Box -->
                    <div class="flex  items-center flex-grow relative mr-4">
                        <input type="text" class="py-3 px-4 w-full bg-transparent border bg-white   rounded-full focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
                        <!-- Updated search icon -->
                        <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                    </div>
            
                    <!-- Button -->
                    <div>
                        <button type="submit" class="bg-primary border text-white font-medium  px-8 py-4 rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600 ">
                            Get Started
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<section class="mt-20">
    <div class="container  py-12">
        <div class="flex flex-col md:flex-row justify-between items-start ">
            <!-- Logo dan deskripsi -->
            <div class="w-full md:w-1/3 flex flex-col items-start mb-8 md:mb-0">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="">
                </div>
                <p class="mt-4 text-lg text-gray-600">Great platform for job seekers passionate about startups. Find your dream job easier.</p>
            </div>

            <!-- Menu navigasi -->
            <div class="w-full md:w-1/3 mb-4 md:mb-0 grid grid-cols-2 md:flex md:flex-wrap lg:grid-cols-4 gap-6 text-center">
                <div>
                    <h4 class="font-semibold mb-3">Find a Job</h4>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Companies</h4>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Why Us?</h4>
                </div>
                <div>
                    <h4 class="font-semibold mb-3">Contact</h4>
                </div>
            </div>

            <!-- Logo sosial media di pojok kanan -->
            <div class="w-full md:w-1/3 flex justify-center md:justify-end space-x-4">
                <a>
                    <img src="{{ asset('img/facebook.png') }}" class="w-10 h-10 grayscale hover:grayscale-0 cursor-pointer" alt="">
                </a>
                <a>
                    <img src="{{ asset('img/twitter.png') }}" class="w-10 h-10 grayscale hover:grayscale-0 cursor-pointer" alt="">
                </a>
                <a>
                    <img src="{{ asset('img/linkedin.png') }}" class="w-10 h-10 grayscale hover:grayscale-0 cursor-pointer" alt="">
                </a>
                <a>
                    <img src="{{ asset('img/github.png') }}" class="w-10 h-10 grayscale hover:grayscale-0 cursor-pointer" alt="">
                </a>
            </div>
        </div>

        <!-- Footer copyright -->
        <div class="md:flex justify-between items-center">
            <p class="text-center mt-8 text-gray-500">© 2024 Habibi. All rights reserved.</p>
            <div class="flex justify-center items-center gap-x-4">
                <p class="text-center mt-8 text-gray-500">Terms of Services</p>
                <p class="text-center mt-8 text-gray-500">Privacy Policy</p>
                <p class="text-center mt-8 text-gray-500">Partners</p>
            </div>
        </div>
    </div>
</section>















<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active class from all tabs and tab contents
                tabLinks.forEach(link => link.classList.remove('bg-primary', 'text-white'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to the clicked tab and corresponding content
                const target = document.querySelector(this.getAttribute('href'));
                this.classList.add('bg-primary', 'text-white');
                target.classList.add('active');
            });
        });

    
    });
</script>

@endsection