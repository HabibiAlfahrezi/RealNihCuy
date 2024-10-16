
<section>
    <div class="container mx-auto p-4 items-center">
        <div class="grid grid-cols-12 mt-2  items-center  ">
            <div class="w-full md:col-span-7 -mt-10 ">
                <h4 class="font-montserrat font-[650] text-8xl tracking-tight">Your Dream Careers Starts
                    <span class="  flex items-center w-[560px]">
                        Here
                        <span class="text-sm font-medium text-gray-400 tracking-normal leading-[24px] mt-1 ml-6">
                            Job Hunting Made Easy: Get instant alerts for jobs matching your skills and innovative job finder.
                        </span>
                    </span>
                </h4>

                <div class="input flex justify-between mt-10 rounded-full">
                    <form action="{{ route('jobs') }}" method="GET" class="flex w-full items-center">
                        <!-- Search Box -->
                        <div class="flex items-center flex-grow relative mr-4">
                            <input type="text" class="py-3 px-4 w-full  bg-transparent border  border-gray-400 rounded-full focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500" name="keywords" placeholder="Search for a Job">
                            <!-- Updated search icon -->
                            <i class="fa-solid fa-magnifying-glass text-gray-500 absolute right-0 text-xl mr-4"></i>
                        </div>
                
                        <!-- Button -->
                        <div>
                            <button type="submit" class="bg-purple-500 border text-white font-medium  px-8 py-4 rounded-full transition-colors duration-300 ease-in-out hover:bg-purple-600 mr-4">
                                Get Started
                            </button>
                        </div>
                    </form>
                </div>

                <div class=" relative flex justify-center items-center bg-white shadow-md rounded-xl px-4 py-2 space-x-2 max-w-xs mx-auto mt-15">
                    <!-- Garis Lengkung Kiri (Arrow Kiri) -->
                    <div class="absolute -left-50 -top-14">
                        <img src="{{ asset('img/arrowkiri.png') }}" class="w-36 h-26" alt="">
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
                        <span class="font-bold text-purple-500">60k+ </span>
                        <span class="font-semibold">Talents Found Their Dream Job!</span>
                    </div>
                
                    <!-- Garis Lengkung Kanan (Arrow Kanan) -->
                    <div class="absolute -right-40 top-6">
                        <img src="{{ asset('img/arrowkanan.png') }}" class="w-26 h-26" alt="">
                    </div>
                </div>

            </div>
            <div class="w-full md:col-span-5 ">
                <img src="{{ asset('img/bg-hero.jpg') }}" class="w-full " alt="">

                <div class="grid md:grid-cols-2 gap-6 pl-28 mt-8">
                    <!-- Job Section -->
                    <div class="flex flex-col items-center justify-center bg-blue-100 text-black rounded-tr-[80px] rounded-bl-[80px] p-6  transition duration-300 ease-in-out h-50 w-full">
                        <i class="fa-solid fa-briefcase text-blue-600  text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold mb-2">Jobs</h4>
                        <p class="text-3xl font-bold">{{ $jobs->count() }}</p>
                    </div>
                
                    <!-- Company Section -->
                    <div class="flex flex-col items-center justify-center bg-purple-100 text-black rounded-t-[80px] rounded-br-[80px]  p-6 transition duration-300 ease-in-out h-50 w-full">
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