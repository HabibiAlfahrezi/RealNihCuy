<div class="mt-7 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
  <h4 class="text-xl mb-4 font-bold text-black dark:text-white">Job Statistic</h4>
  <div class="md:flex">
    <!-- Chart Container -->
    <div id="chartOne" class="md:flex-1  md:-ml-5">
      <div class="no-data-message hidden text-center py-4">
        <p class="text-gray-500 dark:text-gray-300">No data available</p>
      </div>
    </div>

    <!-- Cards Container -->
    <div class="flex md:flex-col md:-ml-5 md:mt-7 gap-x-4 md:gap-x-0 md:gap-y-4">
      <!-- Views Card -->
      <div id="viewsCard" class="bg-white border border-stroke rounded-lg p-3 shadow-sm dark:bg-boxdark dark:border-strokedark w-48">
        <div class="flex items-center justify-between mb-2">
          <h5 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Total Views</h5>
          <i class="fa fa-eye text-blue-500 text-lg"></i>
        </div>
        <div id="totalViews" class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $totalViews }}</div>
        <div id="viewsThisWeek" class="text-xs text-gray-600 dark:text-gray-400">
          This Week: <span id="viewsThisWeekValue" class="font-semibold">{{ $totalViews }}</span>
        </div>
        <div id="viewsIncrease" class="text-xs text-green-500 mt-1">
          Increase: <span id="viewsIncreaseValue" class="font-semibold">0%</span>
        </div>
      </div>

      <!-- Applied Card -->
      <div id="appliedCard" class="bg-white border border-stroke rounded-lg p-3 shadow-sm dark:bg-boxdark dark:border-strokedark w-48">
        <div class="flex items-center justify-between mb-2">
          <h5 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Total Applied</h5>
          <i class="fa fa-users text-green-500 text-lg"></i>
        </div>
        <div id="totalApplied" class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $jobs ? $jobs->company->applicant->count() : 0 }}</div>
        <div id="appliedThisWeek" class="text-xs text-gray-600 dark:text-gray-400">
          This Week: <span id="appliedThisWeekValue" class="font-semibold">{{ $jobs ? $jobs->company->applicant->count() :  0 }}</span>
        </div>
        <div id="appliedIncrease" class="text-xs text-green-500 mt-1">
          Increase: <span id="appliedIncreaseValue" class="font-semibold">0%</span>
        </div>
      </div>
    </div>
  </div>
</div>
