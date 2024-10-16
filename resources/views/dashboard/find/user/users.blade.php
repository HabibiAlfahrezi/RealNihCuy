@extends('dashboard.layouts.base')
@section('content')
    
<section class="bg-gray-50 ">
    <div class="container mx-auto py-8 text-center">
        <div class="w-full">
            {{-- <h1 class="text-4xl md:text-5xl lg:text-7xl font-poppins font-bold">
                Find Your 
                <span class="block text-secondary mt-1 mb-4">Dream Job</span>
            </h1>
            <img src="{{ asset('image/element/garis.png') }}" class="mb-8 mx-auto" alt="Garis">
            <p class="text-lg md:text-sm xl:text-md text-grey w-full">
                Find your next career at companies like HubSpot, Nike, and Dropbox
            </p> --}}
            <form action="" name="searchForm" id="searchForm" class="input flex flex-col md:flex-row bg-transparent justify-between items-center w-full mx-auto p-4 border border-borderAbu rounded-lg">
                <div class="flex w-full flex-wrap md:flex-row md:justify-between items-center gap-4">
                    <div class="flex flex-wrap w-full lg:w-auto items-center gap-4">
                        <div class="search flex items-center w-full lg:w-auto">
                            <i class="fa-solid fa-search text-lg mx-2 text-gray-400"></i>
                            <input type="text" 
                                class="py-2 px-3 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-full lg:w-64" 
                                id="keywords" 
                                name="keywords" 
                                value="{{ request('keywords') }}" 
                                placeholder="Job Title or Keyword">
                        </div>
                        <div class="location flex items-center w-full lg:w-auto">
                            <i class="fa-solid fa-map-marker-alt text-xl mx-2 text-gray-400"></i>
                            <input type="text" 
                                class="py-2 px-3 ml-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-full lg:w-64" 
                                id="location" 
                                name="location" 
                                value="{{ request('location') }}" 
                                placeholder="Location">
                        </div>
                    </div>
                    <div class="w-full md:w-auto items-end">
                        <button type="submit" class="font-semibold text-sm px-4 py-2 bg-primary text-white rounded-md w-full md:w-auto hover:bg-primary-dark transition duration-200">Search</button>
                    </div>
                </div>
                
            </form>
            {{-- <p class="font-light mt-4 text-start text-gray-600">Popular: 
                <span class="font-medium block md:inline-block text-gray-800"> 
                    UI Designer, UX Researcher, Android, Admin
                </span>
            </p> --}}
        </div>
    </div>
</section>


<section>
    <div class="container mx-auto px-3 ">
        <div class=" gap-6 grid grid-cols-1 md:grid-cols-2">
            @foreach ($users as $user)
                <a href="{{ route('dashboard.user.detail', $user->user->id) }}" class="block bg-white rounded-xl w-full mx-auto p-4 border border-gray-300 shadow-sm hover:shadow-lg transition-shadow duration-200 ease-in-out">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-start">
                            <div class="mr-4">
                                {{-- Gambar profil pengguna dengan pengecekan jika tersedia --}}
                                <img src="{{ asset('storage/' . ($user->image ?? 'default-image.png')) }}" alt="User Profile Image" class="w-14 h-14 rounded-md object-cover">
                            </div>
                            <div>
                                {{-- Nama Pengguna --}}
                                <h2 class="text-lg font-bold text-gray-900">{{ $user->name }}</h2>
                                <div class="flex items-center md:hidden">
                                    <p class="text-gray-500 text-sm pr-3 py-1">{{ $user->address }}</p>
                                    <p class="text-gray-500 text-sm px-3 py-1">{{ $user->work_type }}</p>
                                </div>
                                <div class=" flex-wrap gap-2 mb-2 hidden md:flex">
                                    {{-- Menampilkan skill pengguna --}}
                                    @foreach ($user->userSkill as $skill)
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-md text-sm">{{ $skill->title }}</span>
                                    @endforeach
                                    {{-- Menampilkan alamat pengguna --}}
                                    <p class="text-gray-500 text-sm px-3 py-1 hidden md:block">{{ $user->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden mb-2 md:mb-0">
                        @foreach ($user->userSkill as $skill)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1  rounded-md text-sm">{{ $skill->title }}</span>
                        @endforeach
                    </div>
                    {{-- Deskripsi singkat pengguna --}}
                    <p class="text-gray-500 text-sm">
                        {{ Str::limit($user->description, 100) }}
                    </p>
                </a>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script>
$("#searchForm").submit(function(e){
    e.preventDefault();

    var url = '{{ route("dashboard.find.user") }}';
    var params = [];
    var keyword = $("#keywords").val();

    var location = $("#location").val();

    if (keyword) params.push('keywords=' + encodeURIComponent(keyword));
    if (location) params.push('location=' + encodeURIComponent(location));



    if (params.length > 0) {
        url += '?' + params.join('&');
    }

    window.location.href = url;
});

$("#sort").change(function(){
    $("#searchForm").submit();
});
</script>
@endsection