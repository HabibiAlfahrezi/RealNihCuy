<div
  class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8"
>
  <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
    Top Companies
  </h4>

  <div class="flex flex-col">
    <div
      class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5"
    >
      <div class="p-2.5 xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Name</h5>
      </div>
      <div class="p-2.5 text-center xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Total Jobs</h5>
      </div>
      <div class="p-2.5 text-center xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Created At</h5>
      </div>
      <div class="hidden p-2.5 text-center sm:block xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Applicant</h5>
      </div>
      <div class="hidden p-2.5 text-center sm:block xl:p-5">
        <h5 class="text-sm font-medium uppercase xsm:text-base">Status</h5>
      </div>
    </div>
    @foreach ( $companies as $company )
      
    <div
      class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5"
    >
      <div class="flex items-center gap-3 p-2.5 xl:p-5">
        <div class="flex-shrink-0">
          <img src="{{ asset('storage/' . $company->logo) }}" class="h-12 w-12" alt="Brand" />
        </div>
        <p class="hidden font-medium text-black dark:text-white sm:block">
          {{ $company->name }}
        </p>
      </div>

      <div class="flex items-center justify-center p-2.5 xl:p-5">
        <p class="font-medium text-black dark:text-white">{{ $company->pekerjaan->count() }}</p>
      </div>

      <div class="flex items-center justify-center p-2.5 xl:p-5">
        <p class="font-medium text-meta-3">{{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</p>
      </div>

      <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
        <p class="font-medium text-black dark:text-white">{{ $company->applicant->count() }}</p>
      </div>

      <div class="hidden items-center justify-center p-2.5 sm:flex xl:p-5">
        <p class="font-medium text-meta-5">{{ $company->role ?? 'Not Premium' }}</p>
      </div>
    </div>
    @endforeach

  </div>
</div>
