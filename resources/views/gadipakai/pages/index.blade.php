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
@include('dashboard.components.partials.alert')
<section>
    <div class="container md:h-[680px] flex flex-col md:flex-row items-center py-8 ">
        <div class="w-full md:w-2/3 md:text-left ">
            <h1 class="text-5xl md:text-5xl lg:text-7xl font-poppins font-bold">Discover <span class="block mt-2">more than</span><span class="block text-primary mt-1 mb-4">5000+ Jobs</span></h1>
            <img src="{{ asset('image/element/garis.png') }}" class="mb-10 mx-auto md:mx-0" alt="Garis">
            <p class="text-lg md:text-sm xl:text-md text-grey w-full">Great platform for the job seeker that searching for <span class="md:block">new career heights and passionate about startups.</span></p>
            <div class="input flex flex-col md:flex-row bg-white mt-10 justify-between ">
                <form action="{{ route('jobs') }}" method="GET" class="flex flex-wrap">
                    <div class="search flex items-center mb-4 md:mb-0 md:mr-2 flex-grow">
                        <i class="fa-solid fa-magnifying-glass text-xl mx-2"></i>
                        <input type="text" class="py-3 px-2 border-b border-border w-full md:w-auto" name="keywords" placeholder="Job Title or Keyword">
                    </div>
                    <div class="location flex items-center mb-4 md:mb-0 md:mr-2 flex-grow">
                        <i class="fa-solid fa-location-dot text-2xl mx-2"></i>
                        <input type="text" class="py-3 px-2 border-b border-border w-full md:w-auto" name="location" placeholder="Location">
                    </div>
                    <div class="flex-grow md:flex-grow-0 w-full md:w-auto">
                        <button type="submit" class="font-semibold text-lg px-8 py-3 bg-primary w-full md:w-auto text-white block md:inline-block text-center">Search My Job</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full md:w-1/3 hidden  md:flex justify-center mt-10 md:mt-0">
            <div class="relative">
                <img src="{{ asset('image/element/bg-hero.svg') }}" alt="Background Hero" class="absolute top-0 left-0 w-full h-full object-cover">
                <img src="{{ asset('image/gambar/hero.svg') }}" alt="Hero Image" class="relative z-10 w-full h-auto">
            </div>
        </div>
    </div>
</section>
@include('home.hero')

@include('home.stat')
{{-- <section class="pt-4 md:pb-14">
    <div class="container mx-auto p-4">
        <p class="text-2xl md:text-base text-center text-grey font-bold mb-12">Companies We Helped Grow</p>
        <div class="w-full">
            <div class="flex flex-wrap gap-6 md:gap-x-20  justify-center items-center">
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/logo/vodafone.png') }}" alt="Vodafone" class="h-12 w-28 md:w-32 object-contain">
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/logo/talkit.png') }}" alt="Talkit" class="h-12 w-28 md:w-32 object-contain">
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/logo/tesla.png') }}" alt="Tesla" class="h-12 w-28 md:w-32 object-contain">
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/logo/intel.png') }}" alt="Intel" class="h-12 w-28 md:w-32 object-contain">
                </div>
                <div class="flex-shrink-0">
                    <img src="{{ asset('image/logo/amd.png') }}" alt="AMD" class="h-12 w-28 md:w-32 object-contain">
                </div>
            </div>
        </div>
    </div>
</section> --}}




<section class="pt-10 pb-10">
    <div class="container mx-auto">
        <div class="flex flex-wrap  md:flex-nowrap items-center">
            <!-- Bagian Teks -->
            <div class="md:w-1/2 mb-6 md:mb-0 mr-6">
                <h2 class="text-5xl font-medium font-poppins text-gray-900">Let's help you choose the category you want</h2>
                <p class="text-gray-600 text-lg mt-6">But I must explain to you how all this mistaken idea of pleasure and praising pain was born and I will teach you.</p>
            </div>

            <!-- Kategori -->
    
            <div class="md:w-1/2 w-full grid sm:grid-cols-2 max-w-7xl mx-auto px-4  gap-6">
                @if ($categories->count() > 0)
                    @foreach ($categories->take(2) as $category)
                        @php
                            $colors = ['bg-blue-500', 'bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-purple-500']; // Daftar warna yang diinginkan
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

        <!-- Kategori Lainnya -->
        <div class="max-w-7xl mx-auto px-4 mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
                @foreach ($categories->slice(2, 4) as $category)
                    @php
                        $colors = ['bg-blue-500', 'bg-green-500', 'bg-red-500', 'bg-yellow-500', 'bg-purple-500']; // Daftar warna yang diinginkan
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





{{-- <section class="mb-20">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center justify-center lg:justify-between">
            <!-- Bagian Gambar -->
            <div class="hidden md:w-1/2 md:flex justify-center mb-10 lg:mb-0">
                <img src="{{ asset('img/laptopw.png') }}" class="w-full max-w-sm lg:max-w-lg" alt="">
            </div>
 
            <!-- Bagian Teks -->
            <div class="w-full md:w-1/2 ">
                <h4 class="text-2xl text-primary font-semibold mt-5 mb-5">Create Profile</h4>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-semibold">Build Your Personal 
                    <span class="block">Account Profile</span>
                </h2>
                <p class="mt-5 mb-10 text-lg">Create an account for the job information you want, get daily notifications and you can easily apply directly to the company you want and create an account now for free.</p>
                <a href="" class="inline-block py-4 px-6 bg-primary font-semibold text-white rounded-2xl">Create Account</a>
            </div>
        </div>
    </div>
 </section> --}}
 

