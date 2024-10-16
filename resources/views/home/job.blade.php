<section>
    <div class="container mt-12">
        <div class="text-center">
            <p class="font-light text-xl mb-2">Your Dream Jobs</p>
            <h4 class="font-poppins font-light text-6xl">Explore and Find <br> your Job Here</h4>
        </div>
        <div class="input flex justify-between mt-10 rounded-full max-w-2xl mx-auto">
            <form action="{{ route('jobs') }}" method="GET" class="flex w-full items-center">
                <!-- Search Box -->
                <div class="flex items-center flex-grow relative mr-4">
                    <input type="text" class="py-3 px-4 w-full  bg-transparent border  border-borderAbu rounded-full focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500" name="keywords" placeholder="Search for a Job">
                    <!-- Updated search icon -->
                    <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                </div>
        
                <!-- Button -->
                <div>
                    <button type="submit" class="bg-purple-500 border text-white font-medium  px-8 py-4 rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600 mr-4">
                        Search
                    </button>
                </div>
            </form>
        </div>


        @guest  
            <div class="flex items-center justify-center gap-x-4 mt-10">
                <i class="fa-solid fa-bolt-lightning text-purple-500"></i>
                <a href="{{ route('dashboard.userprofile') }}" class="font-poppins text-purple-500 text-xl">Upload your resume - let's employers find you</a>
            </div>
        @endguest
        @auth    
            @if (Auth::user()->prosesi === 'company')

            @else
                <div class="flex items-center justify-center gap-x-4 mt-10">
                    <i class="fa-solid fa-bolt-lightning text-purple-500"></i>
                    <a href="{{ route('dashboard.userprofile') }}" class="font-poppins text-purple-500 text-xl">Upload your resume - let's employers find you</a>
                </div>
            @endif
        @endauth

        <div class="overflow-x-auto my-8">
            <div class="flex gap-x-4 justify-center">
                <div class="">
                    <a href="#featured" class="tab-link bg-purple-500 rounded-full inline-block px-8 py-4 text-white hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out ">
                        Featured Jobs
                    </a>
                </div>
                <div class="">
                    <a href="#latest" class="tab-link  rounded-full inline-block px-8 py-4 text-gray-600 hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out">
                        Latest Jobs
                        
                    </a>
                </div>
                <div class="">
                    <a href="#popular-jobs" class="tab-link  rounded-full inline-block px-8 py-4 text-gray-600 hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out">
                        Populer Jobs
                    </a>
                </div>
                <div class="">
                    <a href="#popular-company" class="tab-link  rounded-full inline-block px-8 py-4 text-gray-600 hover:bg-purple-500 hover:text-white transition duration-300 ease-in-out">
                        Popular Company
                    </a>
                </div>
            </div>
        </div>

        <!-- featured Applications Tab -->
        <div id="featured" class="tab-content active mt-2 ">
            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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

            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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

            <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
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