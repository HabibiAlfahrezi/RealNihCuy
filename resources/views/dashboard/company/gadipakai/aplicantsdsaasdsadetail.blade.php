@extends('dashboard.layouts.base')

@section('content')
<div class="min-h-screen px-8">
    <div class=" overflow-hidden">
    <div class="flex justify-between items-center">
      <a href="{{ route('dashboard.companyapplication') }}" class="flex items-center text-2xl my-8 font-poppins" >
        <i class="fa-solid fa-arrow-left "></i>
        <p class=" font-semibold ml-6">Applicant Details</p>
      </a>
      <div x-data="dropdown()" class="">
        <button 
            @click="open = !open" 
            class=" text-primary border border-borderAbu px-4 py-2 flex items-center transition duration-300 ease-in-out "
        >
            <span class="mr-2">More Action</span>
            <i 
                class="fas fa-chevron-down transition-transform duration-300 ease-in-out"
                :class="{'transform rotate-180': open}"
            ></i>
        </button>
        
        <div 
            x-show="open" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            @click.away="open = false" 
            class="absolute right-0 mt-2 w-56 bg-white overflow-hidden shadow-2xl z-20 border border-gray-200"
        >
            <div class="p-2 space-y-2">
                <a href="{{ route('approve.applicant', $applicants->id) }}"
                    @click="approve()" 
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out"
                >
                    <i class="fas fa-check mr-2"></i> Approve
                </a>
                <a href="{{ route('reject.applicant', $applicants->id) }}"
                    @click="reject()" 
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition duration-300 ease-in-out"
                >
                    <i class="fas fa-times mr-2"></i> Reject
                </a>
            </div>
        </div>
      </div>
      
      <script>
      function dropdown() {
          return {
              open: false,
              approve() {
                  // Implementasi logika approve
                  console.log('Approved');
                  this.open = false;
              },
              reject() {
                  // Implementasi logika reject
                  console.log('Rejected');
                  this.open = false;
              }
          }
      }
      </script>
    </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4">
        <div class="p-6 border border-borderAbu">
            <div class="flex mb-8">
              <img class="rounded-full w-22 h-22" src="{{ asset('img/download (2).jpg') }}" alt="Profile Picture" />
              <div class="ml-5">
                <h2 class="text-2xl font-semibold font-poppins">{{ $applicants->user->profile->name }}</h2>
                <p class="text-grey">{{ $applicants->user->profile->role }}Web Developer</p>
                <div class="flex mt-2">
                  <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927C9.385 2.01 10.615 2.01 10.951 2.927l1.124 2.962a1 1 0 00.89.676l3.124.243c1.055.082 1.486 1.378.694 2.057l-2.25 1.91a1 1 0 00-.29 1.028l.8 3.111c.26 1.012-.908 1.846-1.787 1.283l-2.707-1.66a1 1 0 00-1.095 0l-2.707 1.66c-.879.563-2.046-.27-1.787-1.283l.8-3.111a1 1 0 00-.29-1.028l-2.25-1.91c-.792-.679-.361-1.975.694-2.057l3.124-.243a1 1 0 00.89-.676l1.124-2.962z" />
                  </svg>
                  <span class="text-yellow-400 ml-2">4.0</span>
                </div>
              </div>
            </div>
  
          <div class="bg-white shadow-sm  mb-4">
            <div class="flex justify-between border-b border-borderAbu py-2">
                <h3 class="text-dark font-semibold ">Applied Jobs</h3>
                <p class="text-grey">{{ $applicants->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-dark text-xl font-bold mt-2 mb-1">{{ $applicants->pekerjaan->title }}</p>
            @foreach ($applicants->pekerjaan->category as $category)      
                @foreach ($applicants->pekerjaan->type as $type)
                    <p class="text-grey">{{ $category->title }} - {{ $type->title }}</p>
                @endforeach
            @endforeach
            <div class="mt-4">
              <div class="flex justify-between text-sm">
                <span>Stage</span>
                <span>Interview</span>
              </div>
              <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 70%"></div>
              </div>
            </div>
            <button class="bg-blue-500 text-white py-2 px-4 rounded mt-4 w-full">Schedule Interview</button>
          </div>
  
          <div class="bg-white">
            <h3 class="font-semibold text-lg">Contact</h3>
            <div class=" mt-2">
              <div class="flex mb-2">
                <svg class="w-5 h-5 text-gray-400 mr-4" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 12.176l7.997-6.292A2.998 2.998 0 0015.23 3H4.77a2.998 2.998 0 00-2.767 2.884zM18 7.638l-7.428 5.851a1 1 0 01-1.144 0L2 7.638V14a3 3 0 003 3h10a3 3 0 003-3V7.638z" />
                </svg>
                <div class="-mt-1">
                    <p class=" text-grey">Email</p>
                    <span class="text-dark">{{ $applicants->user->profile->userSocial->email ?? '' }}</span>
                </div>
              </div>
              <div class="flex mb-2">
                <svg class="w-5 h-5 text-gray-400 mr-4" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M2.003 5.884L10 12.176l7.997-6.292A2.998 2.998 0 0015.23 3H4.77a2.998 2.998 0 00-2.767 2.884zM18 7.638l-7.428 5.851a1 1 0 01-1.144 0L2 7.638V14a3 3 0 003 3h10a3 3 0 003-3V7.638z" />
                </svg>
                <div class="-mt-1">
                    <p class=" text-grey">Phone</p>
                    <span class="text-dark">{{ $applicants->user->profile->userSocial->phone ?? '' }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-span-2 p-6 border border-borderAbu">
          <div class="mb-6">
            <div class="flex justify-between border-b pb-2 mb-4">
              <h3 class="text-xl font-bold">Applicant Profile</h3>
            </div>

            <div class="border-b pb-8 border-borderAbu">
                <h4 class="text-xl font-semibold mb-2">Personal Info</h4>
                <div class="grid grid-cols-2 w-full ">
                    <div class="flex flex-col gap-y-3">
                        <div class="">
                            <p class="text-grey">Full Name: </p>
                            <p class="text-dark font-bold">{{ $applicants->user->profile->name }} </p>
                        </div>
                        <div class="">
                            <p class="text-grey">Date of Birth: </p>
                            <p class="text-dark font-bold">{{ Carbon\Carbon::parse($applicants->user->profile->date_of_birth)->format('d F Y') }}</p>
                        </div>
                    
                        <div class="">
                            <p class="text-grey">Language: </p>
                            <p class="text-dark font-bold">{{ $applicants->user->profile->language }}</p>
                        </div>
                      </div>
                      <div class="flex flex-col gap-y-3 max-w-[250px]">
                          <div class="">
                              <p class="text-grey">Gender: </p>
                              <p class="text-dark font-bold">{{ $applicants->user->profile->gender }}</p>
                          </div>
                          <div class="">
                              <p class="text-grey">Adress </p>
                              <p class="text-dark font-bold">{{ $applicants->user->profile->address }}</p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-xl font-semibold mb-2">Professional Info</h4>
                <div class="w-full flex flex-col gap-y-3">
                    <div class="">
                        <h4 class="text-grey my-2">About Me</h4>
                        <p class="text-dark font-bold mb-5">{{ $applicants->user->profile->description }}</p>
                        <p class="text-dark font-bold">{{ $applicants->user->profile->experince }}</p>
                    </div>
                    <div class="mt-2">
                    
                        <div class="grid grid-cols-3 ">
                            <div class="col-span-1 flex flex-col gap-y-4">
                                <div>
                                    <h4 class="text-grey">Current Job</h4>
                                    @if ($applicants->user->profile->current_job)
                                    <p class="text-dark font-semibold">{{ $applicants->user->profile->current_job }}</p>
                                    @else
                                    <p class="text-dark font-semibold">Not Working</p>

                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-grey">Highest Qualification Held</h4>
                                    <p class="text-dark font-semibold">{{ $applicants->user->profile->highest_position }}</p>
                                </div>
                            </div>
                            <div class="col-span-2 flex flex-col gap-y-3">
                                <div>
                                    <h4 class="text-grey">Experience in Years</h4>
                                    <p class="text-dark font-semibold">{{ $applicants->user->profile->experience_year }}</p>
                                </div>
                                <div>
                                    <h4 class="text-grey">Skill set</h4>
                                    @foreach ( $applicants->user->profile->userSkill as $skill)
                                      
                                    <p class="text-dark font-semibold">{{ $skill->title }}</p>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection