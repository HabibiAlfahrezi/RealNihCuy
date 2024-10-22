<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

route::view('/sett', 'dashboard.company.profile.sett')->name('sett');
route::get('/modal', [HomeController::class, 'modal'])->name('modal');
route::get('/test/{id}', [HomeController::class, 'test'])->name('test');
Route::get('/api/applicants/{id}', function ($id) {
    $applicant = Applicant::with('profile', 'company', 'pekerjaan', 'userSocial')->find($id);
    return response()->json($applicant);
});

// Auth
route::group(['middleware' => 'guest'], function(){
    // Login
    route::view('/login', 'home.pages.login')->name('login');
    route::post('/login', [AccountController::class, 'login'])->name('account.login');

    // Register
    route::view('/register', 'home.pages.register')->name('register');
    route::post('/userStore', [AccountController::class, 'userStore'])->name('account.register');
    route::post('/companyStore', [AccountController::class, 'companyStore'])->name('account.companyStore');
});                                                                     


// Home
route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/jobs', [SearchController::class, 'show'])->name('jobs');
route::get('/jobDetail/{id}', [HomeController::class, 'jobDetail'])->name('jobDetail')->middleware('auth');
route::get('/pricing', [PaymentController::class, 'pricing'])->name('pricing');

// Ambil Multi Select
route::post('skills', [PekerjaanController::class, 'getSkills'])->name('get-skills');
route::post('tech', [PekerjaanController::class, 'getTech'])->name('get-tech');
route::post('user-skills', [UserController::class, 'getSkills'])->name('user-skills');
route::post('category', [PekerjaanController::class, 'getCategory'])->name('get-category');


