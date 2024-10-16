@extends('home.layouts.dummy')

@section('content')
<div x-data="leadPreview()" class="max-w-2xl mx-auto bg-white rounded-lg shadow-sm p-6 w-full">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Applicant Preview</h2>
        <a href="{{ route('dashboard.company.applicationDetail', $applicants->id) }}" class="text-blue-600 hover:underline text-sm">View full details →</a>
    </div>
    
    <div class="flex items-center mb-6">
        <div class="w-12 h-12 bg-purple-200 rounded-full mr-4">
            <img src="{{ asset('storage/' . $profile->image)  }}" alt="">
        </div>
        <div>
            <h3 class="font-semibold">{{ $profile->name }}</h3>
            <p class="text-sm text-gray-600">{{ $profile->userSocial->email }}</p>
        </div>
        <div class="ml-auto flex space-x-2">
            <button @click="showMore()" class="text-gray-400 hover:text-gray-600">•••</button>
        </div>
    </div>
    
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div>
            <p class="text-sm text-gray-600">Company</p>
            <p class="font-semibold">{{ $applicants->company->name }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Job Title</p>
            <p class="font-semibold">{{ $applicants->pekerjaan->title }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Expected salary</p>
            <p class="font-semibold">RP. {{ number_format($profile->expected_salary) }}</p>
        </div>
        
       
    </div>
    
    <div class="mb-6">
        <div class="flex gap-x-2">
            <template x-for="tab in tabs" :key="tab.id">
                <button @click="activeTab = tab.id" 
                        :class="{ 'bg-green-500 text-white': activeTab === tab.id, 'bg-gray-200 text-gray-700': activeTab !== tab.id }" 
                        class="px-4 py-2 rounded-lg text-sm w-32 h-10 flex items-center justify-center"
                        x-text="tab.name"></button>
            </template>
        </div>
    </div>
    
    <div x-show="activeTab === 'new'" class="mb-6 min-h-[200px]">
        <div class="mb-6">
            <p class="text-sm text-gray-600 mb-2">Current Job: <span class="font-semibold">{{ $profile->current_job }}</span></p>
            <p class="text-sm text-gray-600">Last activity: 2 Jan 2020 at 10:00 AM</p>
        </div>
{{--         
        <div class="mb-6">
            <div class="flex justify-between items-center mb-2">
                <h4 class="font-semibold">Upcoming Activity <span class="bg-gray-200 rounded-full px-2 text-sm">2</span></h4>
                <a href="#" class="text-primary hover:underline text-sm">View all activity →</a>
            </div>
            <div class="bg-gray-100 p-4 rounded">
 
                <div class="flex justify-between items-center text-sm">
                    <p class="font-semibold mb-3">Prepare quote for Jerome Bell</p>
     
                </div>
                <p class="text-sm text-gray-600 mb-4">She's interested in our new product line and wants our very best price. Please include a detailed breakdown of costs.</p>
                
            </div>
        </div> --}}

        <div>
            <div class="flex justify-between items-center mb-2">
                <h4 class="font-semibold">Notes <span class="bg-gray-200 rounded-full px-2 text-sm">{{ $applicants->note->count() }}</span></h4>
                <button @click="$dispatch('open-modal', 'note')" class="border border-borderAbu rounded-lg p-1 hover:border-primary transition-colors">
                    <img src="{{ asset ('image/icon/plus.png') }}" class="w-6 h-6" alt="Edit">
                  </button>
            </div>
            <div class="space-y-4">
                @foreach ($applicants->note as $note)  
                    <div class="bg-gray-100 p-4 rounded mb-2">
                        <div class="flex mb-2 justify-between items-center">
                            <p class="text-sm ">📝 Note by {{ $note->company->name }}</p>
                            <a href="{{ route('company.note.delete', $note->id) }}">
                                <div>
                                    <img src="{{ asset('image/icon/delete.png') }}" class="w-5 h-5" alt="">
                                </div>
                            </a>
                        </div>
                        <p class="text-sm text-gray-600">{{ $note->note }}</p>
                        <p class="text-sm text-gray-500 mt-2" >{{ \Carbon\Carbon::parse($note->created_at)->diffForHumans() }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div x-show="activeTab === 'experience'" class="mb-6 min-h-[200px]">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-900 ">All Experiences</h3>
            <div class="flex space-x-2">
        
            </div>
          </div>
          <div class="space-y-7">
            <!-- Experience Item -->
            @foreach ($profile->userExperience as $experience)
              <div class="flex items-start space-x-4 border-b border-borderAbu pb-7">
                <img src="{{ asset('storage/'. $experience->image) }}" alt="Company Logo" class="w-12 h-12 rounded-full" />
                <div class="flex-grow">
                  <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                      <h4 class="font-bold text-gray-800 text-lg">{{ $experience->company }}</h4>
                      <p class="text-gray-600 py-0.5 px-1 bg-gray-100">{{ $experience->type }}</p>
                    </div>
                   
                    
                    
                  </div>
                  <div class="flex items-center space-x-2 ">
                    <p class="text-gray-600 ">
                      {{ $experience->title }} &#8226; <!-- Unicode character for a bullet point -->
                    </p>
                    <p class="text-gray-500">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                  </div>
                  <div>
                    <p class="text-gray-500 mt-3">{{ Str::limit($experience->description, 150) }}</p>
                  </div>
                </div>
              </div>
            @endforeach
            <!-- Add more experience items here... -->
          </div>
  
  
          <!-- Education Section -->
          <div class="flex justify-between items-center my-6">
            <h3 class="text-2xl font-semibold text-gray-900 ">All Education</h3>
            <div class="flex space-x-2">
            
            </div>
          </div>
          <div class="space-y-7">
            @foreach ($profile->userEducation as $education)
              <div class="flex items-start space-x-4  border-b border-borderAbu pb-7">
                <img src="{{ asset('storage/'. $education->image)  }}" alt="University Logo" class="w-12 h-12 rounded-full " />
                <div class="flex-grow">
                  <div class="flex justify-between items-center">
                    <h4 class="font-bold text-gray-800">{{ $education->title }}</h4>
                  </div>
                  <p class="text-gray-600 mb-4">{{ Str::limit($education->description, 150) }}</p>
                  <p class="text-gray-500">{{ $education->start_date }} &#8226; {{ $education->location }}</p>
                </div>
              </div>
            @endforeach
  
            <!-- Add more education items here... -->
          </div>
    </div>

    <div x-show="activeTab === 'resume'" class="mb-6 min-h-[200px]">
        <!-- Resume Section -->
        <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Resume</h3>
        <div class="flex space-x-2">
        
        </div>
        </div>
        <div class="flex justify-between items-center border-b border-borderAbu pb-4 mb-4">
        <div class="flex items-center">
            <!-- Tambahkan bg untuk ikon PDF -->
            <div class="bg-gray-100 rounded-full p-3">
            <i class="fas fa-file-pdf "></i> 
            </div>
            <p class="text-gray-700 ml-3">
            {{ $profile->userDocument->first()?->document ? $profile->name : 'No Resume' }}
            </p>
        </div>
        <a href="{{ asset('storage/' . ($profile->userDocument->first()->document ?? '')) }}" 
            type="button" 
            class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded flex items-center">
            <!-- Tambahkan bg untuk ikon download -->
            <div class="rounded-full p-1 mr-2">
            <i class="fas fa-download"></i> 
            </div>
            Download
        </a>
        
        </div>
    </div>
</div>

<script>
    function leadPreview() {
        return {
            activeTab: 'new',
            tabs: [
                { id: 'new', name: 'Preview' },
                { id: 'experience', name: 'Experience' },
                { id: 'resume', name: 'Resume' },
            ],
            showMore() {
                alert('Show more options');
            }
        }
    }
</script>


{{-- Note --}}
<x-modal id="note">
    <div x-data class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900">
            Add Note
        </div>
  
        <div class="mt-4">
            <form action="{{ route('company.note') }}" method="POST">
                @csrf
                <input type="hidden" name="applicant_id" value="{{ $applicants->id }}" id="">
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="3" class="mt-1 px-4 py-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="$dispatch('close-modal')" class="mr-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Create</button>
                </div>
            </form>
        </div>
    </div>
  </x-modal>
  
@endsection