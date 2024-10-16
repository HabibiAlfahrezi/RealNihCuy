@extends('dashboard.layouts.base')

@section('content')
<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
  <div class="flex items-start justify-between">
    <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
      Skill List
    </h4>
    <div class="flex space-x-2">

      <!-- Add Button -->
      <button @click="$dispatch('open-modal', 'skill')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
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
                @foreach ($skills as $skill)
                <div class="grid grid-cols-4 border-b border-stroke dark:border-strokedark">
                    <div class="flex items-center pr-3.5 py-3.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ $skill->title }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">{{ optional($skill->pekerjaan)->count() ?? 0 }} Jobs</p>
                    </div>

                    <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                        <span class="bg-gradient-to-tl {{ $skill->status == 'active' ? 'from-green-600 to-lime-400' : ($skill->status == 'close' ? 'from-red-600 to-red-400' : '') }} px-4 text-xs rounded-lg py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                            {{ $skill->status == 'active' ? 'Active' : ($skill->status == 'close' ? 'Closed' : 'Inactive') }}
                        </span>
                    </div>
                    <div class="flex items-center justify-center py-3.5 xl:p-5">
                      <a href="{{ route('delete.user', $skill->id) }}" data-modal-target="delete-user-modal" data-modal-toggle="delete-user-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
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

  <div class="mt-4">
    {{ $skills->links() }}
  </div>
</div>



<x-mainModal id="skill">
  <div x-data class=" py-4">
    <x-slot name="header">
      <h4 class="text-xl font-bold text-gray-900 ">
        Create New Skill
      </h4>
    </x-slot>

    <form action="{{ route('admin.skill') }}" id="skillForm" method="POST" class="space-y-2" enctype="multipart/form-data">
      @csrf
      


      <!-- Title Field -->
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
          Title
        </label>
        <input 
          type="text" 
          name="title" 
          id="title" 
          class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
        >
      </div>


      <!-- Form Actions -->
      <x-slot name="footer">
        <button type="button" @click="isModalOpen = false" class="w-full mt-6 md:mt-0 px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto hover:border-gray-500 focus:border-gray-500 focus:outline-none focus:shadow-outline-gray">
            Cancel
        </button>
        <button type="submit" form="skillForm" class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 hover:bg-indigo-700 focus:outline-none focus:shadow-outline-purple">
            Add Skill
        </button>
      </x-slot>
    </form>
  </div>
</x-mainModal>


@endsection