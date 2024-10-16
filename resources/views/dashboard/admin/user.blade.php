@extends('dashboard.layouts.base')
@section('content')
<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">

    <div class="flex items-start justify-between">
        <h4 class="mb-4 text-xl font-bold text-black dark:text-white">
        User List
        </h4>
    </div>

    <div class="flex flex-wrap">
        <div class="flex-none w-full max-w-full">
            <div class="relative flex flex-col min-w-0  break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto ">
                    <div class="overflow-x-auto">
                        <div class="min-w-[800px]">
                            <div class="grid grid-cols-5 ">
                                <div class="pr-3.5 py-3.5 xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base">User</h5>
                                </div>
                                <div class="pr-3.5 py-3.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base">Current Job</h5>
                                </div>
                                <div class="pr-3.5 py-3.5 text-center xl:p-5">
                                    <h5 class="text-sm font-medium uppercase xsm:text-base">Status</h5>
                                </div>
                                <div class="pr-3.5 py-3.5 xl:p-5">
                                <h5 class="text-sm font-medium text-center uppercase xsm:text-base">Role</h5>
                                </div>
                                <div class=" py-3.5 xl:p-5">
                                <h5 class="text-sm font-medium text-center uppercase xsm:text-base">Action</h5>
                                </div>
                            </div>
        
                            @foreach ($users as $user)
                            <div class="grid grid-cols-5 border-b border-stroke dark:border-strokedark">
                                <div class="flex items-center pr-3.5 py-3.5 xl:p-5">
                                    <div class="flex-shrink-0">
                                        @if ($user->profile)
                                            <img src="{{ asset('storage/' . $user->profile->image) }}" class="h-9 w-9 rounded-xl" alt="{{ $user->name }}" />
                                        @else 
                                            <img src="{{ asset('img/avatar.jpg') }}" class="h-9 w-9 rounded-xl" alt="{{ $user->name }}" />
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center ml-3">
                                        <h6 class="mb-0 text-sm leading-normal">{{ $user->name }}</h6>
                                        <p class="mb-0 text-xs leading-tight">{{ $user->email }}</p>
                                    </div>
                                </div>
            
                                <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                                    @if ($user->profile)
                                        <p class="mb-0 text-xs font-semibold leading-tight">{{ $user->profile->current_job }}</p>
                                    @else
                                        <p class="mb-0 text-xs font-semibold leading-tight">No Job</p>
                                    @endif
                                    <p class="mb-0 text-xs leading-tight">{{ $user->organization }}</p>
                                </div>
            
                                <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                                    <span class="bg-gradient-to-tl {{ $user->email != Null ? 'from-green-600 to-lime-400' : 'from-slate-600 to-slate-300' }} px-4 text-xs rounded-lg py-2 inline-block font-bold uppercase text-white">{{ $user->email != Null ? 'Active' : 'Inactive' }}</span>
                                </div>
                                
                                <div class="flex items-center justify-center pr-3.5 py-3.5 xl:p-5">
                                    <span class="text-xs font-semibold leading-tight capitalize">{{ $user->prosesi }}</span>
                                </div>
            
                                <div class="flex items-center justify-center py-3.5 xl:p-5">
                                    <a href="{{ route('delete.user', $user->id) }}" data-modal-target="delete-user-modal" data-modal-toggle="delete-user-modal" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
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
        </div>
    </div>
    <div class=" mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
