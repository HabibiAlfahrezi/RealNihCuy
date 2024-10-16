<div class="container mx-auto py-8 px-10 rounded-[60px] bg-yellow-50 relative mt-20">
    <div class="grid grid-cols-12 ">
        <div class="col-span-5">
            <h1 class="text-2xl font-thin text-gray-800 mb-4">Let's Find Your Dream Job</h1>
            <h2 class="text-5xl font-poppins font-[500] text-gray-900 mb-8">Ready to take<br>your career to<br>the next level?</h2>
            <p class="font-thin">Our job finder website is more than just a search engine. Sign up today <br>and unlock a world of possibilities!</p>
        </div>  
        <div class=" col-span-7 flex flex-col w-full items-end justify-end  ">
            <div class="">
                <div class="bg-slate-100 rounded-lg p-4 absolute right-80 -top-8 rotate-12 shadow-md">
                    <p class="text-gray-800  mt-2">Google</p>
                    <div class="flex gap-x-6 w-55">
                        <p class="text-gray-600 text-xl w-55 font-bold mt-1">Sr. UI/UX Designer</p>
                        <div class="w-16 h-10 rounded-full bg-red-500 mr-2"></div>
                    </div>
                </div>
                <div class="bg-slate-100 rounded-lg p-4 absolute -right-12 top-20 -rotate-12 shadow-md">
                
                    <p class="text-gray-800  mt-2">Notion</p>
                    <div class="flex gap-x-6 w-55">
                        <p class="text-gray-600 text-xl w-55 font-bold mt-1">Senior Motion Designer</p>
                        <div class="w-16 h-10 rounded-full bg-gray-800 mr-2"></div>
                    </div>
                </div>
            </div>
    
            <div class="flex justify-between pt-[220px] rounded-full w-full ">
                <form action="{{ route('jobs') }}" method="GET" class="flex ml-32 w-full items-center">
                    <!-- Search Box -->
                    <div class="flex  items-center flex-grow relative mr-4">
                        <input type="text" class="py-3 px-4 w-full bg-transparent border bg-white   rounded-full focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500" name="keywords" placeholder="Search for a Job">
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
        </div>
    </div>
</div>