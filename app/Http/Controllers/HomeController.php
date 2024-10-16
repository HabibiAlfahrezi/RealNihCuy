<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\JobView;
use App\Models\Pekerjaan;
use App\Models\User;
use App\Models\UserFollower;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $category = JobCategory::withCount('pekerjaan')->orderBy('pekerjaan_count', 'desc')->limit(6) ->get();
        $featured = Pekerjaan::with('company', 'type', 'category')->where([['featured', true], ['status', 'open']])->get();
        $latest = Pekerjaan::with('type', 'category', 'company')->where([['featured', false], ['status', 'open']])->get();
        $popular = Pekerjaan::withCount('applicant')->with('type', 'category', 'company')->where('status', 'open')->having('applicant_count', '>', 0)->orderBy('applicant_count', 'desc')->get();
        $company = Company::with('pekerjaan')
        ->withCount('applicant') // Menghitung jumlah applicant
        ->having('applicant_count', '>', 0) // Memfilter yang applicant_count > 0
        ->orderBy('applicant_count', 'desc') // Mengurutkan dari yang terbanyak
        ->limit(3)
        ->get(['id', 'logo', 'applicant_count']); // Mengambil kolom yang diperlukan
        $job = Pekerjaan::with('company')->get();
       
        return view ('home.index', [
            'categories' => $category,
            'featured' => $featured,
            'latests' => $latest,
            'populars' => $popular,
            'companies' => $company,
            'jobs' => $job
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

        return view('home.pages.jobDetail', [
            'pekerjaan' => $pekerjaan,
            'similarJobs' => $similarJobs,
            'approved' => $approvedApplicantsCount,
            'applicant' => $applicant
       
        ]);
    }

   
   

   public function userFollow($id){
 
       $following = $id;
       $follower = Auth::user()->id;
      
       UserFollower::create([
           'following_id' => $following,
           'follower_id' => $follower
       ]);
       return redirect()->back()->with('success', 'Followed');
   }

   public function userUnfollow($id){
        $following = $id;
       $follower = Auth::user()->id;
       UserFollower::where('following_id', $following)->where('follower_id', $follower)->delete();
       return redirect()->back()->with('success', 'Unfollowed');
   }













   public function test($id){
    $applicant = Applicant::with('user', 'pekerjaan', 'company')->where('id', $id)->first();
    $userId = $applicant->user_id;
    $profile = UserProfile::with('userSkill', 'userSocial', 'userProject', 'userExperience', 'userEducation', 'userDocument')->where('user_id', $userId)->first();
    $users = User::withCount(['followers', 'following'])->where('id', $userId)->first();


    return view('dashboard.company.applicant.test', [
        'profile' => $profile,
        'applicants' => $applicant,
        'follow' => $users
    ]);
   }


   public function modal(){
    return view('components.modals');
   }
}
