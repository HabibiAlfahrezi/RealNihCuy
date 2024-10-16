<div
  class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-4"
>
  <div class="mb-3 justify-between gap-4 sm:flex">
    <div>
      <h4 class="text-xl font-bold text-black dark:text-white">
        Top Applied Jobs
      </h4>
    </div>
  </div>
  <div class="mb-2">
    <div id="chartThree" class="mx-auto flex justify-center"></div>
  </div>
  <div class="-mx-8 flex flex-wrap items-center justify-center gap-y-3">
    @foreach($topJobs as $index => $job)
    <div class="w-full px-8 ">
      <div class="flex w-full items-center">
      
        <p
          class="flex w-full justify-between text-sm font-medium text-black dark:text-white"
        >
          <span> {{ $job->title }} </span>
          <span> {{ $job->application_count }} </span>
        </p>
      </div>
    </div>
    @endforeach
  </div>
</div>
