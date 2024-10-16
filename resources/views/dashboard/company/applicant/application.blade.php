@extends('dashboard.layouts.base')

@section('content')
<style>
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
</style>

<div class="flex-1 px-4 pt-6">
    <header class="">
        <h1 class="text-2xl font-semibold font-poppins">Keep it Up {{ Auth::user()->name }}</h1>
        <p>Here is all your job applications status.</p>
    </header>

    


    <div class="mt-6 ">
        <div class="overflow-x-auto">
            <ul class="flex border-b pb-4 w-max">
                <li class="">
                    <a href="#all" class="tab-link bg-white inline-block px-3 py-2 text-blue-500 font-semibold">
                        All ({{ $applicants->count() }})
                    </a>
                </li>
                <li class="">
                    <a href="#in-review" class="tab-link bg-white inline-block px-3 py-2 text-gray-600 hover:text-blue-500">
                        In Review ({{ $inreviews->count() }})
                    </a>
                </li>
                <li class="">
                    <a href="#rejected" class="tab-link bg-white inline-block px-3 py-2 text-gray-600 hover:text-blue-500">
                        Rejected ({{ $rejecteds->count() }})
                    </a>
                </li>
                <li class="">
                    <a href="#hired" class="tab-link bg-white inline-block px-3 py-2 text-gray-600 hover:text-blue-500">
                        Hired ({{ $approveds->count() }})
                    </a>
                </li>
            </ul>
        </div>
        

        <!-- All Applications Tab -->
        <div id="all" class="tab-content active mt-2 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-900 pt-4 px-4">All Applications</h2>
            @include('dashboard.company.applicant.application-table', ['applications' => $applicants])
            
        </div>

        <!-- In Review Applications Tab -->
        <div id="in-review" class="tab-content mt-2 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-900">In Review Applications</h2>
            @include('dashboard.company.applicant.application-table', ['applications' => $inreviews])

            
        </div>

        <!-- Rejected Applications Tab -->
        <div id="rejected" class="tab-content mt-2 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-900">Rejected Applications</h2>
            @include('dashboard.company.applicant.application-table', ['applications' => $rejecteds])
        </div>

        <!-- Hired Applications Tab -->
        <div id="hired" class="tab-content mt-2 bg-white rounded-lg shadow">
            <h2 class="text-xl font-semibold text-gray-900">Hired Applications</h2>
            @include('dashboard.company.applicant.application-table', ['applications' => $approveds])
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active class from all tabs and tab contents
                tabLinks.forEach(link => link.classList.remove('text-blue-500', 'font-semibold'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active class to the clicked tab and corresponding content
                const target = document.querySelector(this.getAttribute('href'));
                this.classList.add('text-blue-500', 'font-semibold');
                target.classList.add('active');
            });
        });

        // Activate default tab
        document.querySelector('.tab-link[href="#all"]').click();
    });
</script>
@endsection
