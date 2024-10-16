@extends('dashboard.layouts.base')
@section('content')
  
<main class="h-full overflow-y-auto bg-white">
  <div class="container px-4 md:px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      Dashboard
    </h2>
    <div class="mb-4">
      <div class="text-lg font-semibold">Good morning, {{ Auth::user()->name }}</div>
      <div class="text-gray-600 mb-6">
        Here is what's happening with your job search applications.
      </div>
    </div>
    
    {{-- <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg border border-borderAbu dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Total clients
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            6389
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg border border-borderAbu dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Account balance
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            $ 46,760.89
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg border border-borderAbu dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            New sales
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            376
          </p>
        </div>
      </div>
      <!-- Card -->
      <div
        class="flex items-center p-4 bg-white rounded-lg border border-borderAbu dark:bg-gray-800"
      >
        <div
          class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
              fill-rule="evenodd"
              d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <div>
          <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
          >
            Pending contacts
          </p>
          <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
          >
            35
          </p>
        </div>
      </div>
    </div> --}}

    <div class="grid md:grid-cols-5 grid-cols-1 md:gap-x-4">
      <!-- Card pertama -->
      <div class="md:col-span-1 grid grid-cols-2 md:grid-col-1 gap-x-4  md:flex flex-col justify-between h-full">
        <div class="relative border border-borderAbu p-5 flex items-center bg-white  rounded-lg h-full">
          <div class="">
            <div class="text-gray-600 font-semibold text-xl">Total Jobs Applied</div>
            <div class="text-[60px] font-bold text-gray-800">{{ $totalApplicant }}</div>
          </div>
          {{-- <div class="absolute right-4 bottom-0 flex justify-end">
            <i class="fas fa-file-alt text-gray-300 text-6xl"></i>
          </div> --}}
        </div>
        <!-- Card kedua -->
        <div class="relative border border-borderAbu p-5 flex items-center bg-white  rounded-lg h-full md:mt-4">
          <div class="">
            <div class="text-gray-600 font-semibold text-xl">Total Jobs Views</div>
            <div class="text-[60px] font-bold text-gray-800">{{ $totalViews }}</div>
          </div>
          {{-- <div class="absolute right-4 bottom-0 flex justify-end">
            <i class="fas fa-eye text-gray-300 text-6xl"></i>
          </div> --}}
        </div>
      </div>
    
      <div class="col-span-2 mt-4 md:mt-0 h-full">
        @include('dashboard.user.chart.user3')
      </div>
    
      <div class="col-span-2 mt-4 md:mt-0 h-full">
        @include('dashboard.user.table.table')
      </div>
    </div>
    
    

   <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mb-20">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Company</th>
              <th class="px-4 py-3">Role</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Date</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($applicants->isEmpty())
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="w-full text-center" colspan="5"> <!-- Menggunakan colspan untuk memenuhi lebar tabel -->
                  <div class="flex items-center justify-center mt-4 text-center text-sm">
                    No Applications
                  </div>
                </td>
              </tr>
            @else
              @foreach ($applicants as $applicant)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm whitespace-nowrap"> <!-- Added whitespace-nowrap to prevent wrapping -->
                      <!-- Avatar with inset shadow -->
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        @if($applicant)
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $applicant->company->logo) }}" alt="" loading="lazy" />
                        @else
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('img/Nomad.png') }}" alt="" loading="lazy" />
                        @endif
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div class="truncate"> <!-- Added truncate for long company names -->
                        <p class="font-semibold">{{ $applicant->company->name }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm truncate"> <!-- Added truncate for long job titles -->
                    {{ $applicant->pekerjaan->title }}
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span class="bg-gradient-to-tl 
                          {{ $applicant->stage == 'inreview' ? 'from-yellow-400 to-yellow-600' : '' }} 
                          {{ $applicant->stage == 'approved' ? 'from-green-600 to-lime-400' : '' }} 
                          {{ $applicant->stage == 'rejected' ? 'from-red-600 to-red-400' : '' }} 
                          px-4 text-xs rounded-lg py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                      {{ $applicant->stage == 'inreview' ? 'In Review' : ($applicant->stage == 'approved' ? 'Approved' : ($applicant->stage == 'rejected' ? 'Rejected' : 'Unknown')) }}
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm whitespace-nowrap"> <!-- Added whitespace-nowrap to prevent date wrapping -->
                    {{ $applicant->created_at }}
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
          <div class="mt-6">
            {{ $applicants->links() }}
          </div>
        </table>
      </div>
    </div>

  </div>
</main>


@endsection

@section('scripts')
<script type="module" src="{{ asset('js/components/user3.js') }}"></script>
@endsection