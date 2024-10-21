
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@vite('resources/css/app.css')
@php
    $activeTab = session('active_tab', 'job-seeker');
    $activeTab = old('active_tab', $activeTab);
@endphp
<section class="bg-gray-50 pt-10">
    <div class="container mx-auto flex flex-wrap items-center">
        <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
            <div class="flex items-center md:mb-10 justify-center md:justify-start">
                <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="h-10 w-auto">
    
            </div>
            <img src="{{ asset('image/gambar/register.png') }}" alt="Register Image" class="hidden md:block">
        </div>
        <div class="w-full md:w-1/2 px-4">
            <div class="flex justify-center space-x-4 mb-6 mx-auto w-full max-w-md">
                <p id="job-seeker-tab" class="font-semibold {{ $activeTab == 'job-seeker' ? 'text-primary' : 'text-gray-500' }} cursor-pointer">Job Seeker</p>
                <p id="company-tab" class="font-semibold {{ $activeTab == 'company' ? 'text-primary' : 'text-gray-500' }} cursor-pointer">Company</p>
            </div>
           
            <h4 class="text-3xl font-bold text-gray-800 mb-6 text-center">Get More Opportunities</h4>

            <div id="job-seeker-form" class="space-y-4 {{ $activeTab == 'job-seeker' ? '' : 'hidden' }}">
                <form action="/userStore" method="post" class="space-y-4">
                    @csrf
                    <input type="hidden" name="active_tab" value="job-seeker">
                    <div>
                        <label for="full-name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" id="full-name" name="user_name" placeholder="Enter Your Full Name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('user_name'))
                            <p class="text-red-500 mt-2">{{ $errors->first('user_name') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input type="email" id="email" name="user_email" value="{{ old('user_email') }}" placeholder="Enter Your Email Address" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('user_email'))
                            <p class="text-red-500 mt-2">{{ $errors->first('user_email') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" id="password" name="user_password" placeholder="Enter Your Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('user_password'))
                            <p class="text-red-500 mt-2">{{ $errors->first('user_password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="confirm-password" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                        <input type="password" id="confirm-password" name="user_password_confirmation" placeholder="Confirm Your Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('user_password_confirmation'))
                            <p class="text-red-500 mt-2">{{ $errors->first('user_password_confirmation') }}</p>
                        @endif
                    </div>
                    <input type="hidden" name="prosesi" value="user">
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 rounded-md hover:bg-red-300 transition duration-300">Continue</button>
                </form>
            </div>

            <div id="company-form" class="space-y-4 {{ $activeTab == 'company' ? '' : 'hidden' }}">
                <form action="{{ route('account.companyStore') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="active_tab" value="company">
                    <div>
                        <label for="company-name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input type="text" id="company-name" name="name" value="{{ old('name')  }}" placeholder="Enter Your Full Account Name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('name'))
                            <p class="text-red-500 mt-2">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div>
                        <label for="company-name" class="block text-gray-700 font-semibold mb-2">Company Name</label>
                        <input type="text" id="company-name" name="company_name" value="{{ old('company_name') }}"  placeholder="Enter Your Company Name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('company_name'))
                            <p class="text-red-500 mt-2">{{ $errors->first('company_name') }}</p>
                        @endif
                    </div>
                    <div>
                        <label for="company-logo" class="block text-gray-700 font-semibold mb-2">Company Logo</label>
                        <input id="company-logo"
                          type="file"
                          name="logo"
                          accept="image/*"
                          value="{{ old('logo') }}"
                          class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-normal outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:px-5 file:py-3 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:file:border-form-strokedark dark:file:bg-white/30 dark:file:text-white dark:focus:border-primary"
                        />
                        @if ($errors->has('logo'))
                            <p class="text-red-500 mt-2">{{ $errors->first('logo') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="company-email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input type="email" id="company-email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Address" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('email'))
                            <p class="text-red-500 mt-2">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="company-password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" id="company-password" name="password"  placeholder="Enter Your Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('password'))
                            <p class="text-red-500 mt-2">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="confirm-company-password" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                        <input type="password" id="confirm-company-password" name="password_confirmation" placeholder="Confirm Your Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                        @if ($errors->has('password_confirmation'))
                            <p class="text-red-500 mt-2">{{ $errors }}</p>
                        @endif
                    </div>
                    <input type="hidden" name="prosesi" value="company" >
                    <button type="submit" class="w-full bg-primary text-white font-bold py-3 rounded-md hover:bg-red-300 transition duration-300">Continue</button>
                </form>
            </div>

            <p class="text-gray-600 mt-6 text-center">Already have an account? 
                <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login</a>
            </p>

            <p class="text-gray-500 text-sm mt-4">By clicking 'Continue', you acknowledge that you have read and accept the 
                <a href="#" class="text-primary hover:underline">Terms of Service</a> 
                and 
                <a href="#" class="text-primary hover:underline">Privacy Policy</a>.
            </p>
        </div>
    </div>
</section>

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const jobSeekerTab = document.getElementById('job-seeker-tab');
    const companyTab = document.getElementById('company-tab');
    const jobSeekerForm = document.getElementById('job-seeker-form');
    const companyForm = document.getElementById('company-form');

    const activeTab = '{{ $activeTab }}';

    function setActiveTab(tab) {
        if (tab === 'job-seeker') {
            jobSeekerTab.classList.add('text-primary');
            jobSeekerTab.classList.remove('text-gray-500');
            companyTab.classList.add('text-gray-500');
            companyTab.classList.remove('text-primary');
            jobSeekerForm.classList.remove('hidden');
            companyForm.classList.add('hidden');
        } else {
            companyTab.classList.add('text-primary');
            companyTab.classList.remove('text-gray-500');
            jobSeekerTab.classList.add('text-gray-500');
            jobSeekerTab.classList.remove('text-primary');
            companyForm.classList.remove('hidden');
            jobSeekerForm.classList.add('hidden');
        }
    }

    setActiveTab(activeTab);

    jobSeekerTab.addEventListener('click', () => setActiveTab('job-seeker'));
    companyTab.addEventListener('click', () => setActiveTab('company'));
});
</script>

