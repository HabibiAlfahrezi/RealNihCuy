@extends('dashboard.layouts.base')
@section('content')
<section class="">
  <div class="flex flex-col bg-white">
  <!-- Menampilkan pesan jika ada -->


      @include('dashboard.components.partials.alert')

      <!-- Tab Navigation -->
        <div class="flex justify-center md:justify-start border-b border-gray-300">
        <button id="profile-tab" class="py-3 px-3 md:px-6 text-gray-600 border-b-2 border-transparent hover:text-primary hover:border-primary focus:outline-none transition-colors">
            My Profile
        </button>
        <button id="login-tab" class="py-3 px-3 md:px-6 text-gray-600 border-b-2 border-transparent hover:text-primary hover:border-primary focus:outline-none transition-colors">
            Login Details
        </button>
        <button id="profesional-tab" class="py-3 px-3 md:px-6 text-gray-600 border-b-2 border-transparent hover:text-primary hover:border-primary focus:outline-none transition-colors">
            Profesional Detail
        </button>
    </div>


      <!-- Tab Content -->
      <div id="tab-content" class="px-4">
          <!-- Profile Content -->
          <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="profile-content" class="">
                <div class=" md:border-b border-gray-200 pt-6 pb-10 md:py-10">
                    <h4 class="text-lg font-semibold">Basic Information</h4>
                    <p>This is your personal information that you can update anytime.</p>
                </div>
                <div class="w-full md:grid grid-cols-6 md:py-10 md:border-b border-borderAbu">
                  <div class="col-span-2">
                      <h4 class="font-semibold text-lg">Profile Photo</h4>
                      <p>This image will be shown publicly as your profile picture, it will help recruiters recognize you!</p>
                  </div>
                  <div class="col-span-3">
                    <div class="">
                      <div class="mb-4 md:flex items-center gap-3">
                        <div class="md:h-32 md:w-32 mt-4 mb-2 rounded-full">
                          @if (Auth::user()->profile->image)
                            <img src="{{ asset('storage/' . Auth::user()->profile->image) }}" class="w-16 h-16 md:w-full md:h-full rounded-full" alt="User" />
                          @else
                            <img src="{{ asset('img/avatar.jpg') }}" class="w-16 h-16 md:w-full md:h-full rounded-full" alt="User" />
                          @endif
                        </div>
                        <div class="md:w-80 border-2 border-dashed border-primary rounded-lg p-4">
                          <label for="file-input" class="block">
                            <div class="text-center mb-4">
                              <svg class="w-12 h-12 mx-auto mb-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                              </svg>
                              <p class="text-primary">Click to replace or drag and drop</p>
                              <p class="text-sm text-red-300">SVG, PNG, JPG or GIF (max. 400 x 400px)</p>
                            </div>
                            <input type="file" id="file-input" name="image" accept="image/*" class="hidden" onchange="updateFileName(this)">
                          </label>
                          <p id="file-name" class="mt-2 text-sm text-gray-600"></p>
                        </div>
                      </div> 
                    </div>
                  </div>
                </div>

                
              
                <div class="md:grid grid-cols-6 py-10 md:border-b border-gray-200 ">
                  <div class="col-span-2">
                      <h4 class="text-lg font-semibold mb-2">Personal Details</h4>
                  </div>
                  <div class="space-y-4 col-span-3">
                      <div class="md:grid grid-cols-1 md:grid-cols-2 flex flex-col gap-y-4 md:gap-4 md:px-4">
                          <div class="flex flex-col col-span-2">
                              <label for="full-name" class="text-gray-700 font-medium">Full Name</label>
                              <input id="full-name" name="name" value="{{ old('name', $profile->name ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                              @error('name')
                              <p class="text-red-500">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="flex flex-col">
                              <label for="phone" class="text-gray-700 font-medium">Phone</label>
                              <input id="phone" name="phone" value="{{ old('phone', $profile->userSocial->phone ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                              @error('phone')
                              <p class="text-red-500">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="flex flex-col">
                              <label for="email" class="text-gray-700 font-medium">Email</label>
                              <input id="email" name="email" value="{{ old('email', $profile->userSocial->email ?? '') }}" type="email" class="mt-1 p-2 border border-gray-300 rounded-md">
                              @error('email')
                              <p class="text-red-500">{{ $message }}</p>
                            @enderror
                          </div>
                          <div class="flex flex-col">
                              <label for="dob" class="text-gray-700 font-medium">Date of Birth</label>
                              <input id="dob" name="birth_date" type="date" value="{{ old('birth_date', $profile->birth_date  ?? '') }}" class="mt-1 p-2 border border-gray-300 rounded-md">
                              @error('birth_date')
                              <p class="text-red-500">{{ $message }}</p>
                            @enderror
                          </div>

                      </div>
                  </div>
                </div>

                
                <div class="md:grid grid-cols-6 pb-10 md:py-10 md:border-b border-gray-200">
                    <div class="col-span-2">
                        <h4 class="text-lg font-semibold mb-2">About You</h4>
                    </div>
                    <div class="flex flex-col col-span-3 md:px-3">
                        <label for="description" class="text-gray-700 font-medium">Description</label>
                        <textarea id="description" name="description" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md">{{ old('description', $profile->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500">{{ $message }}</p>
                      @enderror
                    </div>
                </div>
                <div class="flex justify-end mb-4">
                    <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-red-300 focus:outline-none focus:shadow-outline-purple"> 
                        <span>{{ Auth::user()->profile ? 'Update' : 'Save' }}</span> Profile
                    </button>
                </div>
            </div>
          </form>

          <!-- Login Details Content -->
          <div id="login-content" class="w-full  hidden">
            <form action="">
              <div class=" border-b border-gray-200 pt-6 md:py-10">
                  <h4 class="text-lg font-semibold">Basic Information</h4>
                  <p>This is your personal information that you can update anytime.</p>
              </div>
              <div class="w-full md:grid grid-cols-6 py-10 md:border-b border-gray-200">
                  <div class="col-span-2">
                      <h4 class="font-semibold text-lg">Update Email</h4>
                      <p>Update your email address to make sure it is safe</p>
                  </div>
                  <div class="col-span-3 md:px-4">
                      <div class="mt-4 md:mt-0 md:mb-2">
                          <h4 class="font-bold text-md md:text-lg">{{ Auth::user()->email }}</h4>
                          <p>Your email address is verified</p>
                      </div>

                      <div class="flex flex-col mt-2 md:mt-0 mb-3">
                          <label for="" class="text-gray-700 font-medium">Update Email</label>
                          <input id="" type="email" class="mt-1 p-2 border border-gray-300 rounded-md">
                      </div>
                      <div class="">
                          <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-red-300 focus:outline-none focus:shadow-outline-purple"> 
                              Update Email
                          </button>
                      </div>
                  </div>
              </div>
            </form>

              
              <form>
                <div class="md:grid grid-cols-6 pb-10 md:py-10 md:border-b border-gray-200 ">
                    <div class="col-span-2">
                        <h4 class="text-lg font-semibold mb-2">New Password</h4>
                        <p>Manage your password to make sure it is safe</p>
                    </div>
                    <div class="space-y-4 col-span-3 mt-2 md:mt-0">
                        <div class="grid gap-4 md:px-4">
                            <div class="flex flex-col">
                                <label for="password" class="text-gray-700 font-medium">Old Password</label>
                                <input id="password" type="password" class="mt-1 p-2 border border-gray-300 rounded-md">
                                <p>Minimum 8 Characters</p>
                            </div>

                            <div class="flex flex-col">
                                <label for="password" class="text-gray-700 font-medium">New Password</label>
                                <input id="password" type="password" class="mt-1 p-2 border border-gray-300 rounded-md">
                                <p>Minimum 8 Characters</p>
                            </div>
                            <div class="mb-4 md:mb-0">
                                <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-red-300 focus:outline-none focus:shadow-outline-purple"> 
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
          </div>



          <div id="profesional-content" class="w-full  hidden">
            <div class=" border-b border-gray-200 pt-6 md:py-10">
                <h4 class="text-lg font-semibold">Basic Information</h4>
                <p>This is your personal information that you can update anytime.</p>
            </div>  
            <form action="{{ route('user.other.update') }}" method="POST">
              @csrf
              <div class="md:grid grid-cols-6 py-10 md:border-b border-gray-200 ">
                <div class="col-span-2">
                    <h4 class="text-lg font-semibold mb-2">Personal Details</h4>
                </div>
                <div class="space-y-4 col-span-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:px-4">
                        <div class="flex flex-col">
                            <label for="location" class="text-gray-700 font-medium">Location</label>
                            <input id="location" name="address" value="{{ old('address', $profile->address ?? '') }}" type="location" class="mt-1 p-2 border border-gray-300 rounded-md">
                            @error('address')
                            <p class="text-red-500">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="gender" class="text-gray-700 font-medium">Gender</label>
                            <select id="gender" name="gender" class="mt-1 p-2 border border-gray-300 rounded-md">
                                <option value="">Select Gender</option>
                                <option {{ $profile->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                <option {{ $profile->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                            </select>
                            @error('gender')
                            <p class="text-red-500">{{ $message }}</p>
                          @enderror
                        </div> 
                        <div class="flex flex-col">
                            <label for="gender" class="text-gray-700 font-medium">Skill</label>
                            <div class="flex flex-col">
                              <select 
                              class="skills form-control" 
                              id="skills" 
                              name="skills[]" 
                              multiple="multiple">
                              @if (!empty($userSkill))
                                @foreach($allSkills as $skill) <!-- Menggunakan `allSkills` untuk mendapatkan semua skill yang tersedia -->
                                    <option value="{{ $skill->id }}" {{ in_array($skill->id, $userSkill) ? 'selected' : '' }}>
                                        {{ $skill->title }}
                                    </option>
                                @endforeach
                              @else
                                  <p>No skills found.</p>
                              @endif
                            </select>
                            @error('skills')
                            <p class="text-red-500">{{ $message }}</p>
                          @enderror
                          </div>
                        </div> 
                        <div class="flex flex-col">
                          <label for="position" class="text-gray-700 font-medium">Highest Position</label>
                          <input id="position" name="highest_position" value="{{ old('highest_position', $profile->highest_position ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                          @error('highest_position')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="flex flex-col">
                          <label for="year" class="text-gray-700 font-medium">Experience Year</label>
                          <input id="year" name="experience_year" value="{{ old('experience_year', $profile->experience_year ?? '') }}" type="number" class="mt-1 p-2 border border-gray-300 rounded-md">
                          @error('experience_year')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="flex flex-col">
                          <label for="languege" class="text-gray-700 font-medium">Languege</label>
                          <input id="languege" name="languege" value="{{ old('languege', $profile->language ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                          @error('languege')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        </div>


                        <div class="flex flex-col">
                          <label for="work_type" class="text-gray-700 font-medium">Work Type</label>
                          <input id="work_type" name="work_type" value="{{ old('work_type', $profile->work_type ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                          @error('work_type')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        </div>


                        <div class="flex flex-col">
                          <label for="expected_salary" class="text-gray-700 font-medium">Expected Salary</label>
                          <input id="expected_salary" name="expected_salary" value="{{ old('expected_salary', $profile->expected_salary ?? '') }}" type="text" class="mt-1 p-2 border border-gray-300 rounded-md">
                          @error('expected_salary')
                          <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        </div>
                        
                    </div>
                </div>
              </div>

                      
              <div class="md:grid grid-cols-6 pb-10 md:py-10 md:border-b border-gray-200">
                <div class="col-span-2">
                    <h4 class="text-lg font-semibold mb-2">Your experience</h4>
                </div>
                <div class="flex flex-col col-span-3 md:px-3">
                    <label for="experience" class="text-gray-700 font-medium">Experience</label>
                    <textarea id="experience" name="experience" rows="4" class="mt-1 p-2 border border-gray-300 rounded-md">{{ $profile->experience }}</textarea>
                    @error('experience')
                    <p class="text-red-500">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="flex justify-end mb-4 md:mb-0">
                  <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary hover:bg-red-300 focus:outline-none focus:shadow-outline-purple"> 
                      Save Profile
                  </button>
              </div>
            </form>
        </div>
      </div>
  </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const profileTab = document.getElementById('profile-tab');
        const loginTab = document.getElementById('login-tab');
        const profileContent = document.getElementById('profile-content');
        const loginContent = document.getElementById('login-content');
        const profesionalTab = document.getElementById('profesional-tab');
        const profesionalContent = document.getElementById('profesional-content');

        profileTab.addEventListener('click', function () {
            profileTab.classList.add('border-primary');
            loginTab.classList.remove('border-primary');
            profesionalTab.classList.remove('border-primary');
            profileContent.classList.remove('hidden');
            loginContent.classList.add('hidden');
            profesionalContent.classList.add('hidden');
        });

        loginTab.addEventListener('click', function () {
            loginTab.classList.add('border-primary');
            profileTab.classList.remove('border-primary');
            profesionalTab.classList.add('border-primary');
            loginContent.classList.remove('hidden');
            profileContent.classList.add('hidden');
            profesionalContent.classList.add('hidden');
        });

        profesionalTab.addEventListener('click', function () {
            loginTab.classList.remove('border-primary');
            profileTab.classList.remove('border-primary');
            profesionalTab.classList.add('border-primary');
            loginContent.classList.add('hidden');
            profileContent.classList.add('hidden');
            profesionalContent.classList.remove('hidden');
        });

        // Default tab
        profileTab.click();
    });

    $(document).ready(function() {
        $('.skills').select2({
            placeholder: 'Select Skills',
            allowClear: true,
            ajax: {
                url: "{{ route('user-skills') }}",
                type: "POST",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                        "_token": $('meta[name="csrf-token"]').attr('content')
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.title
                            };
                        })
                    };
                },
                cache: true
            }
        });  

    });

    function updateFileName(input) {
  const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
  document.getElementById('file-name').textContent = fileName;
}
</script>

@endsection