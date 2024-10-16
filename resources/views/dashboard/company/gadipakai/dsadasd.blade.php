@extends('dashboard.layouts.base')
@section('content')
<section class="mt-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col bg-white rounded-lg shadow-lg">
            <!-- Tab Navigation -->
            <div class="flex border-b border-gray-300">
                <button id="profile-tab" class="py-2 px-4 text-gray-600 border-b-2 border-transparent hover:border-blue-500 focus:outline-none transition-colors">
                    Profile
                </button>
                <button id="login-tab" class="py-2 px-4 text-gray-600 border-b-2 border-transparent hover:border-blue-500 focus:outline-none transition-colors">
                    Login Details
                </button>
            </div>


            <!-- Tab Content -->
            <div id="tab-content" class="px-4">
                <!-- Profile Content -->
                <div id="profile-content" class="px-4 py-6">
                    <div class="border-b border-gray-300 py-6">
                        <h4 class="text-lg font-semibold">Basic Information</h4>
                        <p class="text-gray-600">This is your personal information that you can update anytime.</p>
                    </div>

                    <form>
                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="grid grid-cols-3 col-span-2">
                                <div class="col-span-2">
                                    <h4 class="text-lg font-semibold mb-2">Job Title</h4>
                                    <p class="text-gray-600">Job titles must describe one position</p>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="flex flex-col">
                                            <input id="full-name" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                            <p class="text-gray-600 mt-1">At least 80 characters</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="grid grid-cols-3 col-span-2">
                                <div class="col-span-2">
                                    <h4 class="text-lg font-semibold mb-2">Type of Employment</h4>
                                    <p class="text-gray-600">You can select multiple types of employment</p>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <div class="space-y-4">
                                    <div class="flex flex-col gap-4">
                                        <div>
                                            <input type="checkbox" id="full-time">
                                            <label for="full-time" class="ml-2">Full-Time</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="part-time">
                                            <label for="part-time" class="ml-2">Part-Time</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="contract">
                                            <label for="contract" class="ml-2">Contract</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="internship">
                                            <label for="internship" class="ml-2">Internship</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="temporary">
                                            <label for="temporary" class="ml-2">Temporary</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="grid grid-cols-3 col-span-2">
                                <div class="col-span-2">
                                    <h4 class="text-lg font-semibold mb-2">Salary</h4>
                                    <p class="text-gray-600">Please specify the estimated salary range for the role. *You can leave this blank</p>
                                </div>
                            </div>
                            <div class="col-span-4 grid grid-cols-2">
                                <div class="flex flex-col">
                                    <input id="salary" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="grid grid-cols-3 col-span-2">
                                <div class="col-span-2">
                                    <h4 class="text-lg font-semibold mb-2">Categories</h4>
                                    <p class="text-gray-600">You can select multiple job categories</p>
                                </div>
                            </div>
                            <div class="col-span-4 grid grid-cols-2">
                                <div class="flex flex-col">
                                    <label for="JobCategory" class="text-gray-700 font-medium">Category</label>
                                    <select id="JobCategory" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                                        <option value="">Select Category</option>
                                        <option value="technology">Technology</option>
                                        <option value="marketing">Marketing</option>
                                        <option value="sales">Sales</option>
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                            <div class="col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Required Skills</h4>
                                <p class="text-gray-600">Add required skills for the job</p>
                            </div>
                            <div class="col-span-4 grid grid-cols-2">
                                <div class="flex flex-col">
                                    <input id="required-skills" type="text" class="p-2 border border-gray-300 rounded-md w-full">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end py-6">
                            <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"> 
                                Next Step
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Login Details Content -->
                <div id="login-content" class="px-4 py-6 hidden">
                    <div class="border-b border-gray-300 py-6">
                        <h4 class="text-lg font-semibold">Details</h4>
                        <p class="text-gray-600">Add the description of the job, responsibilities, who you are, and nice-to-haves.</p>
                    </div>
                    <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                        <div class="grid grid-cols-3 col-span-2">
                            <div class="col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Job Descriptions</h4>
                                <p class="text-gray-600">Describe the job position</p>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-col">
                                <textarea id="job-description" class="p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                                <p class="text-gray-600 mt-1">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                        <div class="grid grid-cols-3 col-span-2">
                            <div class="col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Responsibilities</h4>
                                <p class="text-gray-600">Outline the core responsibilities of the position</p>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-col">
                                <textarea id="responsibilities" class="p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                                <p class="text-gray-600 mt-1">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                        <div class="grid grid-cols-3 col-span-2">
                            <div class="col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Who You Are</h4>
                                <p class="text-gray-600">Add preferred candidates qualifications</p>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-col">
                                <textarea id="who-you-are" class="p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                                <p class="text-gray-600 mt-1">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-6 gap-6 py-6 border-b border-gray-300">
                        <div class="grid grid-cols-3 col-span-2">
                            <div class="col-span-2">
                                <h4 class="text-lg font-semibold mb-2">Nice-to-Haves</h4>
                                <p class="text-gray-600">Optional skills or experiences</p>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-col">
                                <textarea id="nice-to-haves" class="p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                                <p class="text-gray-600 mt-1">Maximum 500 Characters</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end py-6">
                        <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Submit
                        </button>
                    </div>
                </div>
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

        profileTab.addEventListener('click', function () {
            profileTab.classList.add('border-blue-500');
            loginTab.classList.remove('border-blue-500');
            profileContent.classList.remove('hidden');
            loginContent.classList.add('hidden');
        });

        loginTab.addEventListener('click', function () {
            loginTab.classList.add('border-blue-500');
            profileTab.classList.remove('border-blue-500');
            loginContent.classList.remove('hidden');
            profileContent.classList.add('hidden');
        });

        // Default tab
        profileTab.click();
    });
</script>

@endsection
