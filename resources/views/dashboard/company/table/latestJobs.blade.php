<div class="flex flex-wrap mt-6 lg:mt-10 border border-borderAbu ">
    <div class="flex items-center justify-between ">
        <div>
            <h4 class="text-xl font-bold p-6 text-black dark:text-white">Latest Jobs Open</h4>

        </div>
    </div>
    <div class="flex-none w-full ">

        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>

                                <th scope="col" class="px-6 py-3 text-center">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Applicant
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pekerjaans->count() > 0)
                                @foreach ($pekerjaans as $job)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <div class="flex items-center">

                                                <div>
                                                    <div class="text-sm font-semibold">{{ $job->title }}</div>
                                                    <div class="text-xs text-gray-500">RP.
                                                        {{ number_format($job->salary) }}
                                                        / month</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span
                                                class="bg-gradient-to-tl {{ $job->status == 'open' ? 'from-green-600 to-lime-400' : ($job->status == 'close' ? 'from-red-600 to-red-400' : '') }} px-4 text-xs rounded-lg py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                                {{ $job->status == 'open' ? 'Open' : ($job->status == 'close' ? 'Closed' : 'Inactive') }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="text-xs font-semibold">{{ $job->approved_applicants }} /
                                                {{ $job->total_applicant }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span
                                                class="text-sm">{{ Carbon\Carbon::parse($job->created_at)->diffForHumans() }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                                <button @click="open = !open" class="focus:outline-none">
                                                    <svg class="w-6 h-6 text-gray-600" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                                    </svg>
                                                </button>
                                                <div x-show="open" @click.away="open = false"
                                                    x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95"
                                                    class="absolute right-0 bottom-10 z-10 origin-bottom-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    style="min-width: 150px">
                                                    <div class="py-1 flex">
                                                        <a href="{{ route('dashboard.company.jobDetail', $job->id) }}"
                                                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                        <a href="#"
                                                            class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td colspan="5" class="text-center">No Jobs</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@if ($pekerjaans->count() > 5)
    <div class="py-5">
        {{ $pekerjaans->links() }}
    </div>
@endif
