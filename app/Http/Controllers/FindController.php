<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\JobView;
use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\UserFollower;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FindController extends Controller
{
    public function users(Request $request){
        $users = UserProfile::with('userSkill');
      // Filter berdasarkan keyword
         if (!empty($request->keywords)) {
             $users->where('name', 'like', '%'.$request->keywords.'%');
         }
         
         // Filter berdasarkan lokasi
         if (!empty($request->location)) {
             $users->where('address', 'like', '%'.$request->keywords.'%');
         
         }
         $users = $users->paginate(2);
         return view('dashboard.find.user.users', [
             'users' => $users
         ]);
     }

     public function userDetail($id){
        $user = User::withCount(['followers', 'following'])->where('id', $id)->first();
 
        $profile = UserProfile::with('userSkill')->where('user_id', $id)->first();

        $isFollowing = UserFollower::where('following_id', $id) // ID pengguna yang dimaksud
        ->where('follower_id', Auth::user()->id) // ID pengguna yang sedang login
        ->exists(); // Hanya perlu mengecek keberadaan


        
        return view('dashboard.find.user.userDetail', [
            'users' => $profile,
            'follow' => $user,
            'isFollowing' => $isFollowing
        ]);
   }

     public function jobs(Request $request){
        $categories = JobCategory::all();
        $jobTypes = JobType::all();
        
        $jobs = Pekerjaan::where('status', 'open');
        
        // Filter berdasarkan keyword
        if (!empty($request->keywords)) {
            $jobs->where('title', 'like', '%'.$request->keywords.'%');
        }
        
        // Filter berdasarkan lokasi
        if (!empty($request->location)) {
            $jobs->whereHas('company', function ($query) use ($request) {
                $query->where('location', 'like', '%'.$request->location.'%');
            });
        }
    
        if (!empty($request->status)) {
            $statuses = explode(',', $request->status);
            $jobs->whereIn('status', $statuses);
        }
    
        // Filter berdasarkan kategori
        if (!empty($request->category)) {
            $jobs->whereHas('category', function ($query) use ($request) {
                $query->where('job_category_id', $request->category);
            });
        }
        
        // Filter berdasarkan tipe pekerjaan
        if (!empty($request->type)) {
            $jobsTypeArray = explode(',', $request->type);
            $jobs->whereHas('type', function ($query) use ($jobsTypeArray) {
                $query->whereIn('job_type_id', $jobsTypeArray);
            });
        }
    
        // Filter berdasarkan gaji
        if (!empty($request->min_salary) && !empty($request->max_salary)) {
            $jobs->whereBetween('salary', [$request->min_salary, $request->max_salary]);
        } elseif (!empty($request->min_salary)) {
            $jobs->where('salary', '>=', $request->min_salary);
        } elseif (!empty($request->max_salary)) {
            $jobs->where('salary', '<=', $request->max_salary);
        }
    
        // Urutkan berdasarkan tanggal
        if (!empty($request->sort) && $request->sort == 'oldest') {
            $jobs->orderBy('created_at', 'asc');
        } else {
            $jobs->orderBy('created_at', 'desc');
        }
        
        // Paginasi hasil
        $jobs = $jobs->with('type', 'category')->paginate(9);
        
        return view('dashboard.find.jobs', [
            'categories' => $categories,
            'types' => $jobTypes,
            'jobs' => $jobs
        ]);
    }


    public function show(Request $request){
        $categories = JobCategory::all();
        $jobTypes = JobType::all();
        
        $jobs = Pekerjaan::where('status', 'open');
        
        // Filter berdasarkan keyword
        if (!empty($request->keywords)) {
            $jobs->where('title', 'like', '%'.$request->keywords.'%');
        }
        
        // Filter berdasarkan lokasi
        if (!empty($request->location)) {
            $jobs->whereHas('company', function ($query) use ($request) {
                $query->where('location', 'like', '%'.$request->location.'%');
            });
        }
    
        if (!empty($request->status)) {
            $statuses = explode(',', $request->status);
            $jobs->whereIn('status', $statuses);
        }
    
        // Filter berdasarkan kategori
        if (!empty($request->category)) {
            $jobs->whereHas('category', function ($query) use ($request) {
                $query->where('job_category_id', $request->category);
            });
        }
        
        // Filter berdasarkan tipe pekerjaan
        if (!empty($request->type)) {
            $jobsTypeArray = explode(',', $request->type);
            $jobs->whereHas('type', function ($query) use ($jobsTypeArray) {
                $query->whereIn('job_type_id', $jobsTypeArray);
            });
        }
    
        // Filter berdasarkan gaji
        if (!empty($request->min_salary) && !empty($request->max_salary)) {
            $jobs->whereBetween('salary', [$request->min_salary, $request->max_salary]);
        } elseif (!empty($request->min_salary)) {
            $jobs->where('salary', '>=', $request->min_salary);
        } elseif (!empty($request->max_salary)) {
            $jobs->where('salary', '<=', $request->max_salary);
        }
    
        // Urutkan berdasarkan tanggal
        if (!empty($request->sort) && $request->sort == 'oldest') {
            $jobs->orderBy('created_at', 'asc');
        } else {
            $jobs->orderBy('created_at', 'desc');
        }
        
        // Paginasi hasil
        $jobs = $jobs->with('type', 'category')->paginate(9);
        
        return view('dashboard.find.jobs.jobs', [
            'categories' => $categories,
            'types' => $jobTypes,
            'jobs' => $jobs
        ]);
    }


    public function jobDetail($id){
        $pekerjaan = Pekerjaan::with('type', 'category', 'company', 'applicant')->where('id', $id)->first();

        if (!$pekerjaan) {
            abort(404);
        }


        // Ambil aplikasi yang relevan untuk pengguna saat ini
        $applicant = $pekerjaan->applicant->where('user_id', Auth::user()->id)->first();

   

        $approvedApplicantsCount = $pekerjaan->applicant()->where('stage', 'approved')->count();
        if (Auth::check()) {
            JobView::create([
                'user_id' => Auth::id(),
                'pekerjaan_id' => $pekerjaan->id,
                'company_id' => $pekerjaan->company->id
            ]);
        }

        $pekerjaanAwal = $pekerjaan->title; // Ambil title dari pekerjaan awal
        $pekerjaanIdAwal = $pekerjaan->id; // Ambil ID dari pekerjaan awal
        
        // Cari pekerjaan yang memiliki judul mirip
        $similarJobs = Pekerjaan::where('title', 'LIKE', '%' . $pekerjaanAwal . '%')
                        ->where('id', '!=', $pekerjaanIdAwal) // Kecualikan pekerjaan yang sama
                        ->get();

        return view('dashboard.find.jobs.jobDetail', [
            'pekerjaan' => $pekerjaan,
            'similarJobs' => $similarJobs,
            'approved' => $approvedApplicantsCount,
            'applicant' => $applicant
                    
        ]);
    }
}
