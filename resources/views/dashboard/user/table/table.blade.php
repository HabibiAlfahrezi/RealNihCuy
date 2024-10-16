<div
  class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark  xl:pb-1 "
>
  <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
    Top Popular Jobs
  </h4>

  <div class="flex flex-col">
    <div
      class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-3"
    >
      <div class="p-2.5 xl:p-3">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Jobs</h5>
      </div>
      <div class="p-2.5 text-center xl:p-3">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Visitors</h5>
      </div>
      <div class="p-2.5 text-center xl:p-3">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Applicant</h5>
      </div>
    </div>
    
    @foreach ($topJobs as $job)
    <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-3">
        <!-- Bagian Nama dan Logo Perusahaan -->
        <div class="flex items-center gap-3 p-2.5 xl:p-3">
            <div class="flex-shrink-0">
                <!-- Pastikan Anda memiliki URL atau path yang benar untuk logo perusahaan -->
                <img src="{{ asset('storage/' . $job->company->logo) }}" alt="{{ $job->company->name }}" class="w-12 h-12 rounded-full"/>
            </div>
            <p class="hidden font-medium text-black dark:text-white sm:block">
                {{ $job->title }}
            </p>
        </div>

        <!-- Bagian Total View -->
        <div class="flex items-center justify-center p-2.5 xl:p-3">
            <p class="font-medium text-black dark:text-white">{{ $job->views_count }}</p>
        </div>

        <!-- Bagian Total Pelamar / Max Applicant -->
        <div class="flex items-center justify-center p-2.5 xl:p-3">
            <p class="font-medium text-meta-3">{{ $job->hired_count }} / {{ $job->total_applicant }}</p>
        </div>
    </div>
@endforeach





  </div>
</div>
