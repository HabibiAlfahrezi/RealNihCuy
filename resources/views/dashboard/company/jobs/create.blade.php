@extends('dashboard.layouts.base')
@section('content')


<section class="mt-10">
    @if (session('success'))
    <div
            class="flex w-full border-l-6 border-[#34D399] bg-[#34D399] bg-opacity-[15%] px-7 py-8 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9"
        >
            <div
            class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#34D399]"
            >
            <svg
                width="16"
                height="12"
                viewBox="0 0 16 12"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z"
                fill="white"
                stroke="white"
                ></path>
            </svg>
            </div>
            <div class="w-full">
            <h5
                class="mb-3 text-lg font-bold text-black dark:text-[#34D399]"
            >
                {{ session('success') }}
            </h5>
            </div>
        </div>
    @endif

    @if (session('error'))
    <div
    class="flex w-full border-l-6 border-[#F87171] bg-[#F87171] bg-opacity-[15%] px-7 py-8 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9"
  >
    <div
      class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#F87171]"
    >
      <svg
        width="13"
        height="13"
        viewBox="0 0 13 13"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M6.4917 7.65579L11.106 12.2645C11.2545 12.4128 11.4715 12.5 11.6738 12.5C11.8762 12.5 12.0931 12.4128 12.2416 12.2645C12.5621 11.9445 12.5623 11.4317 12.2423 11.1114C12.2422 11.1113 12.2422 11.1113 12.2422 11.1113C12.242 11.1111 12.2418 11.1109 12.2416 11.1107L7.64539 6.50351L12.2589 1.91221L12.2595 1.91158C12.5802 1.59132 12.5802 1.07805 12.2595 0.757793C11.9393 0.437994 11.4268 0.437869 11.1064 0.757418C11.1063 0.757543 11.1062 0.757668 11.106 0.757793L6.49234 5.34931L1.89459 0.740581L1.89396 0.739942C1.57364 0.420019 1.0608 0.420019 0.740487 0.739944C0.42005 1.05999 0.419837 1.57279 0.73985 1.89309L6.4917 7.65579ZM6.4917 7.65579L1.89459 12.2639L1.89395 12.2645C1.74546 12.4128 1.52854 12.5 1.32616 12.5C1.12377 12.5 0.906853 12.4128 0.758361 12.2645L1.1117 11.9108L0.758358 12.2645C0.437984 11.9445 0.437708 11.4319 0.757539 11.1116C0.757812 11.1113 0.758086 11.111 0.75836 11.1107L5.33864 6.50287L0.740487 1.89373L6.4917 7.65579Z"
          fill="#ffffff"
          stroke="#ffffff"
        ></path>
      </svg>
    </div>
    <div class="w-full">
      <h5 class="mb-3 font-bold text-[#B45454]">
        There were 1 errors with your submission
      </h5>
    </div>
  </div>
    @endif

    <div class="container mx-auto px-4">
        <div class="w-full mx-auto">
          
            <div class="flex justify-between items-center mb-2 border border-borderAbu  px-4 py-4 -mt-5">
                <div class="flex items-center flex-shrink-0 -ml-2.5 md:ml-0">
                    <div class="step-indicator w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center bg-gray-200 text-gray-400">
                        <i class="fas fa-briefcase text-xl md:text-2xl"></i>
                    </div>
                    <div class="ml-2">
                        <h3 class="step-title text-gray-400 text-sm md:text-base whitespace-nowrap">Step 1/3</h3>
                        <p class="font-semibold step-description text-gray-400 text-[14px] md:text-base whitespace-nowrap">Job Information</p>
                    </div>
                </div>
                
                <div class="border-r border-borderAbu h-10 mx-2 md:mx-4 flex-shrink-0"></div>
                
                <div class="flex items-center flex-shrink-0 ">
                    <div class="step-indicator w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center bg-gray-200 text-gray-400">
                        <i class="fas fa-clipboard text-xl md:text-2xl"></i>
                    </div>
                    <div class="ml-2">
                        <h3 class="step-title text-gray-400 text-sm md:text-base whitespace-nowrap">Step 2/3</h3>
                        <p class="font-semibold step-description text-gray-400 text-[14px] md:text-base whitespace-nowrap">Job Description</p>
                    </div>
                </div>

                <div class="border-r border-borderAbu h-10 mx-2 md:mx-4 flex-shrink-0 hidden md:block"></div>
                
                <div class="md:flex items-center flex-shrink-0 hidden md:block">
                    <div class="step-indicator w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center bg-gray-200 text-gray-400">
                        <i class="fas fa-clipboard text-xl md:text-2xl"></i>
                    </div>
                    <div class="ml-2">
                        <h3 class="step-title text-gray-400 text-sm md:text-base whitespace-nowrap">Step 3/3</h3>
                        <p class="font-semibold step-description text-gray-400 text-[14px] md:text-base whitespace-nowrap">Submit Your Job</p>
                    </div>
                </div>
            </div>

            <!-- Form Steps -->
            <form id="multiStepForm" action="{{ route('job.store') }}" method="post"  >
                @csrf
                @if ($pekerjaan ?? '') 
                    <input type="hidden" name="id" value="{{ $pekerjaan->id }}">
                @else 

                @endif
                <!-- Step 1 -->
                <div class="step-content active flex flex-col gap-y-6 ">
                    <div class="md:border-b border-gray-300 md:py-6">
                        <h4 class="text-lg font-semibold">Basic Information</h4>
                        <p class="text-gray-600">This is your personal information that you can update anytime.</p>
                    </div>
                    

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="col-span-6 md:col-span-2">
                          <h4 class="text-lg font-semibold md:mb-2">Job Title</h4>
                          <p class="text-gray-600">Job titles must describe one position</p>
                        </div>
                      
                        <div class="col-span-6 md:col-span-4">
                          <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                              <div class="flex flex-col">
                                <input
                                  type="text"
                                  name="title"
                                  value="{{ $pekerjaan->title ?? '' }}"
                                  placeholder="Job Title..."
                                  class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Type of Employment</h4>
                                <p class="text-gray-500 ">You can select multiple types of employment</p>
                            </div>
                        </div>
                        <div class="col-span-6 grid md:grid-cols-2 md:col-span-4">
                            <div class="space-y-4 ">
                                <div class="grid grid-cols-2 gap-4 " x-data="{ selectedCount: {{ count($pekerjaan->type ?? []) }} }">
                                    @foreach ($types as $type)
                                    <div x-data="{ checkboxToggle: {{ isset($pekerjaan) && $pekerjaan->type->contains('id', $type->id) ? 'true' : 'false' }} }" class="border border-borderAbu px-3 py-1 rounded-lg">
                                            <label
                                                for="{{ $type->title }}"
                                                class="flex cursor-pointer select-none items-center text-lg"
                                            >
                                                <div class="relative">
                                                    <input
                                                        type="checkbox"
                                                        name="type[]"
                                                        value="{{ $type->id }}"
                                                        id="{{ $type->title }}"
                                                        class="sr-only"
                                                        @change="checkboxToggle = !checkboxToggle; 
                                                                 if (checkboxToggle) {
                                                                     selectedCount++; 
                                                                 } else { 
                                                                     selectedCount--; 
                                                                 }"
                                                        :disabled="!checkboxToggle && selectedCount >= 3"
                                                        {{ isset($pekerjaan) && $pekerjaan->type->contains('id', $type->id) ? 'checked' : '' }}

                                                    />
                                                    <div
                                                        :class="checkboxToggle && 'border-primary bg-gray dark:bg-transparent'"
                                                        class="mr-4 flex h-5 w-5 items-center justify-center rounded border border-black"
                                                    >
                                                        <span
                                                        :class="checkboxToggle && 'bg-primary'"
                                                        class="h-2.5 w-2.5 rounded-sm"
                                                        ></span>
                                                    </div>
                                                </div>
                                                {{ $type->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Salary</h4>
                                <p class="text-gray-600">Please specify the estimated salary range for the role. *You can leave this blank</p>
                            </div>
                        </div>
                        <div class="md:col-span-4 col-span-6 grid md:grid-cols-2">
                            <div class="relative flex flex-col">
                                <i class="fa-solid fa-dollar-sign   absolute left-4 top-4  text-xl"></i>

                                <input
                                    type="number"
                                    name="salary"
                                    value="{{ $pekerjaan->salary ?? '' }}"
                                    placeholder="1,000,000"
                                    class="md:w-[150px]  rounded-lg border-[1.5px] border-stroke bg-transparent pl-10 pr-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                        </div>                        
                    </div>


                    <div class="grid grid-cols-6 gap-y-2 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Total Applicant</h4>
                                <p class="text-gray-600">Please specify the total applicant for the role. *You can leave this blank</p>
                            </div>
                        </div>
                        <div class="col-span-6 md:col-span-4 grid md:grid-cols-2">
                            <div class="relative flex flex-col">
                                <i class="fa-solid fa-person absolute left-4 top-4  text-xl"></i>

                                <input
                                    type="number"
                                    name="total_applicant"
                                    placeholder="10"
                                    value="{{ $pekerjaan->total_applicant ?? '' }}"
                                    class="md:w-[150px] rounded-lg border-[1.5px] border-stroke bg-transparent pl-10 pr-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-2 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Categories</h4>
                                <p class="text-gray-600">You can select multiple job categories</p>
                            </div>
                        </div>
                        <div class="col-span-6 md:col-span-4 grid md:grid-cols-2">
                            <div class="flex flex-col">
                                <select 
                                    class="categories form-control" 
                                    id="categories" 
                                    name="categories[]" 
                                    multiple="multiple">
                                        @if (!empty($pekerjaanCategory))
                                            @foreach($allCategories as $category) <!-- Menggunakan `alltechs` untuk mendapatkan semua tech yang tersedia -->
                                                <option value="{{ $category->id }}" {{ in_array($category->id, $pekerjaanCategory) ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        @else
                                            <p>No skills found.</p>
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-2 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="col-span-6 md:col-span-2">
                            <h4 class="text-lg font-semibold md:mb-2">Required Skills</h4>
                            <p class="text-gray-600">Add required skills for the job</p>
                        </div>
                        <div class="col-span-6 md:col-span-4 grid md:grid-cols-2">
                            <div class="flex flex-col">
                                <select 
                                    class="skills form-control" 
                                    id="skills" 
                                    name="skills[]" 
                                    multiple="multiple">
                                        @if (!empty($pekerjaanSkill))
                                            @foreach($allSkills as $skill) <!-- Menggunakan `alltechs` untuk mendapatkan semua tech yang tersedia -->
                                                <option value="{{ $skill->id }}" {{ in_array($skill->id, $pekerjaanSkill) ? 'selected' : '' }}>
                                                    {{ $skill->title }}
                                                </option>
                                            @endforeach
                                        @else
                                            <p>No skills found.</p>
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-2 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="col-span-6 md:col-span-2">
                            <h4 class="text-lg font-semibold mb-2">Featured</h4>
                        </div>
                        <div class="col-span-6 md:col-span-4 grid md:grid-cols-2">
                            <div x-data="{ switcherToggle: {{ isset($pekerjaan) && $pekerjaan->company->role === 'Premium' ? 'true' : 'false' }} }">
                                <label
                                for="toggle3"
                                class="flex cursor-pointer select-none items-center"
                                >
                                @if (Auth::user()->company->role == 'Premium')   
                                    <div class="relative">
                                        <input
                                        type="checkbox"
                                        id="toggle3"
                                        name="featured"
                                        class="sr-only"
                                        @change="switcherToggle = !switcherToggle"
                                        :checked="switcherToggle"
                                        />
                                        <div
                                        class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"
                                        ></div>
                                        <div
                                        :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                                        class="dot absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
                                        >
                                        <span
                                            :class="switcherToggle && '!block'"
                                            class="hidden text-white dark:text-bodydark"
                                        >
                                            <svg
                                            class="fill-current stroke-current"
                                            width="11"
                                            height="8"
                                            viewBox="0 0 11 8"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                                fill=""
                                                stroke=""
                                                stroke-width="0.4"
                                            ></path>
                                            </svg>
                                        </span>
                                        <span :class="switcherToggle && 'hidden'">
                                            <svg
                                            class="h-4 w-4 stroke-current"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            ></path>
                                            </svg>
                                        </span>
                                        </div>
                                    </div>
                                    @else
                                    <div class="relative">
                                        <input
                                        disabled
                                        type="checkbox"
                                        id="toggle3"
                                        name="featured"
                                        class="sr-only"
                                        @change="switcherToggle = !switcherToggle"
                                        />
                                        <div
                                        class="block h-8 w-14 rounded-full bg-meta-9 dark:bg-[#5A616B]"
                                        ></div>
                                        <div
                                        :class="switcherToggle && '!right-1 !translate-x-full !bg-primary dark:!bg-white'"
                                        class="dot absolute left-1 top-1 flex h-6 w-6 items-center justify-center rounded-full bg-white transition"
                                        >
                                        <span
                                            :class="switcherToggle && '!block'"
                                            class="hidden text-white dark:text-bodydark"
                                        >
                                            <svg
                                            class="fill-current stroke-current"
                                            width="11"
                                            height="8"
                                            viewBox="0 0 11 8"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                                fill=""
                                                stroke=""
                                                stroke-width="0.4"
                                            ></path>
                                            </svg>
                                        </span>
                                        <span :class="switcherToggle && 'hidden'">
                                            <svg
                                            class="h-4 w-4 stroke-current"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg"
                                            >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            ></path>
                                            </svg>
                                        </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('pricing') }}" class="ml-4 text-blue-700 hover:underline">You must be Premium to use feature! </a>
                                @endif
                                
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-2 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="col-span-6 md:col-span-2">
                            <h4 class="text-lg font-semibold md:mb-2">Expired Job</h4>
                            <p class="text-gray-600">When the job will expire</p>
                        </div>
                        <div class="col-span-6 md:col-span-4 grid md:grid-cols-2">
                            <div class="flex flex-col">
                                <div>
                                    <div class="relative">
                                      <input
                                        class="form-datepicker w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
                                        placeholder="mm/dd/yyyy"
                                        name="expired"
                                        type="date"
                                        value="{{ isset($pekerjaan) ? $pekerjaan->expired : old('expired') }}"
                                        data-class="flatpickr-right"
                                      />
                    
                                      <div
                                        class="pointer-events-none absolute inset-0 left-auto right-5 flex items-center"
                                      >
                                        <svg
                                          width="18"
                                          height="18"
                                          viewBox="0 0 18 18"
                                          fill="none"
                                          xmlns="http://www.w3.org/2000/svg"
                                        >
                                          <path
                                            d="M15.7504 2.9812H14.2879V2.36245C14.2879 2.02495 14.0066 1.71558 13.641 1.71558C13.2754 1.71558 12.9941 1.99683 12.9941 2.36245V2.9812H4.97852V2.36245C4.97852 2.02495 4.69727 1.71558 4.33164 1.71558C3.96602 1.71558 3.68477 1.99683 3.68477 2.36245V2.9812H2.25039C1.29414 2.9812 0.478516 3.7687 0.478516 4.75308V14.5406C0.478516 15.4968 1.26602 16.3125 2.25039 16.3125H15.7504C16.7066 16.3125 17.5223 15.525 17.5223 14.5406V4.72495C17.5223 3.7687 16.7066 2.9812 15.7504 2.9812ZM1.77227 8.21245H4.16289V10.9968H1.77227V8.21245ZM5.42852 8.21245H8.38164V10.9968H5.42852V8.21245ZM8.38164 12.2625V15.0187H5.42852V12.2625H8.38164V12.2625ZM9.64727 12.2625H12.6004V15.0187H9.64727V12.2625ZM9.64727 10.9968V8.21245H12.6004V10.9968H9.64727ZM13.8379 8.21245H16.2285V10.9968H13.8379V8.21245ZM2.25039 4.24683H3.71289V4.83745C3.71289 5.17495 3.99414 5.48433 4.35977 5.48433C4.72539 5.48433 5.00664 5.20308 5.00664 4.83745V4.24683H13.0504V4.83745C13.0504 5.17495 13.3316 5.48433 13.6973 5.48433C14.0629 5.48433 14.3441 5.20308 14.3441 4.83745V4.24683H15.7504C16.0316 4.24683 16.2566 4.47183 16.2566 4.75308V6.94683H1.77227V4.75308C1.77227 4.47183 1.96914 4.24683 2.25039 4.24683ZM1.77227 14.5125V12.2343H4.16289V14.9906H2.25039C1.96914 15.0187 1.77227 14.7937 1.77227 14.5125ZM15.7504 15.0187H13.8379V12.2625H16.2285V14.5406C16.2566 14.7937 16.0316 15.0187 15.7504 15.0187Z"
                                            fill="#64748B"
                                          />
                                        </svg>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 mb-8">
                        <button type="button" class="next-step px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-purple">
                            Next Step
                        </button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-content hidden flex flex-col gap-y-6">
                    <div class="md:border-b border-gray-300 md:py-6">
                        <h4 class="text-lg font-semibold">Details</h4>
                        <p class="text-gray-600">Add the description of the job, responsibilities, who you are, and nice-to-haves.</p>
                    </div>
                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2 ">
                                <h4 class="text-lg font-semibold md:mb-2">Job Descriptions</h4>
                                <p class="text-gray-600">Describe the job position</p>
                            </div>
                        </div>
                        <div class="md:col-span-4 grid md:grid-cols-2 col-span-6">
                            <div class="flex flex-col">
                                <textarea id="job-description" name="description" class="p-2 border border-gray-300 rounded-md w-full" rows="4">{{ isset($pekerjaan) ? $pekerjaan->description : old('description') }}</textarea>
                                <p class="text-gray-600 mt-1 hidden">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Responsibilities</h4>
                                <p class="text-gray-600">Outline the core responsibilities of the position</p>
                            </div>
                        </div>
                        <div class="md:col-span-4 grid md:grid-cols-2 col-span-6">
                            <div class="flex flex-col">
                                <textarea id="responsibilities" name="responsibilities[]" class="p-2 border border-gray-300 rounded-md w-full" placeholder="Enter responsibilities, each on a new line" rows="4">{{ isset($pekerjaan) ? $pekerjaan->responsibilities : old('responsibilities') }}</textarea>
                                <p class="text-gray-600 mt-1 hidden">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold md:mb-2">Who You Are</h4>
                                <p class="text-gray-600">Add preferred candidates qualifications</p>
                            </div>
                        </div>
                        <div class="col-span-6 grid md:grid-cols-2 md:col-span-4">
                            <div class="flex flex-col">
                                <textarea id="who-you-are" name="qualification[]" class="p-2 border border-gray-300 rounded-md w-full" placeholder="Enter qualification, each on a new line" rows="4">{{ isset($pekerjaan) ? $pekerjaan->qualification : old('qualification') }}</textarea>
                                <p class="text-gray-600 mt-1 hidden">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-y-3 md:gap-6 md:py-6 md:border-b border-gray-300">
                        <div class="grid md:grid-cols-3 col-span-6 md:col-span-2">
                            <div class="md:col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Nice-to-Haves</h4>
                                <p class="text-gray-600">Experience years</p>
                            </div>
                        </div>
                        <div class="md:col-span-4 col-span-6 grid mdgrid-cols-2">
                            <div class="relative flex flex-col">

                                <input
                                    type="number"
                                    name="experience"
                                    placeholder="4 Years"
                                    value="{{ isset($pekerjaan) ? $pekerjaan->experience : old('experience') }}"
                                    class="md:w-[150px]  rounded-lg border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary"
                                />
                            </div>
                        </div>   
                        {{-- <div class="md:col-span-4 col-span-6">
                            <div class="flex flex-col">
                                <textarea id="nice-to-haves" name="experience" class="p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                                <p class="text-gray-600 mt-1 hidden">Maximum 500 Characters</p>
                            </div>
                        </div> --}}
                    </div>

                    <div class="flex justify-between  mt-4 mb-8">
                        <button type="button" class="prev-step px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-purple">
                            Previous Step
                        </button>
                        <button type="submit" class="next-step px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-purple">Submit</button>
                    </div>
                   
                </div>

                <!-- Step 3 -->
                {{-- <div class="step-content hidden">
                    <div>
                        <label for="perks" class="block text-sm font-medium text-gray-700">Perks & Benefits</label>
                        <textarea name="perks" id="perks" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                    </div>
                   
                    <div class="flex justify-between mt-4">
                        <button type="button" class="next-step px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-purple prev-step">Previous Step</button>
                        <button type="submit" class="next-step px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg hover:bg-red-300 focus:outline-none focus:shadow-outline-purple">Submit</button>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let currentStep = 0;
        const steps = document.querySelectorAll('.step-content');
        const stepIndicators = document.querySelectorAll('.step-indicator');
        const stepTitles = document.querySelectorAll('.step-title');
        const stepDescriptions = document.querySelectorAll('.step-description');

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                if (index === stepIndex) {
                    step.classList.remove('hidden');
                    step.classList.add('active');
                    stepIndicators[index].classList.replace('bg-gray-200', 'bg-primary');
                    stepIndicators[index].classList.replace('text-gray-400', 'text-white');
                    stepTitles[index].classList.replace('text-gray-400', 'text-primary');
                    stepDescriptions[index].classList.replace('text-gray-400', 'text-primary');
                } else {
                    step.classList.remove('active');
                    step.classList.add('hidden');
                    stepIndicators[index].classList.replace('bg-primary', 'bg-gray-200');
                    stepIndicators[index].classList.replace('text-white', 'text-gray-400');
                    stepTitles[index].classList.replace('text-primary', 'text-gray-400');
                    stepDescriptions[index].classList.replace('text-primary', 'text-gray-400');
                }
            });
        }

        document.querySelectorAll('.next-step').forEach(button => {
            button.addEventListener('click', function () {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        document.querySelectorAll('.prev-step').forEach(button => {
            button.addEventListener('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        // Initial step display
        showStep(currentStep);
    });

    $(document).ready(function() {
        $('.skills').select2({
            placeholder: 'Select Skills',
            allowClear: true,
            ajax: {
                url: "{{ route('get-skills') }}",
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
                                text: item.title
                            };
                        })
                    };
                },
                cache: true
            }
        });  

        $('.categories').select2({
            placeholder: 'Select Category',
            allowClear: true,
            ajax: {
                url: "{{ route('get-category') }}",
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
                                text: item.title
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