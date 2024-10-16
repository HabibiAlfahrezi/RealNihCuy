<div class="w-full rounded-lg shadow-sm mt-4" x-data="applicantList()">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-sm font-semibold tracking-wide text-left text-gray-600 uppercase bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-3 md:px-6 py-3 min-w-[200px]">Full Name</th>
                    <th class="px-3 md:px-6 py-3 min-w-[150px]">Hiring Stage</th>
                    <th class="px-3 md:px-6 py-3 min-w-[150px]">Applied Date</th>
                    <th class="px-3 md:px-6 py-3 min-w-[200px]">Job Role</th>
                    <th class="px-3 md:px-6 py-3 min-w-[150px]">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($applications as $application)
                    <tr class="text-gray-700 dark:text-gray-400 text-base">
                        <td class="px-3 md:px-6 py-3 min-w-[200px]">
                            <div class="flex items-center">
                                <div class="relative hidden w-10 h-10 mr-4 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="{{ asset('storage/' . $application->user->profile->image) }}" alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold ">{{ $application->user->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">10x Developer</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 md:px-6 py-3 min-w-[150px]">
                            <span class="bg-gradient-to-tl 
                                {{ $application->stage == 'inreview' ? 'from-yellow-400 to-yellow-600' : '' }} 
                                {{ $application->stage == 'approved' ? 'from-green-600 to-lime-400' : '' }} 
                                {{ $application->stage == 'rejected' ? 'from-red-600 to-red-400' : '' }} 
                                px-4 py-3 rounded-lg inline-block text-white text-center font-bold uppercase leading-none text-sm">
                                {{ $application->stage == 'inreview' ? 'In Review' : ($application->stage == 'approved' ? 'Approved' : ($application->stage == 'rejected' ? 'Rejected' : 'Unknown')) }}
                            </span>
                        </td>
                        <td class="px-3 md:px-6 py-3 min-w-[150px] text-sm">
                            {{ Carbon\Carbon::parse($application->created_at)->format('d - m - Y') }}
                        </td>
                        <td class="px-3 md:px-6 py-3 min-w-[200px] text-sm">
                            {{ $application->pekerjaan->title }}
                        </td>
                        <td class="px-3 md:px-6 py-3 min-w-[160px] md:w-auto">
                            <a class="px-4 py-2 block md:inline-block bg-primary text-white rounded-lg font-semibold" href="{{ route('dashboard.company.applicationDetail', $application->id) }}">
                                See Applicant
                            </a>
                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-600">No Applications</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 pb-4 md:px-4">
        {{ $applications->appends(request()->query())->links() }}
    </div>

</div>