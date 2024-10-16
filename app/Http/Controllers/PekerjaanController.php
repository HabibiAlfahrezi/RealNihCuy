<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\JobView;
use App\Models\Notification;
use App\Models\Pekerjaan;
use App\Models\Skill;
use App\Models\Tech;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PekerjaanController extends Controller
{

    public function index()
    {
        $jobs = Pekerjaan::with('applicant', 'type')
        ->where('company_id', Auth::user()->company->id)
        ->paginate(10);

        // Iterasi melalui setiap pekerjaan untuk memeriksa jumlah pelamar
        foreach ($jobs as $job) {
            // Hitung jumlah pelamar saat ini
            $currentApplicants = $job->applicant->count();

            // Jika jumlah pelamar mencapai atau melebihi total pelamar yang diizinkan, ubah status menjadi "close"
            if ($currentApplicants >= $job->total_applicant) {
                $job->status = 'close';
                $job->save(); // Simpan perubahan status ke database
            }
        }
    
        return view('dashboard.company.jobs.job', [
            'jobs' => $jobs,
      
        ]);
    }

    public function getSkills(Request $request)
    {
        $search = $request->search;
        $skills = Skill::where('title', 'LIKE', '%'.$search.'%')->get();
        return response()->json($skills);
    }

    public function getCategory(Request $request)
    {
        $search = $request->search;
        $category = JobCategory::where('title', 'LIKE', '%'.$search.'%')->get();
        return response()->json($category);
    }
    public function getTech(Request $request)
    {
        $search = $request->search;
        $tech = Tech::where('name', 'LIKE', '%'.$search.'%')->get();
        return response()->json($tech);
    }

    public function jobDetail($id)
    {
        $pekerjaan = Pekerjaan::with('type', 'category', 'company', 'applicant')->where('id', $id)->first();

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

        return view('dashboard.company.jobs.jobDetail', [
            'pekerjaan' => $pekerjaan,
            'similarJobs' => $similarJobs
        ]);
        

    }

    public function apply(Request $request){
        $id = $request->id;
        $pekerjaan = Pekerjaan::where('id', $id)->first();

        // Cek apakah kalau role nya adalah user atau bukan, kalau bukan gabisa applied
        $role = Auth::user()->prosesi== 'user';

        if(!$role){
            return redirect()->back()->with('error', 'Uou cant applied this job');
            // return response()->json(['message' => 'you cant applied this job'], 201);
        } 

        // Cek apakah pekerjaan sudah ditutup
        if($pekerjaan->status == 'close'){
            return redirect()->back()->with('error', 'This job is closed');
            // return response()->json(['message' => 'this job is closed'], 201);
        }

        // Cek apakah user sudah pernah apply
        $userApplicant = Applicant::where('user_id', Auth::user()->id)->where('pekerjaan_id', $id)->first();
        if($userApplicant){
            return redirect()->back()->with('error', 'You already applied this job');
            // return response()->json(['message' => 'you already applied this job'], 201);
        }

        if(Auth::user()->profile->name == null){
            return redirect()->back()->with('error', 'Please complete your profile');
            // return response()->json(['message' => 'please complete your profile'], 201);
        }
        

        $approved = Pekerjaan::with('applicant')->where('id', $id)->first();
        $approvedCount = $approved->applicant()->where('stage', 'approved')->count();
        if($approvedCount >= $pekerjaan->total_applicant){
            return response()->json(['message' => 'this job is full'], 201);
        }
        
        // Apply
        try {
            $applicant = new Applicant();
            $applicant->user_id = Auth::user()->id;
            $applicant->pekerjaan_id = $id;
            $applicant->company_id = $pekerjaan->company_id;
            $applicant->save();


            return redirect()->back()->with('success', 'Applicant created successfully');
            // return response()->json(['message' => 'applied successfull'], 201);
        } catch (\Exception $e) {
            // return response()->json(['message' => 'Failed to apply to this job', 'error' => $e->getMessage()], 500);
            return redirect()->back()->with('error', 'Applicant created with error');
        }
    }
    
    public function unapply($id){

        $userApplicant = Applicant::where('user_id', Auth::user()->id)->where('pekerjaan_id', $id)->first();
        $userApplicant->delete();
        return redirect()->back()->with('success', 'Applicant deleted successfully');
    }

    public function jobEdit($id){
        $pekerjaan = Pekerjaan::with('type', 'category', 'company')->where('id', $id)->first();
        $pekerjaanSkill = $pekerjaan ? $pekerjaan->skill->pluck('id')->toArray() : [];
        $allSkills = Skill::all();

        $pekerjaanCategory = $pekerjaan ? $pekerjaan->category->pluck('id')->toArray() : [];
        $allCategories = JobCategory::all();

        $types = JobType::all();
        return view('dashboard.company.jobs.create', [
            'pekerjaanCategory' => $pekerjaanCategory,
            'allCategories' => $allCategories,
            'pekerjaanSkill' => $pekerjaanSkill,
            'allSkills' => $allSkills,
            'pekerjaan' => $pekerjaan,
            'types' => $types
        ]);
    }

    public function jobDelete($id){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();
        return redirect()->back()->with('success', 'Job deleted successfully!');
    }


   

}