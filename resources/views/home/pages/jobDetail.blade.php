@extends('home.layouts.home')

@section('content')
@php
    $totalApplicants = $pekerjaan->total_applicant;
    $currentApplicants = $approved;
    $progressPercentage = $totalApplicants > 0 ? ($currentApplicants / $totalApplicants) * 100 : 0;
@endphp
<div class="px-4 md:mx-16 md:py-8 py-4 flex mt-12 md:mt-18 bg-bgPutih">

    <div class="">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Main Content -->
            <div class="w-full md:w-2/3 pr-0 md:pr-8 ">
                <!-- Job Header -->
                <div class="mb-10 hidden md:block">
                    <div class="flex justify-between items-center  mb-6">
                        <h1 class="text-3xl  font-bold">{{ $pekerjaan->title }}</h1>
                        <div class="flex space-x-2">
                            @php
                                $hasApplied = DB::table('applicants')->where('user_id', Auth::user()->id)->where('pekerjaan_id', $pekerjaan->id)->exists();
                            @endphp
                            <h3>{{ $pekerjaan->nama }}</h3>
                            
                            @if($hasApplied)
                                <!-- Jika pengguna telah melamar -->
                                @if ($applicant->stage != 'inreview')
                                    <p class="cursor-pointer bg-transparent border border-primary text-primary px-4 py-2 rounded-full transition duration-300 capitalize">{{ $applicant->stage  }}</p>
                                @else
                                    <a href="{{ route('unapply', $pekerjaan->id) }}" class="cursor-pointer bg-transparent border border-primary text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Un Applied</a>
                                @endif
                            @else
                                <!-- Jika pengguna belum melamar -->
                                <a href="{{ route('apply', $pekerjaan->id) }}" class="cursor-pointer bg-primary text-white px-4 py-2 rounded-full hover:bg-colorHover transition duration-300">Apply Now</a>
                            @endif
                        
                            <button class="border border-gray-300 py-2 px-4 rounded-xl"><i class="far fa-bookmark"></i></button>
                            <button class="border border-gray-300 py-2 px-4 rounded-xl"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex">
                            <div>
                                <img src="{{ asset('storage/'. $pekerjaan->company->logo) }}" alt="{{ $pekerjaan->company->name }} Logo" class="w-16 h-16 mr-2 rounded-xl">
                            </div>
                            <div class="ml-4"> 
                                <div class="flex items-center text-gray-600 mb-2">
                                    <span class="text-blue-500 text-lg font-bold">{{ $pekerjaan->company->name }} <span class="text-grey">• {{ $pekerjaan->company->location }} </span></span>
                                </div>
                                <div class="flex space-x-2">
                                    @foreach ($pekerjaan->type as $type)
                                        <span class="bg-gray-200 text-grey py-0.5 px-1.5 rounded-md font-semibold text-sm">{{ $type->title }}</span>
                                    @endforeach
                                    <span class="text-grey">• {{ $pekerjaan->experience }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6  block md:hidden">
                    <div class="flex flex-col ">
                        <img src="{{ asset('img/job-bg.jpg') }}" class="mb-4" alt="">
                        <div class="px-4 bg-white shadow-md rounded-b-2xl">
                            <div class="flex justify-between items-start">
                                <h1 class="text-4xl font-bold mb-2">{{ $pekerjaan->title }}</h1>
                                <button class="border border-gray-300 py-2 px-4 rounded-xl"><i class="far fa-bookmark"></i></button>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-sm text-gray-600 font-bold">${{ number_format($pekerjaan->salary) }}<span class="text-sm font-normal"> / month</span></p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($pekerjaan->type as $type)
                                        <span class=" text-gray-700 text-xs font-semibold">{{ $type->title }}</span>
                                    @endforeach
                                </div>
                            </div>
                            
                            
                            
                            <div class="flex justify-between items-center space-x-2 mb-3">
                                <div class="flex space-x-2">
                                    <img src="{{ asset('storage/'. $pekerjaan->company->logo) }}" alt="{{ $pekerjaan->company->name }} Logo" class="w-12 h-12 rounded-full">
                                    <div class=" ">
                                        <p class="font-semibold">{{ $pekerjaan->company->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $pekerjaan->company->location ?? 'Bengkong' }}</p>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">{{ $pekerjaan->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        
                        
                        
                        
                        <!-- Fixed bottom button container -->
                        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4">
                            <div class="flex flex-col space-y-2 max-w-md mx-auto">
                                @php
                                    $hasApplied = DB::table('applicants')->where('user_id', Auth::user()->id)->where('pekerjaan_id', $pekerjaan->id)->exists();
                                @endphp
                                
                                @if($hasApplied)
                                    @if ($applicant->stage != 'inreview')
                                        <p class="w-full text-center bg-transparent border border-primary text-primary px-4 py-2 rounded-full transition duration-300 capitalize">{{ $applicant->stage }}</p>
                                    @else
                                        <a href="{{ route('unapply', $pekerjaan->id) }}" class="w-full text-center bg-transparent border border-primary text-primary px-4 py-2 rounded-full hover:bg-primary hover:text-white transition duration-300">Un Applied</a>
                                    @endif
                                @else
                                    <a href="{{ route('apply', $pekerjaan->id) }}" class="w-full text-center bg-primary text-white px-4 py-2 rounded-full hover:bg-colorHover transition duration-300">Apply Now</a>
                                @endif
                                
                                <button class="w-full border border-gray-300 py-2 px-4 rounded-full"><i class="fas fa-share-alt mr-2"></i>Share</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details -->
                <div class="space-y-6 px-4">
                    <div>
                        <h2 class="text-xl font-bold mb-2">About this role</h2>
                        <p class="text-grey">{{ $pekerjaan->description }}</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold mb-2">Qualification</h2>
                        <ul class="list-disc list-inside text-grey ml-3">
                            @foreach(explode("\n", $pekerjaan->qualification) as $qualification)
                                <li>{{ $qualification }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold mb-2">Responsibility</h2>
                        <ul class="list-disc list-inside text-grey ml-3">
                            @foreach(explode("\n", $pekerjaan->responsibilities) as $responsibility)
                                <li>{{ $responsibility }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Add more sections as needed -->

                    <div>
                        <h2 class="text-xl font-bold mb-2">Attachment</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4 gap-y-4 md:gap-y-0 ">
                            @if ($pekerjaan->company->companyImage)
                              <div class="md:col-span-2">
                                <img src="{{ asset('storage/' . ($pekerjaan->company->companyImage->image1 ?? 'default-image-path')) }}" alt="" class="w-full h-full object-cover rounded-lg">
                              </div>
                              <div class="flex flex-col md:flex-col gap-4">
                                <img src="{{ asset('storage/' . ($pekerjaan->company->companyImage->image2 ?? 'default-image-path')) }}" alt="" class=" object-cover rounded-lg">
                                <img src="{{ asset('storage/' . ($pekerjaan->company->companyImage->image3 ?? 'default-image-path')) }}" alt="" class=" object-cover rounded-lg">
                              </div>
                            @else
                              <p class="text-gray-500 ">No image available.</p>
                            @endif
                          </div>
                        
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full md:w-1/3 mt-8  md:mt-0 px-4 md:px-0">
                <div class="border border-borderAbu md:mx-6 p-4 md:p-6 rounded-2xl">
                    <div class="border-b border-border pb-8 md:border-none">
                        <h4 class="text-xl font-bold mb-2">About This Role</h4>
                        <p class="text-sm text-gray-700">
                            <span class="font-bold">{{ $approved }} applied</span> <span class="text-gray-600">of {{ $pekerjaan->total_applicant }} capacity</span>
                        </p>
                        <div class="relative w-full bg-gray-200 rounded-full h-2 mt-2 mb-4">
                            <div class="h-2 bg-gray-200 rounded-full">
                                <!-- Progress bar -->
                                <div class="h-full bg-green-500 rounded-full" style="width: {{ $progressPercentage }}%;"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-y-2">
                            <div class="flex justify-between text-sm">
                                <p class="font-bold">Apply Before:</p>
                                <p>{{ Carbon\Carbon::parse($pekerjaan->expired)->format('d M, Y') }}</p>
                            </div>
                    
                            <div class="flex justify-between text-sm">
                                <p class="font-bold">Job Posted On:</p>
                                <p>{{ Carbon\Carbon::parse($pekerjaan->created_at)->format('d M, Y') }}</p>
                            </div>
                    
                            <div class="flex justify-between text-sm">
                                <p class="font-bold">Job Type:</p>
                                @foreach ($pekerjaan->type as $type)
                                    <p>{{ $type->title }}</p>
                                @endforeach
                            </div>
                    
                            <div class="flex justify-between text-sm">
                                <p class="font-bold">Salary:</p>
                                <p>{{ $pekerjaan->salary  }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-b border-border pb-8 md:border-none">
                        <h4 class="text-xl font-bold mb-4">Category</h4>
                        <div class="flex gap-2 flex-wrap items-center">
                            @foreach ($pekerjaan->category as $category)
                                <p class="border border-yellow-500 text-yellow-700 font-semibold px-3 py-1 rounded-full text-xs">{{ $category->title }}</p>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="">
                        <h4 class="text-xl font-bold mb-4">Required Skills</h4>
                        <div class="flex flex-wrap gap-4">
                            @foreach ($pekerjaan->skill as $skill)
                                <p class="bg-gray-100 text-primary rounded-md py-1 px-3 text-sm font-medium">{{ $skill->title }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                




                <h2 class="text-xl font-bold text-gray-800 md:mx-6 my-4">Similar Jobs</h2>
                @foreach ($similarJobs as $job)
                   <div class="border border-borderAbu mx-6 rounded-2xl">
                        <div class="flex items-start space-x-4 mb-4 px-3 pt-4">
                            <img src="{{ asset('storage/'. $job->company->logo) }}" alt="{{ $job->company->name }}" class="w-12 h-12 rounded-lg">
                            <div class="flex justify-between w-full">
                                <div>
                                    <h3 class="font-semibold">{{ $job->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $job->company->name }} • {{ $job->company->location }}</p>
                                </div>
                                <div>
                                    <button class="border border-gray-300 py-2 px-4 rounded-xl"><i class="far fa-bookmark text-end"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center font-semibold text-sm text-gray-500 mt-1 px-3 space-x-2">
                            <span class="py-0.5 px-1.5 bg-gray-200  rounded-md">{{ $job->type->first()->title }}</span>
                            {{-- <span class="mx-2">•</span> --}}
                            <span class="py-0.5 px-1.5 bg-gray-200  rounded-md">{{ $job->experience }}</span>
                        </div>

                        <p class="text-[13px] text-grey mt-3 px-3 py-2 border-t border-borderAbu">{{ $job->created_at->diffForHumans() }} • {{ $job->applicants_count }} Applicants</p>
                   </div>
                    
                    @if (!$loop->last)
                        <hr class="my-4">
                    @endif
                @endforeach



                {{-- <h2 class="text-xl font-semibold mt-8 mb-4">Other Jobs From {{ $pekerjaan->company->name }}</h2>
                @foreach ($otherJobs as $job)
                    <div class="flex items-start space-x-4 mb-6">
                        <img src="{{ asset('storage/'. $job->company->logo) }}" alt="{{ $job->company->name }}" class="w-12 h-12 rounded-lg">
                        <div>
                            <h3 class="font-semibold">{{ $job->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $job->company->name }} • {{ $job->company->location }}</p>
                            <div class="flex items-center text-sm text-gray-500 mt-1">
                                <span>{{ $job->type->first()->title }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $job->experience }}</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">{{ $job->created_at->diffForHumans() }} • {{ $job->applicants_count }} Applicants</p>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr class="my-4">
                    @endif
                @endforeach --}}
            </div>

            
        </div>
    </div>
</div>




{{-- <!-- Perks and Benefits Section -->
<section class="pb-32">
    <div class="container mx-auto">
        <div class="mb-8">
            <h4 class="text-xl font-bold text-gray-800">Perks and Benefits</h4>
            <p class="text-gray-600 mt-1">This job comes with several perks and benefits.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Example Item -->
            <div class="flex flex-col items-center text-center border border-borderAbu p-4">
                <img src="{{ asset('image/icon/health.png') }}" alt="Healthcare Icon" class="w-12 h-12 mb-4">
                <h4 class="text-lg font-bold text-gray-800 mb-1">Full Healthcare</h4>
                <p class="text-gray-600">
                    We believe in thriving communities, and that starts with our team being happy and healthy.
                </p>
            </div>
            <!-- Add more items as needed -->
            
        </div>
    </div>
</section> --}}




@endsection