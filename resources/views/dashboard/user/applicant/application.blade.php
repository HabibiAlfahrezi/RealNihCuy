@extends('dashboard.layouts.base')
@section('content')

<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-4 mx-auto">
    <h2 class="mt-6 text-2xl font-poppins font-semibold text-gray-700 dark:text-gray-200">
      Keep It Up {{ Auth::user()->name }}
    </h2>
    <p class="text-grey text-sm">Here is your job applications status</p>

    <!-- With actions -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-6">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="pr-4 py-3 whitespace-nowrap">Company Name</th>
              <th class="px-4 py-3">Job Title</th>
              <th class="px-4 py-3">Status</th>
              <th class="px-4 py-3">Date Applied</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($applicants->isEmpty())
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="w-full text-center" colspan="5">
                  <div class="flex items-center justify-center mt-4 text-center text-sm">
                    No Applications
                  </div>
                </td>
              </tr>
            @else
              @foreach ($applicants as $applicant)
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="pr-4 py-3">
                    <div class="flex items-center text-sm">
                      <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        @if($applicant)
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $applicant->company->logo) }}" alt="" loading="lazy" />
                        @else
                          <img class="object-cover w-full h-full rounded-full" src="{{ asset('img/Nomad.png') }}" alt="" loading="lazy" />
                        @endif
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{ $applicant->company->name }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm whitespace-nowrap">
                    {{ $applicant->pekerjaan->title }}
                  </td>
                  <td class="px-4 py-3 text-xs whitespace-nowrap">
                    <span class="bg-gradient-to-tl 
                      {{ $applicant->stage == 'inreview' ? 'from-yellow-400 to-yellow-600' : '' }} 
                      {{ $applicant->stage == 'approved' ? 'from-green-600 to-lime-400' : '' }} 
                      {{ $applicant->stage == 'rejected' ? 'from-red-600 to-red-400' : '' }} 
                      px-4 text-xs rounded-lg py-2 inline-block text-center align-baseline font-bold uppercase leading-none text-white">
                      {{ $applicant->stage == 'inreview' ? 'In Review' : ($applicant->stage == 'approved' ? 'Approved' : ($applicant->stage == 'rejected' ? 'Rejected' : 'Unknown')) }}
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm whitespace-nowrap">
                    {{ $applicant->created_at }}
                  </td>
                  <td>{{ $applicant->pekerjaan->id }}</td>
                  <td class="px-4 py-3">
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                      <button @click="open = !open" class="focus:outline-none">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                      </button>
                      <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 bottom-10 z-10 origin-bottom-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="min-width: 111px;">
                        <div class="py-1 flex">
                          <a href="{{ route('dashboard.user.jobDetail', $applicant->pekerjaan->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fa-regular fa-eye"></i>
                            <p class="ml-2 -mt-1">View Job</p>
                          </a>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="mt-6 md:mt-0">
        {{ $applicants->links() }}
      </div>
    </div>
  </div>
</main>
@endsection
