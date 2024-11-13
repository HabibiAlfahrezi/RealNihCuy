@extends('dashboard.layouts.base')
@section('content')
@include('dashboard.components.partials.alert')
<section class="">
    <div class="container px-4">
        <div class="flex flex-col bg-white">
            <!-- Tab Navigation -->
            {{-- <div class="flex border-b border-gray-300 md:mb-4">
                <button id="profile-tab" class="py-2 pr-4 text-textSecondary border-b-2 border-transparent hover:border-blue-500 focus:outline-none transition-colors">
                    Profile
                </button>
                <button id="login-tab" class="py-2 px-4 text-textSecondary border-b-2 border-transparent hover:border-blue-500 focus:outline-none transition-colors">
                    Login Details
                </button>
            </div> --}}
            <!-- Tab Content -->
            <div id="tab-content" class=" ">
                <!-- Profile Content -->
                <form action="{{ route('company.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="profile-content" class=" md:py-6 md:-mt-10 flex flex-col gap-y-4">
                        <div class="md:border-b border-gray-300 md:py-6 mt-4">
                            <h4 class="text-lg font-semibold">Basic Information</h4>
                            <p class="text-textSecondary">This is your personal information that you can update anytime.</p>
                        </div>
                        <div class="w-full grid grid-cols-6 md:py-10 border-b border-gray-200">
                            <div class="grid md:grid-cols-3 mb-1 col-span-6 md:col-span-2">
                                <div class="col-span-2">
                                    <h4 class="font-semibold text-lg">Company Logo</h4>
                                    <p class="text-textSecondary">This image will be shown publicly as company logo.</p>
                                </div>
                            </div>
                            <div class="col-span-6 md:col-span-3 ">
                                <div
                                class=" dark:border-strokedark dark:bg-boxdark"
                                >
                                    <div class="md:px-5">
                                        <div class=" mb-2 md:mb-4 flex items-center gap-3">
                                            <div class="h-14 w-14 rounded-full">
                                                @if (Auth::user()->company->logo)
                                                    
                                                <img src="{{ asset('storage/' . Auth::user()->company->logo) }}" alt="User" />  
                                                @else
                                                <img src="{{ asset('images/user/user-03.png') }}" alt="User" />
                                                @endif
                                            </div>
                                            <div>
                                            <span
                                                class="md:mb-1.5 font-medium text-black dark:text-white"
                                                >Edit your photo</span
                                            >
                                            </div>
                                        </div>
                
                                        <div
                                            id="FileUpload"
                                            class="relative md:mb-5.5 block w-full cursor-pointer appearance-none rounded border border-dashed border-primary bg-gray px-4 py-4 dark:bg-meta-4 sm:py-7.5"
                                        >
                                            <input
                                            type="file"
                                            accept="image/*"
                                            name="logo"
                                            class="absolute inset-0 z-50 m-0 h-full w-full cursor-pointer p-0 opacity-0 outline-none"
                                            />
                                            
                                            <div
                                            class="flex flex-col items-center justify-center space-y-3"
                                            >
                                            <span
                                                class="flex h-10 w-10 items-center justify-center rounded-full border border-stroke bg-white dark:border-strokedark dark:bg-boxdark"
                                            >
                                                <svg
                                                width="16"
                                                height="16"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                >
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M1.99967 9.33337C2.36786 9.33337 2.66634 9.63185 2.66634 10V12.6667C2.66634 12.8435 2.73658 13.0131 2.8616 13.1381C2.98663 13.2631 3.1562 13.3334 3.33301 13.3334H12.6663C12.8431 13.3334 13.0127 13.2631 13.1377 13.1381C13.2628 13.0131 13.333 12.8435 13.333 12.6667V10C13.333 9.63185 13.6315 9.33337 13.9997 9.33337C14.3679 9.33337 14.6663 9.63185 14.6663 10V12.6667C14.6663 13.1971 14.4556 13.7058 14.0806 14.0809C13.7055 14.456 13.1968 14.6667 12.6663 14.6667H3.33301C2.80257 14.6667 2.29387 14.456 1.91879 14.0809C1.54372 13.7058 1.33301 13.1971 1.33301 12.6667V10C1.33301 9.63185 1.63148 9.33337 1.99967 9.33337Z"
                                                    fill="#3C50E0"
                                                />
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M7.5286 1.52864C7.78894 1.26829 8.21106 1.26829 8.4714 1.52864L11.8047 4.86197C12.0651 5.12232 12.0651 5.54443 11.8047 5.80478C11.5444 6.06513 11.1223 6.06513 10.8619 5.80478L8 2.94285L5.13807 5.80478C4.87772 6.06513 4.45561 6.06513 4.19526 5.80478C3.93491 5.54443 3.93491 5.12232 4.19526 4.86197L7.5286 1.52864Z"
                                                    fill="#3C50E0"
                                                />
                                                <path
                                                    fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M7.99967 1.33337C8.36786 1.33337 8.66634 1.63185 8.66634 2.00004V10C8.66634 10.3682 8.36786 10.6667 7.99967 10.6667C7.63148 10.6667 7.33301 10.3682 7.33301 10V2.00004C7.33301 1.63185 7.63148 1.33337 7.99967 1.33337Z"
                                                    fill="#3C50E0"
                                                />
                                                </svg>
                                            </span>
                                            <p class="text-sm font-medium">
                                                <span class="text-primary">Click to upload</span>
                                                or drag and drop
                                            </p>
                                            <p class="mt-1.5 text-sm font-medium">
                                                SVG, PNG, JPG or GIF
                                            </p>
                                            <p class="text-sm font-medium">
                                                (max, 800 X 800px)
                                            </p>
                                            </div>
                                        </div>
                                        @error('logo')
                                        <p class="text-red-500">{{ $message }}</p>
                                      @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
        
                    
                        <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-10 md:border-b border-gray-300">
                            <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                                <div class="md:col-span-2 ">
                                    <h4 class="text-lg font-semibold md:mb-2">Company Details</h4>
                                    <p class="text-textSecondary">Introduce your company core info quickly to users by fill up company details</p>
                                </div>
                            </div>
                            <div class="md:col-span-3 col-span-6">
                                <div class="space-y-4 md:px-3  dark:border-strokedark dark:bg-boxdark">
                                    <div class="flex flex-col">
                                        <label for="" class="font-semibold mb-2">Company Name</label>
                                        <input id="full-name"  value="{{ old('name', $company->name ?? '') }}" name="name" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                           @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                    </div>
                    
                                    <div class="flex flex-col">
                                        <label for="" class="font-semibold mb-2">Company Website</label>
                                        <input id="full-name"  value="{{ old('website', $company->website ?? '') }}" name="website" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                           @error('website')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                    </div>
                    
                                    <div class="flex flex-col">
                                        <label for="" class="font-semibold mb-1">Location</label>
                                        <input id="full-name"  value="{{ old('location', $company->location ?? '') }}" name="location" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                           @error('location')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                    </div>
                    
                                    <div class="grid grid-cols-2 w-full gap-4">

                                    <div class="flex flex-col">
                                        <label for="" class="font-semibold mb-1">Founded</label>
                                        <input id="full-name"  value="{{ old('founded', $company->founded ?? '') }}" name="founded" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                           @error('founded')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                    </div>

                                        <div class="flex flex-col">
                                            <label for="JobCategory" class="text-gray-700 font-medium">Employee</label>
                                            <select id="JobCategory" name="employe" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                                <option value="">Select Category</option>
                                                <option {{ old('employe', $company->employe == '1-10' ? 'selected' : '') }} value="1-10">1 - 10</option>
                                                <option {{ old('employe', $company->employe == '10-50`' ? 'selected' : '') }} value="10-50">10-50</option>
                                                <option {{ old('employe', $company->employe == '50' ? 'selected' : '') }} value="50">50</option>
                                            </select>
                                            @error('employe')
                                            <p class="text-red-500">{{ $message }}</p>
                                          @enderror
                                        </div> 
                                    </div>
                    
                                    <div class="grid md:grid-cols-2 w-full md:w-auto md:gap-4">
                                        <div class="flex flex-col w-full ">
                                            <label for="JobCategory" class="text-gray-700 font-medium mb-1">Tech Stack</label>
                                            <select 
                                            class="tech w-full" 
                                            id="tech" 
                                            name="tech[]" 
                                            multiple="multiple">
                                            @if (!empty($companyTech))
                                                @foreach($allTech as $tech)
                                                    <option value="{{ $tech->id }}" 
                                                        {{ in_array($tech->id, old('tech', $companyTech)) ? 'selected' : '' }}>
                                                        {{ $tech->name }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <p>No skills found.</p>
                                            @endif
                                        </select>
                                        

                                            </select>
                                        @error('tech')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                        </div> 
                                        <div class="flex flex-col w-full">
                                            <label for="JobCategory" class="text-gray-700 font-medium">Industry</label>
                                            <select id="JobCategory" name="industry" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                                <option value="">Select Category</option>
                                                <option {{ old('industry', $company->industry == 'technology' ? 'selected' : '') }} value="technology">Technology</option>
                                                <option {{ old('industry', $company->industry == 'marketing' ? 'selected' : '') }} value="marketing">Marketing</option>
                                                <option {{ old('industry', $company->industry == 'sales' ? 'selected' : '') }} value="sales">Sales</option>
                                            </select>
                                            @error('industry')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-y-4  md:py-10 md:border-b border-gray-200">
                            <div class="md:col-span-2 col-span-6">
                                <h4 class="text-xl font-semibold md:mb-2">About Company</h4> <!-- Meningkatkan ukuran font heading -->
                                <p class="text-gray-600">Brief description for your company. URLs are hyperlinked.</p>
                            </div>
                            <div class="flex flex-col md:col-span-4 col-span-6 md:px-5"> <!-- Mengubah col-span dan padding untuk memperbesar ukuran form -->
                                <label for="description" class="text-gray-700 font-medium">Description</label>
                                <div class="grid grid-cols-1"> <!-- Mengubah grid-cols menjadi 1 untuk form yang lebih besar -->
                                    <div class="col-span-1">
                                        <textarea id="description" name="description" rows="6" class="mt-2 p-3 w-full border border-gray-300 rounded-md">{{ old('description', $company->description ?? '') }}</textarea> <!-- Meningkatkan padding dan width untuk textarea -->
                                        @error('description')
                                        <p class="text-red-500">{{ $message }}</p>
                                      @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="flex justify-end md:py-6 mb-6 md:mb-0">
                            <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> 
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
                {{-- <div id="login-content" class="px-4 py-6">
                    <form action="{{ route('company-sosmed-store') }}" method="POST">
                      @csrf
                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="grid grid-cols-3 col-span-2">
                                <div class="col-span-2">
                                    <h4 class="text-lg font-semibold mb-2">Basic Information</h4>
                                    <p class="text-textSecondary">Add elsewhere links to your company profile. You can add only username without full https links.</p>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="space-y-4">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="grid grid-cols-1 space-y-4 col-span-2 ">

                                            <div class="flex flex-col">
                                                <label for="" class="font-semibold mb-2">Instagram</label>
                                                <input id="full-name" name="instagram" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                                   @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                            </div>
    
                                            <div class="flex flex-col">
                                                <label for="" class="font-semibold mb-2">Twitter</label>
                                                <input id="full-name" name="twitter" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                                   @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                            </div>
    
                                            <div class="flex flex-col">
                                                <label for="" class="font-semibold mb-2">Facebook</label>
                                                <input id="full-name" name="facebook" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                                   @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="" class="font-semibold mb-2">Linkedin</label>
                                                <input id="full-name" name="linkedin" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                                   @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                            </div>

                                            <div class="flex flex-col">
                                                <label for="" class="font-semibold mb-2">Youtube</label>
                                                <input id="full-name" name="youtube" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                                   @error('name')
                                    <p class="text-red-500">{{ $message }}</p>
                                  @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end py-6">
                            <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> 
                                Submit
                            </button>
                        </div>
                    </form>
                </div> --}}
            
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileTab = document.getElementById('profile-tab');
        const loginTab = document.getElementById('login-tab');
        const profileContent = document.getElementById('profile-content');
        const loginContent = document.getElementById('login-content');

        profileTab.addEventListener('click', function () {
            profileTab.classList.add('border-blue-500');
            loginTab.classList.remove('border-blue-500');
            profileContent.classList.remove('hidden');
            loginContent.classList.add('hidden');
        });

        loginTab.addEventListener('click', function () {
            loginTab.classList.add('border-blue-500');
            profileTab.classList.remove('border-blue-500');
            loginContent.classList.remove('hidden');
            profileContent.classList.add('hidden');
        });

        // Default tab
        profileTab.click();
    });




    $(document).ready(function() {
        

        $('.tech').select2({
            placeholder: 'Select Category',
            allowClear: true,
            ajax: {
                url: "{{ route('get-tech') }}",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                },
                cache: true
            }
        });  


    });
</script>

@endsection