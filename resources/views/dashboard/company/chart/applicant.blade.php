<div class="w-full mx-auto  lg:mt-6 p-4 border border-borderAbu font-sans md:h-56 ">
    <h4 class="text-xl mb-4 font-bold text-black dark:text-white">Applicant Statistic</h4>
    <div class="text-4xl mb-4 text-dark font-bold">{{ $totalApplicants }} <span class="text-lg font-normal text-grey">Applicants</span></div>
    <div class="flex h-2 mb-4  rounded">
        @foreach($jobTypeCounts as $type => $count)
            <div class="flex-grow h-full"
                 style="width: {{ ($count / $totalApplicants) * 100 }}%; background-color: {{ $loop->iteration == 1 ? '#9f7aea' : ($loop->iteration == 2 ? '#48bb78' : ($loop->iteration == 3 ? '#4299e1' : ($loop->iteration == 4 ? '#f6ad55' : '#e53e3e'))) }};"></div>
        @endforeach
    </div>
    <div class="flex flex-wrap mt-2">
        @foreach($jobTypeCounts as $type => $count)
            <div class="flex items-center mr-4 mb-2">
                <span class="block w-3 h-3 mr-2 rounded" style="background-color: {{ $loop->iteration == 1 ? '#9f7aea' : ($loop->iteration == 2 ? '#48bb78' : ($loop->iteration == 3 ? '#4299e1' : ($loop->iteration == 4 ? '#f6ad55' : '#e53e3e'))) }};"></span>
                {{ $type }} : {{ $count }}
            </div>
        @endforeach
    </div>
</div>
