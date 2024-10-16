@extends('dashboard.layouts.base')

@section('content')
<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
  <div class="flex items-start justify-between">
    <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
      Tech List
    </h4>
    <div class="flex space-x-2">
      <!-- Add Button -->
      <button @click="$dispatch('open-modal', 'tech')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
        <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Add">
      </button>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="min-w-[640px] rounded-sm bg-gray-2 dark:bg-meta-4">
            <div class="grid grid-cols-4">
                <div class="pr-3.5 py-3.5 xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Title</h5>
                </div>
                <div class="pr-3.5 py-3.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Total Jobs</h5>
                </div>
                <div class="pr-3.5 py-3.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Status</h5>
                </div>
                <div class="pr-3.5 py-3.5 xl:p-5">
                  <h5 class="text-sm font-medium text-center uppercase xsm:text-base">Action</h5>
                </div>
            </div>
            
            <div>
                @foreach ($techs as $tech)
                <div class="grid grid-cols-4 border-b border-stroke dark:border-strokedark">
                    <div class="md:flex items-center gap-3 pr-3.5 py-3.5 xl:p-5">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $tech->logo) }}" class="h-12 w-12" alt="Brand" />
                        </div>
                        <p class="font-medium text-black dark:text-white ">
                            {{ $tech->name }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ $tech->company->count() }} Jobs</p>
                    </div>

                    <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                        <span class="bg-gradient-to-tl {{ $tech->status == 'active' ? 'from-green-600 to-lime-400' : ($tech->status == 'close' ? 'from-red-600 to-red-400' : '') }} px-4 text-xs rounded-lg py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                            {{ $tech->status == 'active' ? 'Active' : ($tech->status == 'close' ? 'Closed' : 'Inactive') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-center py-3.5 xl:p-5">
                      <a href="{{ route('delete.user', $tech->id) }}" data-modal-target="delete-user-modal" data-modal-toggle="delete-user-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                          Delete
                      </a>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

  <div class="mt-5">
    {{ $techs->links() }}
  </div>
</div>





<x-mainModal id="tech">
  <div x-data class="">
    <x-slot name="header">
      <h4 class="text-xl font-bold text-gray-900 ">
        Create New Tech Stack
      </h4>
    </x-slot>

    <form action="{{ route('admin.tech') }}" id="techForm" method="POST" class="space-y-2" enctype="multipart/form-data">
      @csrf
      
      <!-- Image Upload -->
      <div>
        <label for="image2" class="block text-sm font-medium text-gray-700 mb-2">
          Image
        </label>
        <input
          name="logo"
          type="file"
          class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
        />
      </div>

      <!-- Title Field -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
          Title
        </label>
        <input 
          type="text" 
          name="name" 
          id="title" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
        >
      </div>


      <!-- Form Actions -->
      <x-slot name="footer">
        <button type="button" @click="isModalOpen = false" class="w-full mt-6 md:mt-0 px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
        </button>
        <button type="submit" form="techForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-primary focus:outline-none focus:shadow-outline-purple">
            Add Tech
        </button>
      </x-slot>
    </form>
  </div>
</x-mainModal>

@endsection