@include('home.job')

 {{-- <section>
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-3xl mb-5 md:mb-0 md:text-4xl font-semibold font-poppins">Featured <span class="text-primary">Jobs</span></h4>
            <a href="{{ route('jobs') }}" class="font-semibold text-primary hidden md:block">Show All Jobs <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        
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
                            <div class="{{ $randomColor }} flex flex-col justify-between rounded-xl p-6 h-73">
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
                                            <h3 class="text-4xl font-semibold">{{ $job->title }} Aku adalah</h3>
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
</section> --}}

@include('home.best')
{{-- 
<section class="my-20 font-poppins">
    <div class="container overflow-hidden text-white rounded-br-3xl rounded-tl-3xl h-[500px] md:h-[300px] lg:h-[500px] xl:h-[414px] grid md:grid-cols-2 md:px-20 justify-center md:items-center bg-cover bg-no-repeat bg-center" style="background-image: url('../image/element/bg-start.svg');">
        <div class="text-center md:text-left mt-14 md:mt-0 text-white">
            <h1 class="text-4xl lg:text-7xl font-semibold mb-2">Start Posting <span class="lg:block mt-2">jobs <span class="block lg:inline">today</span></span></h1>
            <p class="text-lg md:text-xl mb-6">Start posting jobs for only $10</p>
            @if (Auth::check())
                @if (Auth::user()->prosesi == 'company')
                    <a href="{{ route('dashboard.company.create') }}" class="w-full md:w-[200px] px-5 py-3 bg-white text-primary font-semibold">Post a Job</a>
                @else
                    <a href="{{ route('jobs') }}" class="w-full md:w-[200px] px-5 py-3 bg-white text-primary font-semibold">Lah lu user bang</a>    
                @endif
            @else
                <a href="{{ route('register') }}" class="w-full md:w-[200px] px-5 py-3 bg-white text-primary font-semibold">Sign Up For Free</a>
            @endif
         
        </div>
        <div class="w-full flex justify-center md:justify-end  lg:mt-20  overflow-hidden">
            <img src="{{ asset('image/gambar/dashboard.png') }}" alt="" class="relative h-[200px] sm:w-[400px] sm:h-[200px] md:w-[120%] lg:w-[130%] xl:w-[700px] xl:h-[334px]">
        </div>
    </div>
</section> --}}

@include('home.comment')

