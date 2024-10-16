@extends('dashboard.layouts.base')
@section('content')

<main class="h-full pb-16 ">
  <div class="container grid mx-auto">
    <div class="flex items-center mt-6 md:mt-0 justify-between ">
      <div>
        <h2 class="md:mt-6 text-2xl font-poppins font-semibold text-gray-700 dark:text-gray-200">Job Listing</h2>
        <p class="text-grey text-sm">Here is your jobs listing status.</p>
      </div>
      <div class="hidden md:block">
        <a href="{{ route('dashboard.company.create') }}" class="px-5 py-3 rounded-lg bg-primary text-white">Create a Job</a>
      </div>
      <div class="block md:hidden">
        <a href="{{ route('dashboard.company.create') }}" class="px-5 py-3 rounded-lg bg-primary text-white">+</a>
      </div>
    </div>
    
    <div class="flex flex-wrap md:-mx-3 md:mt-10 mt-5 overflow-x-auto">
      <div class="flex-none w-full ">
        <div class="relative flex flex-col min-w-0  break-words bg-white  border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto px-0 pt-0 pb-2 ">
            <div class="p-0 ">
              <!-- Wrapper untuk scroll horizontal -->
              <div class="w-full ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 min-w-max ">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="pr-3 md:px-6 py-3 whitespace-nowrap">Name</th>
                      <th scope="col" class="px-3 md:px-6 py-3 whitespace-nowrap">Type</th>
                      <th scope="col" class="px-3 md:px-6 py-3 text-center whitespace-nowrap">Status</th>
                      <th scope="col" class="px-3 md:px-6 py-3 text-center whitespace-nowrap">Applicant</th>
                      <th scope="col" class="px-3 md:px-6 py-3 text-center whitespace-nowrap">Created At</th>
                      <th scope="col" class="px-3 md:px-6 py-3 text-center whitespace-nowrap">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($jobs as $job)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="pr-3 md:px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        <div class="flex items-center">
                          <img src="{{ asset($job->company->logo ? 'storage/' . $job->company->logo : 'img/avatar.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="{{ $job->title }}">
                          <div>
                            <div class="text-sm font-semibold">{{ $job->title }}</div>
                            <div class="text-xs text-gray-500">RP. {{ number_format($job->salary) }} / month</div>
                          </div>
                        </div>
                      </td>
                      <td class="px-3 md:px-6 py-4 whitespace-nowrap">
                        @foreach ($job->type as $type)
                        <span class="px-3 py-1 text-xs font-semibold text-white bg-blue-500 rounded-full">{{ $type->title }}</span>
                        @endforeach
                      </td>
                      <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <span class="bg-gradient-to-tl {{ $job->status == 'open' ? 'from-green-600 to-lime-400' : ($job->status == 'close' ? 'from-red-600 to-red-400' : '') }} px-4 text-xs rounded-lg py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                          {{ $job->status == 'open' ? 'Open' : ($job->status == 'close' ? 'Closed' : 'Inactive') }}
                        </span>
                      </td>
                      <td class="px-3 md:px-6 py-4 text-center whitespace-nowrap">
                        <span class="text-xs font-semibold">{{ $job->applicant->count() }} / {{ $job->total_applicant }}</span>
                      </td>
                      <td class="px-3 md:px-6 py-4 text-center whitespace-nowrap">
                        <span class="text-sm">{{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                      </td>
                      <td class="px-3 md:px-6 py-4 text-center whitespace-nowrap">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                          <div x-data="{ open: false }" class="relative inline-block text-left">
                            <button @click="open = !open" class="focus:outline-none">
                                <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 bottom-10 z-10 origin-bottom-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" style="min-width: 150px">
                                <div class="py-1 flex">
                                <a href="{{ route('dashboard.company.jobDetail', $job->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ route('company.job.edit', $job->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ route('company.job.delete', $job->id) }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                </div>
                            </div>
                          </div>
                        </div>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- End of wrapper -->
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="pb-10">
      {{ $jobs->links() }}
    </div>

  </div>
</main>
@endsection
