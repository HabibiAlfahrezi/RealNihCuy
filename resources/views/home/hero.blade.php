<!-- Hero Section Container -->
<div class=" py-7 min-h-screen mt-10 md:mt-0  md:px-16 ">

    <!-- Main Content -->
    <div class="container mx-auto md:flex mt-12 md:mt-28 relative ">
        <!-- Left Content -->
        <div class="md:w-1/2">
            <h4 class="font-montserrat text-[#1c2434] font-semibold  text-4xl lg:text-6xl xl:text-7xl ">Find Your Jobs and Shape Your Future
            </h4>
            
            <div class="input flex justify-between mt-5 md:mt-8 rounded-full z-20 relative">
                <form action="{{ route('jobs') }}" method="GET" class="md:flex w-full items-center">
                    <!-- Search Box -->
                    <div class="flex items-center flex-grow relative md:mr-4">
                        <input type="text" class="py-2 md:py-3 px-4 w-full  bg-white border  border-gray-400 rounded-xl md:rounded-2xl focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" name="keywords" placeholder="Search for a Job">
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
                        <button type="submit" class="block  w-full bg-primary border text-white font-medium md:px-4 lg:px-8 py-3 md:py-4 rounded-xl  transition-colors duration-300 ease-in-out hover:bg-secondary outline-none lg:mr-2">
                            Find Jobs
                        </button>
                    </div>
                </form>
            </div>

            <!-- Popular Skills -->
            <div class="mb-8  hidden   md:flex items-center gap-2">
                <span class="">Popular skills:</span>
                <div class="flex  gap-3 mt-2">
                    <span class="px-3 py-1 bg-secondary text-white font-semibold rounded-lg capitalize text-sm">web design</span>
                    <span class="px-3 py-1 bg-secondary text-white font-semibold rounded-lg capitalize text-sm">ui/ux design</span>
                    <span class="px-3 py-1 bg-secondary text-white font-semibold rounded-lg capitalize text-sm">databases</span>
                    <span class="px-3 py-1 bg-secondary text-white font-semibold rounded-lg capitalize text-sm">business cards</span>
                </div>
            </div>

            <p class=" my-4 z-20 relative">
                We're on a mission to make remote job finding fun, exciting, and hassle-free. Say goodbye to sifting through endless job listings and hello to a personalized job search experience.
            </p>

            <!-- Trusted Freelancers Section -->
            <div class="bg-white p-6 rounded-2xl w-full md:w-auto inline-block shadow-md">
                <div class="flex items-center justify-between">
                    <span class="font-bold">Trusted Freelancers</span>
                    <div class="flex text-yellow-400">
                        ★★★★★
                    </div>
                </div>
                <div class="md:flex items-center gap-4 mt-2">
                    <div class="flex -space-x-4">
                        <div class="w-10 h-10 ">
                            <img src="{{ asset('img/avatar.jpg') }}" class="rounded-full" alt="">
                        </div>
                        <div class="w-10 h-10 ">
                            <img src="{{ asset('img/download (3).jpg') }}" class="rounded-full" alt="">
                        </div>
                        <div class="w-10 h-10 ">
                            <img src="{{ asset('img/download (5).jpg') }}" class="rounded-full" alt="">
                        </div>
                        <div class="w-10 h-10 ">
                            <img src="{{ asset('img/download.jpg') }}" class="rounded-full" alt="">
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <p class="font-bold">
                            200+ 
                        </p>
                        <p class="">Satisfied Customers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="hidden md:block absolute right-0 z-10  -mt-24">
            <img src="{{ asset('/img/heroPng.png') }}" alt="Freelancer working" class="w-full h-auto sm:h-[600px] md:h-[800px] object-cover">

            
            <!-- Floating Card -->
            <div class="absolute bottom-24 right-12 bg-white p-6 rounded-2xl shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-gray-200 ">
                        <img src="{{ asset('img/download (5).jpg') }}" class="rounded-full" alt="">
                    </div>
                    <div>
                        <p class="font-bold">@jenny</p>
                        <p class="">UI/UX Designer</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 bg-gray-100 ">
                            <img src="{{ asset('img/project.png') }}" alt="">
                        </div>
                        <span class="-mt-1">80+ projects completed</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 bg-gray-100 ">
                            <img src="{{ asset('img/income.png') }}" alt="">
                        </div>
                        <span class="-mt-1">$30 per hour</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>