<section class="my-20 ">
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-3xl mb-5 md:mb-0 md:text-4xl font-semibold font-poppins">Popular <span class="text-primary">Jobs</span></h4>
            <a href="{{ route('jobs') }}" class="font-semibold text-primary hidden md:block">Show All Jobs <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @if ($populars)
                @foreach ($populars as $job)
                    <a href="{{ route('jobDetail', $job->id) }}" class="bg-white rounded-lg shadow-sm hover:shadow-lg transition duratiun-300 ease-in-out p-4 border border-borderAbu">
                        <div class="flex items-start mb-2">
                            <div class="w-16 h-16 mr-3 flex-shrink-0">
                                @if ($job->company->logo)
                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="Company Logo" class="w-full h-full object-contain">
                                @else
                                    <div class="w-full h-full  bg-gray-200 flex items-center justify-center">
                                        <span class="text-xs font-bold">{{ substr($job->company->name, 0, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h2 class="text-lg font-bold mt-1">{{ $job->title }}</h2>
                                <p class="text-sm font-semibold text-gray-600">{{ $job->company->name }} •</p>
                                <div class="flex w-full justify-between  text-center gap-4 mb-4 mt-3">
                                    <div class="text-start">
                                        <p class="text-sm text-grey">Experience</p>
                                        <p class="text-base font-bold text-start">{{ Str::limit($job->experience, 10) }}</p>
                                    </div>
                                    <div class="text-start">
                                        <p class="text-sm text-grey">Job Type</p>
                                        <p class="text-base font-bold">{{ $job->type->first()->title ?? 'N/A' }}</p>
                                    </div>
                                    <div class="text-start md:block hidden">
                                        <p class="text-sm text-grey">Salary</p>
                                        <p class="text-base font-bold">RP. {{ number_format($job->salary) ?? 'N/A' }} / month</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($job->category as $category)
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">{{ $category->title }}</span>
                            @endforeach
                        </div> --}}
                        <div class="flex justify-between text-xs text-gray-500">
                            <div class="flex items-center gap-x-4">
                                <p>Posted {{ $job->created_at->diffForHumans() }}</p>
                                <p>•</p>
                                <p>{{ $job->applicant_count }} Applicant</p>
                            </div>
                            <button class="text-blue-600">Save Job</button>
                        </div>
                    </a>
                @endforeach
            @else
                <p>No jobs found</p>
            @endif
        </div>
    </div>
</section>


<section class="my-20 ">
    <div class="container">
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-3xl mb-5 md:mb-0 md:text-4xl font-semibold font-poppins">Latest <span class="text-primary">Jobs</span></h4>
            <a href="{{ route('jobs') }}" class="font-semibold text-primary hidden md:block">Show All Jobs <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @if ($latests)
                @foreach ($latests as $job)
                    <a href="{{ route('jobDetail', $job->id) }}" class="bg-white rounded-lg shadow-sm hover:shadow-lg transition duratiun-300 ease-in-out p-4 border border-borderAbu">
                        <div class="flex items-start mb-2 ">
                            <div class="w-16 h-16 mr-3 flex-shrink-0 ">
                                @if ($job->company->logo)
                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="Company Logo" class="w-full h-full object-contain">
                                @else
                                    <div class="w-full h-full  bg-gray-200 flex items-center justify-center">
                                        <span class="text-xs font-bold">{{ substr($job->company->name, 0, 2) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class=" w-full">
                                <h2 class="text-lg font-bold mt-1">{{ $job->title }}</h2>
                                <p class="text-sm font-semibold text-gray-600">{{ $job->company->name }} •</p>
                                <div class="flex w-full justify-between   text-center gap-4 mb-4 mt-3">
                                    <div class="text-start  ">
                                        <p class="text-sm text-grey">Experience</p>
                                        <p class="text-base font-bold text-start">{{ Str::limit($job->experience, 10) }}</p>
                                    </div>
                                    <div class="text-start  ">
                                        <p class="text-sm text-grey">Job Type</p>
                                        <p class="text-base font-bold">{{ $job->type->first()->title ?? 'N/A' }}</p>
                                    </div>
                                    <div class="text-start md:block hidden">
                                        <p class="text-sm text-grey">Salary</p>
                                        <p class="text-base font-bold">RP. {{ number_format($job->salary) ?? 'N/A' }} / month</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                        <div class="flex justify-between text-xs text-gray-500">
                            <div>
                                <p>Posted {{ $job->created_at->diffForHumans() }}</p>
                      
                            </div>
                            <button class="text-blue-600">Save Job</button>
                        </div>
                    </a>
                @endforeach
            @else
                <p>No jobs found</p>
            @endif
        </div>
    </div>
</section>

{{-- <section class="py-8 rounded-[40px] bg-cover bg-center container mx-auto" style="background-image: url('{{ asset('img/Subcribe.png') }}');">
    <div class="px-4">
        <div class="flex flex-col lg:flex-row items-center justify-center lg:justify-between  lg:p-20 space-y-8 lg:space-y-0">
            <!-- Teks di sebelah kiri -->
            <div class="w-full lg:w-1/2 text-white text-4xl md:text-4xl lg:text-5xl font-semibold text-center lg:text-left">
                Never Want to Miss <span class="block">Any Job News?</span>
            </div>
            <!-- Input dan tombol di sebelah kanan -->
            <div class="w-full lg:w-1/2">
                <div class="relative flex justify-center lg:justify-end">
                    <input type="text" class="w-full lg:w-3/4 border border-gray-300 rounded-full px-7 py-5 pr-20" placeholder="Enter your email">
                    <button class="absolute top-1/2 -translate-y-1/2 right-6 lg:right-12 px-5 py-3 bg-primary text-white text-sm rounded-full focus:outline-none">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</section> --}}







<section class="bg-footer mt-20">
    <div class="container text-white border-b border-white py-20">
        <div class="flex flex-wrap justify-between space-y-8 md:space-y-0">
            <div class="w-full md:w-1/3 flex flex-col items-start">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="">
                </div>
                
                <p class="mt-4 text-lg">Great platform for job seekers passionate about startups. Find your dream job easier.</p>
            </div>

            <div class="w-full md:w-[150px] space-y-2 md:ml-auto md:mr-4">
                <h4 class="font-bold mb-3">About</h4>
                <p>Companies</p>
                <p>Pricing</p>
                <p>Terms</p>
                <p>Advice</p>
                <p>Privacy Policy</p>
            </div>

            <div class="w-full md:w-[150px] space-y-2">
                <h4 class="font-bold mb-3">Resources</h4>
                <p>Help Docs</p>
                <p>Guide</p>
                <p>Updates</p>
                <p>Contact Us</p>
            </div>

            <div class="w-full md:w-1/3 space-y-2">
                <h4 class="font-bold mb-3">Get Job Notification</h4>
                <p class="text-lg">The latest job news and articles, sent to your inbox weekly.</p>
            </div>
        </div>
    </div>

    <p class="container text-gray-500 mt-8 ">2024 © Habibi. All rights reserved.</p>
</section>














<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active class from all tabs and tab contents
                tabLinks.forEach(link => link.classList.remove('bg-purple-500', 'text-white'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to the clicked tab and corresponding content
                const target = document.querySelector(this.getAttribute('href'));
                this.classList.add('bg-purple-500', 'text-white');
                target.classList.add('active');
            });
        });

        // Activate default tab
        document.querySelector('.tab-link[href="#all"]').click();
    });
</script>

@endsection