@extends('dashboard.layouts.base')

@section('content')
@php
    $totalApplicants = $pekerjaan->total_applicant;
    $currentApplicants = $pekerjaan->applicant->count();
    $progressPercentage = $totalApplicants > 0 ? ($currentApplicants / $totalApplicants) * 100 : 0;
@endphp
<div class="container mx-auto px-4 py-8">

    <div class="">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Main Content -->
            <div class="w-full md:w-2/3 pr-8">
                <!-- Job Header -->
                <div class="mb-10">
                    <div class="flex justify-between items-center  mb-6">
                        <h1 class="text-3xl  font-bold">{{ $pekerjaan->title }}</h1>
                        <div class="flex space-x-2">
                           
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

                <!-- Job Details -->
                <div class="space-y-6">
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
                        <div class="flex flex-col md:flex-row gap-4 h-[300px]">
                            <!-- Gambar utama di sebelah kiri -->
                            <div class="flex-1">
                              <img src="{{ asset('storage/'. ($pekerjaan->company->companyImage->image1 ?? 'path/to/default/image.jpg')) }}" alt="" class="w-full h-auto object-cover rounded-lg">
                            </div>
                        
                            <!-- Gambar kecil di sebelah kanan, diatur secara vertikal dengan tinggi sama -->
                            <div class="flex flex-row md:flex-col flex-1 gap-4">
                              <img src="{{ asset('storage/'. ($pekerjaan->company->companyImage->image2 ?? 'path/to/default/image1.jpg')) }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
                              <img src="{{ asset('storage/'. ($pekerjaan->company->companyImage->image3 ?? 'path/to/default/image2.jpg')) }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
                              <img src="{{ asset('storage/'. ($pekerjaan->company->companyImage->image4 ?? 'path/to/default/image3.jpg')) }}" alt="" class="w-full h-auto md:h-1/3 object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full md:w-1/3 mt-8  md:mt-0">
                <div class="border border-borderAbu mx-6 p-6 rounded-2xl">
                    <div class="border-b border-border pb-8 md:border-none">
                        <h4 class="text-xl font-bold mb-2">About This Role</h4>
                        <p class="text-sm text-gray-700">
                            <span class="font-bold">{{ $pekerjaan->applicant->count() }} applied</span> <span class="text-gray-600">of {{ $pekerjaan->total_applicant }} capacity</span>
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
                    
                    <div class="border-b border-border md:border-none">
                        <h4 class="text-xl font-bold mb-4">Required Skills</h4>
                        <div class="flex flex-wrap gap-4">
                            @foreach ($pekerjaan->skill as $skill)
                                <p class="bg-gray-100 text-primary rounded-md py-1 px-3 text-sm font-medium">{{ $skill->title }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                




                <h2 class="text-xl font-semibold mx-6 my-4">Similar Jobs</h2>
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
<section class="">
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