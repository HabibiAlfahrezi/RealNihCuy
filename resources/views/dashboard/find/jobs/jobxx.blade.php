@extends('dashboard.layouts.base')
@section('content')
    
<section class="bg-gray-50 ">
    <div class="container mx-auto py-8 text-center">
        <div class="w-full">
         
        <form action="" name="searchForm" id="searchForm"  class="input flex flex-col md:flex-row bg-transparent justify-between items-w-full mx-auto p-4 border border-borderAbu rounded-lg">    
            <div class="flex ">
                <div class="search flex items-center mb-4 md:mb-0 md:mr-2 w-full md:w-auto">
                    <i class="fa-solid fa-search text-lg mx-2 text-gray-400"></i>
                    <input type="text" class="py-1.5 px-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-64" id="keywords" name="keywords" value="{{ request('keywords') }}" placeholder="Job Title or Keyword">
                </div>
                <div class="location flex items-center mb-4 md:mb-0 md:mr-2 w-full md:w-auto">
                    <i class="fa-solid fa-map-marker-alt text-lg mx-2 text-gray-400"></i>
                    <input type="text" class="py-1.5 px-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-64" id="location" name="location" value="{{ request('location') }}" placeholder="Location">
                </div>
            </div>
            <div class="w-full md:w-auto">
                <button type="submit" class="font-semibold text-sm px-4 py-2 bg-primary text-white rounded-md w-full md:w-auto hover:bg-primary-dark transition duration-200">Search</button>
            </div>
        </div>
    </div>
</section>


