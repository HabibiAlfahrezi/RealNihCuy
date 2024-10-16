<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\Pekerjaan;
use App\Models\Skill;
use App\Models\Subscription;
use App\Models\Tech;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    
    public function index(){
        $dateRange = Carbon::now()->subWeeks(11)->format('M d, Y') . ' - ' . Carbon::now()->format('M d, Y');
        $topJobs = $this->getJobApplicationStats();
        $colors = ["#3C50E0", "#6577F3", "#8FD0EF", "#0FADCF", "#25D366"];
        $premiumRevenue = Subscription::where('item_name', 'Premium')->where('status', 'success')->sum('price');
        $totalRevenue = Subscription::where('status', 'success')->sum('price');
        $percentage = $totalRevenue > 0 ? ($premiumRevenue / $totalRevenue) * 100 : 0;
        $user = User::all();
        $jobs  = Pekerjaan::paginate(5);
        $company = Company::withCount('applicant')->with('pekerjaan', 'applicant')->orderBy('applicant_count', 'desc')->limit(3)->get();

        return view('dashboard.admin.index', [
            'user' => $user,
            'pekerjaans' => $jobs,
            'companies' => $company,
            'dateRange' => $dateRange,
            'topJobs' => $topJobs,
            'colors' => $colors,
            'premiumRevenue' => $premiumRevenue,
            'totalRevenue' => $totalRevenue,
            'percentage' => $percentage
        ]);
    }


    public function getJobApplicationStats()
    {
        // Ambil data pekerjaan dengan jumlah aplikasi terbanyak
        $stats = DB::table('pekerjaans')
            ->join('applicants', 'pekerjaans.id', '=', 'applicants.pekerjaan_id')
            ->select('pekerjaans.title', DB::raw('COUNT(applicants.id) as application_count'))
            ->groupBy('pekerjaans.id', 'pekerjaans.title')
            ->orderByDesc('application_count')
            ->limit(3)
            ->get();
    
        // Hitung total aplikasi
        $total = $stats->sum('application_count');
    
        // Tambahkan persentase aplikasi untuk setiap pekerjaan
        return $stats->map(function($job) use ($total) {
            $job->percentage = round(($job->application_count / $total) * 100, 2);
            return $job;
        });
    }
    public function getChartData ()
    {
        $data = DB::table('companies')
        ->join('pekerjaans', 'companies.id', '=', 'pekerjaans.company_id')
        ->leftJoin('applicants', 'pekerjaans.id', '=', 'applicants.pekerjaan_id')
        ->select(
            'companies.name as company_name',
            DB::raw('COUNT(DISTINCT pekerjaans.id) as job_count'),
            DB::raw('COUNT(DISTINCT applicants.id) as applicants_count'),
            DB::raw('COUNT(DISTINCT pekerjaans.id) - COUNT(DISTINCT CASE WHEN applicants.id IS NOT NULL THEN pekerjaans.id END) as not_applied_count')
        )
        ->where('applicants.created_at', '>=', now()->subWeek())
        ->groupBy('companies.name')
        ->orderBy('job_count', 'desc')
        ->get();

        return response()->json($data);
    }



    public function getStats()
    {
        $stats = [];
        $currentDate = Carbon::now();

        for ($i = 11; $i >= 0; $i--) {
            $weekStart = $currentDate->copy()->subWeeks($i)->startOfWeek();
            $weekEnd = $weekStart->copy()->endOfWeek();

            $totalCompanies = Company::whereBetween('created_at', [$weekStart, $weekEnd])->count();
            $premiumCompanies = Company::whereBetween('created_at', [$weekStart, $weekEnd])
                                       ->where('role', 'Premium')
                                       ->count();

            $stats[] = [
                'week' => $weekStart->format('M d'),
                'totalCompanies' => $totalCompanies,
                'premiumCompanies' => $premiumCompanies
            ];
        }

        return response()->json($stats);
    }

    public function user(){
        $user = User::with('profile')->latest()->paginate(5);
        return view('dashboard.admin.user', [
            'users' => $user,
        ]);
    }
    public function deleteUser($id){
        $user = User::where('id', $id);
        $user->delete();
        return redirect()->back();
    }

    public function category(){
        $categories = JobCategory::with('pekerjaan')->latest()->paginate(5);
        return view('dashboard.admin.category', [
            'categories' => $categories,
        ]);
    }

    public function categoryStore(Request $request) {
       
        $userValidate = $request->validate([
            'title' => ['required'],
        ]);

        try{
            JobCategory::Create($userValidate);    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
         
        }
    }

    public function tech(){
        $tech = Tech::with('company')->latest()->paginate(5);
        return view('dashboard.admin.tech', [
            'techs' => $tech
        ]);
    }

    public function techStore(Request $request) {
       
        $userValidate = $request->validate([
            'logo' => ['nullable', 'image', 'max:2048'],
            'name' => ['required'],
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('image/admin/tech', 'public');
        }

        try{
            Tech::Create(
                array_merge($userValidate, ['logo' => $logoPath])
            );    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
    }

    public function skill(){
        $skill = Skill::with('pekerjaan')->latest()->paginate(5);
        return view('dashboard.admin.skill', [
            'skills' => $skill
        ]);         
    }   

    public function skillStore(Request $request) {
       
        $userValidate = $request->validate([
            'title' => ['required'],
        ]);

        try{
            Skill::Create($userValidate);    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
         
        }
    }

    public function type(){
        $type = JobType::with('pekerjaan')->latest()->paginate(5);
        return view('dashboard.admin.type', [
            'types' => $type
        ]);
    }

    public function typeStore(Request $request) {
       
        $userValidate = $request->validate([
            'title' => ['required'],
        ]);

        try{
            JobType::Create($userValidate);    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
         
        }
    }
}