// Dashboard
route::group(['middleware' => 'auth' , 'prefix' => 'dashboard'], function () {
    route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

    // Find
    route::get('/users', [FindController::class, 'users'])->name('dashboard.find.user');
    route::get('/jobs', [FindController::class, 'show'])->name('dashboard.find.job');

    // Find User And Follow
    route::get('/userDetail/{id}', [FindController::class, 'userDetail'])->name('dashboard.user.detail');
    route::get('/jobDetail/{id}', [FindController::class, 'jobDetail'])->name('dashboard.job.detail');
    route::get('/userFollow/{id}', [HomeController::class, 'userFollow'])->name('user.follow');
    route::get('/userUnfollow/{id}', [HomeController::class, 'userUnfollow'])->name('user.unfollow');

    // User
    route::group(['prefix' => 'user', 'middleware' => 'user'], function (){
        // Dashboard User
        route::get('/dashboard', [UserController::class, 'dashboard'])->name('userdashboard');
     
        // Applicant
        route::get('/applicant', [CompanyController::class, 'userApplication'])->name('dashboard.userapplication');
        route::get('/job-detail/{id}', [UserController::class, 'jobDetail'])->name('dashboard.user.jobDetail');
        
        // Profile User
        route::get('/user-profile', [UserController::class, 'index'])->name('dashboard.userprofile');
        route::post('/sosmed-update', [UserController::class, 'sosmedStore'])->name('sosmed.store');
        route::post('/sosmed-company', [UserController::class, 'companySosmedStore'])->name('company-sosmed-store');
        route::post('/experience-update', [UserController::class, 'experienceStore'])->name('experience.store');
        route::post('/education-update', [UserController::class, 'educationStore'])->name('education.store');
        route::post('/project-update', [UserController::class, 'projectStore'])->name('project.store');
        route::post('/background-update', [UserController::class, 'backgroundStore'])->name('background.store');
        route::post('/document-update', [UserController::class, 'documentStore'])->name('document.store');
        route::get('/document-delete/{id}', [UserController::class, 'documentDelete'])->name('document.delete');
        route::post('/role-update', [UserController::class, 'roleStore'])->name('role.store');
        route::post('/profile-update', [UserController::class, 'profileStore'])->name('profile.store');

        // User Setting
        route::get('/setting', [UserController::class, 'create'])->name('dashboard.usersetting');
        route::POST('/setting/email/{id}', [UserController::class, 'userEmailUpdate'])->name('user.email.update');
        route::POST('/setting/password/{id}', [UserController::class, 'userPasswordUpdate'])->name('user.password.update');
        route::post('/update', [UserController::class, 'userUpdate'])->name('user.update');
        route::post('/other-update', [UserController::class, 'userOtherStore'])->name('user.other.update');

        // Apply Pekerjaan
        route::get('/apply/{id}', [PekerjaanController::class, 'apply'])->name('apply');
        route::get('/unapply/{id}', [PekerjaanController::class, 'unapply'])->name('unapply');


        // Delete something in Profile
        route::group(['prefix' => 'delete'], function(){
            route::get('/project/{id}', [UserController::class, 'projectDestroy'])->name('project.delete');
            route::get('/experience/{id}', [UserController::class, 'experienceDestroy'])->name('experience.delete');
            route::get('/education/{id}', [UserController::class, 'educationDestroy'])->name('education.delete');
        });
    });

    // Company
    route::group(['prefix' => 'company', 'middleware' => 'company'], function(){
        // Dashboard User
        route::get('/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');

        // Profile
        route::get('/setting', [CompanyController::class, 'setting'])->name('dashboard.companysetting');
        route::get('/profile', [CompanyController::class, 'profile'])->name('dashboard.companyprofile');
        route::post('/company-update', [CompanyController::class, 'companyUpdate'])->name('company.update');

        // Post a Job
        Route::get('/create', [CompanyController::class, 'create'])->name('dashboard.company.create');
        route::post('/jobStore', [CompanyController::class, 'jobStore'])->name('job.store');

        // Job
        Route::get('/job', [PekerjaanController::class, 'index'])->name('dashboard.company.job');
        Route::get('/job-detail/{id}', [PekerjaanController::class, 'jobDetail'])->name('dashboard.company.jobDetail');
        route::get('/jobDelete/{id}', [PekerjaanController::class, 'jobDelete'])->name('company.job.delete');
        route::get('/jobEdit/{id}', [PekerjaanController::class, 'jobEdit'])->name('company.job.edit');
        // Application
        Route::get('/application', [CompanyController::class, 'application'])->name('dashboard.companyapplication'); 
        Route::get('/applicationDetail/{id}', [CompanyController::class, 'applicationDetail'])->name('dashboard.company.applicationDetail'); 
        Route::get('/approve/{id}', [CompanyController::class, 'approve'])->name('approve.applicant'); 
        Route::get('/reject/{id}', [CompanyController::class, 'reject'])->name('reject.applicant'); 

        // Company Profile Update
        route::post('/tech', [CompanyController::class, 'companyTech'])->name('company.tech');
        route::post('/social', [CompanyController::class, 'companySocial'])->name('company.social');
        route::post('/image', [CompanyController::class, 'companyImage'])->name('company.image');
        route::post('/location', [CompanyController::class, 'companyLocation'])->name('company.location');
        route::post('/benefit', [CompanyController::class, 'companyBenefit'])->name('company.benefit');
        route::post('/note', [CompanyController::class, 'companyNote'])->name('company.note');

        Route::view('/calendar', 'dashboard.pages.calendar')->name('dashboard.calendar');


        // Pricing and Payment
        Route::post('/payments', [PaymentController::class, 'create'])->name('payment');
        Route::get('/payment/finish', [PaymentController::class, 'finish'])->name('payment.finish');


        route::get('/deleteNote/{id}', [CompanyController::class, 'companyNoteDelete'])->name('company.note.delete');

        
    });

    route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
        // Dashboard
        route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        route::get('/user', [AdminController::class, 'user'])->name('user');
        route::get('/category', [AdminController::class, 'category'])->name('category');
        route::get('/tech', [AdminController::class, 'tech'])->name('tech');
        route::get('/skill', [AdminController::class, 'skill'])->name('skill');
        route::get('/type', [AdminController::class, 'type'])->name('type');

        // Store
        route::post('/techStore', [AdminController::class, 'techStore'])->name('admin.tech');
        route::post('/typeStore', [AdminController::class, 'typeStore'])->name('admin.type');
        route::post('/categoryStore', [AdminController::class, 'categoryStore'])->name('admin.category');
        route::post('/skillStore', [AdminController::class, 'skillStore'])->name('admin.skill');


        // Delete
        route::Get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
    });
});


// Fetch Data fot Chart in Dashbaord
route::get('/applied-stats', [UserController::class, 'getAppliedStats']);
        
Route::get('/weekly-company-data', [AdminController::class, 'getChartData']);

route::get('/allcompany', [AdminController::class, 'getStats']);
Route::get('/job-application', [AdminController::class, 'getJobApplicationStats']);

Route::get('/company-stats', [Companycontroller::class, 'getStats']);
Route::get('/job-application-stats', [CompanyController::class, 'getJobApplicationStats']);


















// Ga di pakai

route::view('/404', 'home.404')->name('404');
route::view('/modal', 'components.modals');
route::view('/table', 'components.tables');
route::view('/form', 'components.forms')->name('dashboard.form');
route::view('/buttons', 'dashboard.buttons')->name('dashboard.button');
route::view('/companyformelements', 'dashboard.company.form-elements')->name('dashboard.companyelement');
route::view('/companyformlayout', 'dashboard.company.form-layout')->name('dashboard.companylayout');




if(App::environment('production')){
    URL::forceScheme('https');
}