<div class="container mx-auto px-4 py-8 flex">
    <!-- Sidebar -->
    
    <div class="w-1/4 pr-8">
        <h2 class="text-2xl font-bold mb-4">Job filters</h2>

        
            <div class="mb-4 flex items-center">
                @php
                    // Get the status from the query parameter, defaulting to 'open'
                    $selectedStatus = request('status', 'open');
                @endphp
                <label class="flex items-center mr-6">
                    <input
                        type="radio"
                        id="open"
                        name="status"
                        value="open"
                        class="form-radio h-5 w-5 text-indigo-600"
                        @if ($selectedStatus === 'open') checked @endif
                    >
                    <span class="ml-2 text-gray-700">Open</span>
                </label>
                <label class="flex items-center">
                    <input
                        type="radio"
                        id="closed"
                        name="status"
                        value="closed"
                        class="form-radio h-5 w-5 text-indigo-600"
                        @if ($selectedStatus === 'closed') checked @endif
                    >
                    <span class="ml-2 text-gray-700">Closed</span>
                </label>
            </div>
            
            

            <!-- Keywords and Location -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Keywords</h3>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input 
                        type="text" 
                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                        id="keywords" 
                        name="keywords" 
                        value="{{ request('keywords') }}"
                        placeholder="Job Title or Keyword">
                </div>
            </div>

            <div class="mb-6">
                <h3 class="font-semibold mb-2">Location</h3>
                <div class="relative">
                    <i class="fa-solid fa-location-dot absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input 
                        type="text" 
                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                        id="location" 
                        value="{{ request('location') }}"
                        name="location" 
                        placeholder="Location">
                </div>
            </div>

            <!-- Type of Employment -->
            <div class="mb-6  bg-white dark:bg-gray-800  rounded-lg ">
                <h4 class="text-lg font-semibold mb-4">Type of Employment</h4>
                <div class="space-y-2">
                    <div class="flex flex-col gap-4" x-data="{ selectedCount: 0 }">
                        <div class="space-y-2">
                            @if (!$types->isEmpty())
                            @foreach ($types as $type)
                                @php
                                    // Ensure request('type') is processed as an array
                                    $selectedTypes = explode(',', request('type', ''));
                                @endphp
                                <div x-data="{ checkboxToggle: {{ in_array($type->id, $selectedTypes) ? 'true' : 'false' }} }">
                                    <label for="job-type-{{ $type->id }}" class="flex cursor-pointer select-none text-lg items-center ">
                                        <div class="relative">
                                            <input
                                                type="checkbox"
                                                :id="'job-type-{{ $type->id }}'"
                                                class="sr-only"
                                                @change="checkboxToggle = !checkboxToggle"
                                                :checked="checkboxToggle"
                                                name="type"
                                                value="{{ $type->id }}"
                                            />
                                            <div
                                                :class="checkboxToggle ? 'border-primary bg-primary' : 'border-gray-300 bg-white'"
                                                class="mr-4 flex h-6 w-6 items-center justify-center rounded-full border transition-colors duration-200 ease-in-out"
                                            >
                                                <span
                                                    :class="checkboxToggle ? 'bg-white' : 'bg-transparent'"
                                                    class="h-3 w-3 rounded-full transition-transform duration-200 ease-in-out"
                                                    :style="checkboxToggle ? 'transform: scale(1);' : 'transform: scale(0);'"
                                                ></span>
                                            </div>
                                        </div>
                                        {{ $type->title }}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    
                    </div>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Category</h3>
                <select name="category" id="category" class="w-full py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Select a Category</option>
                    @if (!$categories == null)
                        @foreach ($categories as $category)
                            <option {{ Request::get('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Salary Filter -->
            <div class="mb-6">
                <h3 class="font-semibold mb-2">Salary Range</h3>
                <div class="space-y-2">
                    <div>
                        <label for="min_salary" class="block text-sm font-medium text-gray-600 mb-1">Min Salary:</label>
                        <input
                            type="number"
                            name="min_salary"
                            id="min_salary"
                            value="{{ request('min_salary') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter minimum salary"
                        >
                    </div>
                    <div>
                        <label for="max_salary" class="block text-sm font-medium text-gray-600 mb-1">Max Salary:</label>
                        <input
                            type="number"
                            name="max_salary"
                            id="max_salary"
                            value="{{ request('max_salary') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Enter maximum salary"
                        >
                    </div>
                </div>
            </div>

            <div class="flex flex-col space-y-2">
                <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg">Search</button>               
                <a href="{{ route('dashboard.find.job') }}" class="w-full px-4 py-2 text-center bg-red-500 text-white font-semibold rounded-lg">Reset</a>  
            </div>
        </form>
    </div>

    <!-- Main content -->
    <div class="w-3/4">
       

        <!-- Job count and sort -->
        <div class="flex justify-between items-center mb-6">
            <p class="text-gray-700">We've found {{ $jobs->count() }} jobs!</p>
            <div class="flex items-center space-x-2">
                <span class="text-gray-700">Sort by:</span>
                <form action="{{ route('jobs') }}" method="GET">
                    
                    <select name="sort" id="sort" class="form-control">
                        <option {{ Request::get('sort') == 'latest' ? 'selected' : '' }} value="latest">Latest</option>
                        <option {{ Request::get('sort') == 'oldest' ? 'selected' : '' }} value="oldest">Oldest</option>
                    </select>
                </form>
            </div>
        </div>

            <!-- Job listings -->
            <div class="space-y-6">
                @foreach ($jobs as $job)
                <a href="{{ route('jobDetail', $job->id) }}" class="bg-white rounded-xl ">
                    <div class="p-4  rounded-xl border hover:border-primary transition ease-in-out duration-150 ">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-start">
                                <div class="mr-4">
                                    <img src="{{ asset('storage/'. $job->company->logo) }}" alt="{{ $job->company->name }}" class="w-14 h-14 rounded-md">
                                </div>
                                <div>
                                    <h2 class="text-lg font-bold text-gray-900">{{ $job->title }}</h2>
                                    <p class="text-gray-500 text-sm">{{ $job->company->name }}, {{ $job->company->location }}</p>
                                </div>
                            </div>
                            <div>
                                <button class="text-primary flex items-center px-4 py-2 rounded-lg bg-blue-50 hover:bg-blue-100">
                                    <i class="fa-solid fa-bookmark text-blue-500 mr-2"></i> Save job
                                </button>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-4">
                            {{ Str::limit($job->description, 300) }}
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($job->category as $category)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-md text-sm">{{ $category->title }}</span>
                            @endforeach
                    
                            @foreach ($job->type as $type)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-md text-sm">{{ $type->title }}</span>
                            @endforeach
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <span class="text-gray-900 font-semibold">RP {{ number_format($job->salary) }} - {{ number_format($job->salary_max) }} <span class="text-sm font-normal">/ month</span></span>
                                <span class="text-gray-500 text-sm flex items-center gap-2">
                                    <i class="fa-solid fa-users"></i> {{ $job->applicant->count() }} People applied
                                </span>
                            </div>
                            <a href="{{ route('jobDetail', $job->id) }}" class="px-4 py-2 text-primary bg-transparent border  border-primary hover:bg-primary hover:text-white rounded-lg transition ease-in-out">
                                View Job Details
                            </a>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        
        
    </div>
</div>

@endsection

@section('customJs')
<script>
    $("#searchForm").submit(function(e){
       e.preventDefault();

       var url = '{{ route("dashboard.find.job") }}';
       var params = [];
       var keyword = $("#keywords").val();

       var location = $("#location").val();
       var category = $("#category").val();
       var minSalary = $("#min_salary").val();
       var maxSalary = $("#max_salary").val();
       var sort = $("#sort").val();

      // Gather all checked checkboxes with the name 'type' and get their values
        var checkedJobTypes = $("input:checkbox[name='type']:checked").map(function(){
            return $(this).val();
        }).get();

       let selectedStatus = $("input:radio[name='status']:checked").val();

       if (keyword) params.push('keywords=' + encodeURIComponent(keyword));
       if (location) params.push('location=' + encodeURIComponent(location));
       if (category) params.push('category=' + encodeURIComponent(category));
       if (minSalary) params.push('min_salary=' + encodeURIComponent(minSalary));
       if (maxSalary) params.push('max_salary=' + encodeURIComponent(maxSalary));
       if (checkedJobTypes.length > 0) {
    params.push('type=' + encodeURIComponent(checkedJobTypes.join(',')));
}
       if (selectedStatus) params.push('status=' + encodeURIComponent(selectedStatus));
       if (sort) params.push('sort=' + encodeURIComponent(sort));

       if (params.length > 0) {
           url += '?' + params.join('&');
       }

       window.location.href = url;
   });

   $("#sort").change(function(){
       $("#searchForm").submit();
   });
</script>
<script>
     $(document).ready(function() {

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