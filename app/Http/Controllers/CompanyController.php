<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ApplicantNote;
use App\Models\Company;
use App\Models\CompanyBenefits;
use App\Models\CompanyImage;
use App\Models\CompanyLocation;
use App\Models\CompanySocial;
use App\Models\JobType;
use App\Models\Notification;
use App\Models\Pekerjaan;
use App\Models\Tech;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Prompts\Note;

class CompanyController extends Controller
{

    public function index(){
        $job = Pekerjaan::with('company', 'applicant')->where('company_id', Auth::user()->company->id)->first();

        $pekerjaan = Pekerjaan::with('type')->where('company_id', Auth::user()->company->id)->paginate(2);
        $company = Company::with('pekerjaan', 'applicant')->where('user_id', Auth::user()->id)->first();

        $totalViews = $company ? $company->pekerjaan->sum(function($job) {
            return $job->view->count();
        }) : 0;

        // Mendapatkan semua data pelamar beserta relasi pekerjaan dan jenis pekerjaannya
        $applicants = Applicant::with('pekerjaan.type')->where('company_id', Auth::user()->company->id)->get();
     
        // Menghitung total pelamar
        $totalApplicants = $applicants->count();


        foreach ($pekerjaan as $job) {
            // Hitung pelamar yang disetujui (approved)
            $approvedApplicantCount = $job->applicant()->where('stage', 'approved')->count();
            $job->approved_applicants = $approvedApplicantCount;
        
            // Hitung total pelamar
            $totalApplicantCount = $job->applicant()->count();
            $job->total_applicants = $totalApplicantCount;
        }

        // Menghitung jumlah pelamar berdasarkan jenis pekerjaan
        $jobTypeCounts = [];

        foreach ($applicants as $applicant) {
            if ($applicant->pekerjaan) {
                foreach ($applicant->pekerjaan->type as $jobType) {
                    if (isset($jobTypeCounts[$jobType->title])) {
                        $jobTypeCounts[$jobType->title] += 1;
                    } else {
                        $jobTypeCounts[$jobType->title] = 1;
                    }
                }
            }
        }

        return view('dashboard.company.index', [
            'jobs' => $job,
            'companies' => $company,
            'totalViews' => $totalViews,
            'pekerjaans' => $pekerjaan,
            'totalApplicants' => $totalApplicants,
            'jobTypeCounts' => $jobTypeCounts,

           
        ]);
    }

    public function profile(){
        $listCompany = Company::select('id','logo', 'name', 'name', 'location')->get();
        $company = Auth::user()->company->with('companySocial','companyLocation', 'companyImage', 'companyBenefit', 'tech')->first();
        $companyTech = $company ? $company->tech->pluck('id')->toArray() : [];
        $allTechs = Tech::all();
        return view('dashboard.company.profile.profile', [
            'company' => $company,
            'listCompany' => $listCompany,
            'companyTech' => $companyTech,
            'allTech' => $allTechs
        ]);
    }

    public function setting(){
        $company = Company::with('companySocial', 'companyLocation', 'companyImage', 'companyBenefit', 'tech')->where('user_id', Auth::user()->id)->first(); // Auth::user()->company;
        $companyTech = $company ? $company->tech->pluck('id')->toArray() : [];
        $allTechs = Tech::all();
        return view('dashboard.company.profile.setting', [
            'company' => $company,
            'companyTech' => $companyTech,
            'allTech' => $allTechs
        ]);
    }
    public function companyTech(Request $request){

        $techArray = $request->input('tech'); 

        $company = Auth::user()->company;
        
        // Melampirkan techs ke company menggunakan attach
        $company->tech()->sync($techArray);
        return redirect()->back();
    }
    public function companyUpdate(Request $request){
        $userValidate = $request->validate([
            'name' => ['required'],
            'logo' => ['sometimes', 'image'], // Optional, only if a new image is uploaded
            'website' => ['required'],
            'founded' => ['required'],
            'location' => ['required'],
            'employe' => ['required'],
            'industry' => ['required'],
            'tech' => ['required'],
            'description' => ['required'],
        ]);
        
        $company = Company::where('user_id', Auth::user()->id)->first();
        
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('image/company/logo', 'public');
        } else {
            // Keep the existing logo if no new image is uploaded
            $logoPath = $company->logo;
        }
        
        try {
            $company->update([
                'logo' => $logoPath,
                'name' => $userValidate['name'],
                'website' => $userValidate['website'],
                'founded' => $userValidate['founded'],
                'location' => $userValidate['location'],
                'employe' => $userValidate['employe'],
                'industry' => $userValidate['industry'],
                'description' => $userValidate['description'],
            ]);

            $company->tech()->sync($userValidate['tech']);
        
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
        
        
    }

    public function companySocial(Request $request){
 
        $userValidate = $request->validate([
            'instagram' => ['nullable', 'string'],
            'github' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
        ]);
        
        try{
            $userCompanyId = Auth::user()->company->id;
        
            // Menggunakan updateOrCreate untuk mengupdate jika ada atau membuat baru jika tidak ada
            CompanySocial::updateOrCreate(
                ['company_id' => $userCompanyId], // Kondisi pencocokan
                $userValidate // Data yang akan diupdate atau dibuat
            );
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
    }

    public function companyImage(Request $request)
    {
        // Validate the request
        $request->validate([
            'image1' => ['nullable', 'image', 'max:2048'],
            'image2' => ['nullable', 'image', 'max:2048'],
            'image3' => ['nullable', 'image', 'max:2048'],
            'image4' => ['nullable', 'image', 'max:2048'],
        ]);

        // Prepare the file paths array
        $filePaths = [];

        // Handle file uploads and store file paths
        foreach (['image1', 'image2', 'image3', 'image4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $path = $file->store('image/company/image', 'public');
                $filePaths[$imageField] = $path;
            }
        }
        try{
            // Update or create the CompanyImage record
            CompanyImage::updateOrCreate(
                ['company_id' => Auth::user()->company->id], // Unique identifier
                $filePaths // Update fields with file paths
            );
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
    }

    public function companyLocation(Request $request){
      

        $locationValidate = $request->validate([
            'title' => ['required'],
            'location' => ['required'],
        ]);

        $company = Auth::user()->company->id;

        try{
            CompanyLocation::updateOrCreate(
                ['company_id' => $company], // Kondisi pencocokan
                $locationValidate // Data yang akan diupdate atau dibuat
            );
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
    }

    public function companyBenefit(Request $request) {
       
        $userValidate = $request->validate([
            'image' => ['nullable', 'image', 'max:2048'],
            'title' => ['required'],
            'description' => ['required'],
        ]);

        $company = Auth::user()->company->id;
        if ($request->hasFile('image')) {
            $logoPath = $request->file('image')->store('image/company/benefit', 'public');
        }

        try{
            CompanyBenefits::updateOrCreate(
                ['company_id' => $company], // Kondisi pencocokan
                array_merge($userValidate, ['image' => $logoPath])
            );    
    
            return redirect()->back()->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate!');
        }
    }



    public function create()
    {
        $type = JobType::all();
        $company_id = Company::where('user_id', Auth::user()->id)->first()->id;
        return view('dashboard.company.jobs.create', [
            'types' => $type,
            'company_id' => $company_id
        ]);
    }



    // public function jobStore(Request $request)
    // {
        
    //     // Validasi input
    //     $data = $request->validate([
    //         'title' => ['required'],
    //         'type' => ['required'],
    //         'salary' => ['required'],
    //         'total_applicant' => ['required'],
    //         'categories' => ['required'],
    //         'skills' => ['required'],
    //         'description' => ['required'],
    //         'responsibilities' => ['required', 'array'], // Pastikan input adalah array
    //         'qualification' => ['required', 'array'],    // Pastikan input adalah array
    //         'experience' => ['required'],
    //         'expired' => ['required'],
    //     ]);


    //     $isFeatured = $request->has('featured') ? true : false;
    
    //     try {
    
    //         $company_id = Auth::user()->company->id;

            
    //          // Gabungkan responsibilities dan qualification menjadi string dengan baris baru sebagai pemisah
    //         $responsibilitiesString = implode("\n", $data['responsibilities']);
    //         $qualificationString = implode("\n", $data['qualification']);


    //         // Buat entitas pekerjaan
    //         $pekerjaan = Pekerjaan::create([
    //             'title' => $data['title'],
    //             'salary' => $data['salary'],
    //             'total_applicant' => $data['total_applicant'],
    //             'description' => $data['description'],
    //             'responsibilities' => $responsibilitiesString,
    //             'qualification' => $qualificationString,
    //             'experience' => $data['experience'],
    //             'expired' => $data['expired'],
    //             'featured' => $isFeatured,
    //             'company_id' => $company_id,
    //         ]);
    
    //         // Menyimpan relasi many-to-many
    //         $pekerjaan->skill()->attach($data['skills']);
    //         $pekerjaan->type()->attach($data['type']);
    //         $pekerjaan->category()->attach($data['categories']);
    
    //         // return redirect()->route('dashboard.company.job')->with('success', 'Job created successfully');
    //         return redirect()->back()->with('success', 'Pekerjaan berhasil dibuat!');
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan jika ada
            
    //         // return redirect()->route('dashboard.company.job')->with('error', 'Sorry, your job could not be created. Please try again.');
    //         return redirect()->back()->with('error', 'Pekerjaan gagal dibuat!');
    //     }
    // }

    public function jobStore(Request $request)
{
    // dd($request->all());
    // Validasi input
    $data = $request->validate([
        'title' => ['required'],
        'type' => ['required'],
        'salary' => ['required'],
        'total_applicant' => ['required'],
        'categories' => ['required'],
        'skills' => ['required'],
        'description' => ['required'],
        'responsibilities' => ['required', 'array'],
        'qualification' => ['required', 'array'],
        'experience' => ['required'],
        'expired' => ['required'],
    ]);

    $isFeatured = $request->has('featured') ? true : false;

    try {
        $company_id = Auth::user()->company->id;

        // Gabungkan responsibilities dan qualification menjadi string dengan baris baru sebagai pemisah
        $responsibilitiesString = implode("\n", $data['responsibilities']);
        $qualificationString = implode("\n", $data['qualification']);

        // Update atau buat entitas pekerjaan
        $pekerjaan = Pekerjaan::updateOrCreate(
            ['id' => $request->input('id')], // Jika id ada, ini akan menjadi operasi update
            [
                'title' => $data['title'],
                'salary' => $data['salary'],
                'total_applicant' => $data['total_applicant'],
                'description' => $data['description'],
                'responsibilities' => $responsibilitiesString,
                'qualification' => $qualificationString,
                'experience' => $data['experience'],
                'expired' => $data['expired'],
                'featured' => $isFeatured,
                'company_id' => $company_id,
            ]
        );

        // Sync relasi many-to-many
        $pekerjaan->skill()->sync($data['skills']);
        $pekerjaan->type()->sync($data['type']);
        $pekerjaan->category()->sync($data['categories']);

        $message = $request->input('id') ? 'Pekerjaan berhasil diperbarui!' : 'Pekerjaan berhasil dibuat!';
        return redirect()->back()->with('success', $message);
    } catch (\Exception $e) {
        // Tangani kesalahan jika ada
        $message = $request->input('id') ? 'Pekerjaan gagal diperbarui!' : 'Pekerjaan gagal dibuat!';
        return redirect()->back()->with('error', $message . ' ' . $e->getMessage());
    }
}




      // Dashboard Company Applicant
      public function application (){
        $pageAll = request()->query('pageAll');
        $pageInreview = request()->query('pageInreview');
        $pageApproved = request()->query('pageApproved');
        $pageRejected = request()->query('pageRejected');
    
        // Define per-page limits
        $perPageAll = 10;
        $perPageStage = 10;
    
        // Fetch data with pagination
        $applicants = Applicant::with('user', 'pekerjaan')
            ->where('company_id', Auth::user()->company->id)
            ->paginate($perPageAll, ['*'], 'pageAll', $pageAll);
    
        $applicantInreview = Applicant::with('user', 'pekerjaan')
            ->where('company_id', Auth::user()->company->id)
            ->where('stage', 'inreview')
            ->paginate($perPageStage, ['*'], 'pageInreview', $pageInreview);
    
        $applicantApproved = Applicant::with('user', 'pekerjaan')
            ->where('company_id', Auth::user()->company->id)
            ->where('stage', 'approved')
            ->paginate($perPageStage, ['*'], 'pageApproved', $pageApproved);
    
        $applicantRejected = Applicant::with('user', 'pekerjaan')
            ->where('company_id', Auth::user()->company->id)
            ->where('stage', 'Rejected')
            ->paginate($perPageStage, ['*'], 'pageRejected', $pageRejected);
    
        return view('dashboard.company.applicant.application', [
            'applicants' => $applicants,
            'inreviews' => $applicantInreview,
            'approveds' => $applicantApproved,
            'rejecteds' => $applicantRejected
        ]);
    }
    public function userApplication (){

        $applicantAll  = Applicant::with('user', 'pekerjaan')->where('user_id', Auth::user()->id)->paginate(2);
        
        return view('dashboard.user.applicant.application', [
            'applicants' => $applicantAll,
         
        ]);
    }

    public function applicationDetail($id){
        // $applicant = Applicant::with('pekerjaan')->where('user_id', Auth::user()->id)->get();
        // $profile = UserProfile::with('userSkill', 'userSocial', 'userProject', 'userExperience', 'userEducation', 'userDocument')->where('user_id', Auth::user()->id)->first();
        // $users = User::withCount(['followers', 'following'])->where('id', Auth::user()->id)->first();
        // return view('dashboard.user.profile', [
        //     'profile' => $profile,
        //     'applicants' => $applicant,
        //     'follow' => $users
        // ]);


        $applicant = Applicant::with('user', 'pekerjaan', 'company')->where('id', $id)->first();
        $userId = $applicant->user_id;
        $profile = UserProfile::with('userSkill', 'userSocial', 'userProject', 'userExperience', 'userEducation', 'userDocument')->where('user_id', $userId)->first();
        $users = User::withCount(['followers', 'following'])->where('id', $userId)->first();

    
        return view('dashboard.company.applicant.applicantDetail', [
            'profile' => $profile,
            'applicants' => $applicant,
            'follow' => $users
        ]);

        // $applicant  = Applicant::with('user', 'pekerjaan', 'company')->where('id', $id)->first();
        // $applicants = Applicant::with('user', 'pekerjaan', 'company')->where('id', $id)->get();
        // return view('dashboard.company.applicantDetail', [
        //     'applicants' => $applicant,
        //     'applicantss' => $applicants,
        // ]);
    }

    public function companyNote(Request $request){
  
        $noteValidate = $request->validate([
            'description' => 'required',
            'applicant_id' => 'required'
        ]);

        try{
            $note = ApplicantNote::create([
                'company_id' => Auth::user()->company->id,
                'applicant_id' => $noteValidate['applicant_id'],
                'note' => $noteValidate['description'],
            ]);
          
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
        
        return redirect()->back()->with('success', 'Note added successfully!');
    }


    public function companyNoteDelete($id){
        $note = ApplicantNote::find($id);
        $note->delete();
        return redirect()->back()->with('success', 'Note deleted successfully!');
    }

    public function approve($id){
    
            // Mengambil data applicant berdasarkan ID
        $applicant = Applicant::with('pekerjaan', 'user.profile')->where('id', $id)->first();
        
        if (!$applicant) {
            return redirect()->back()->with('error', 'Applicant tidak ditemukan!');
        }

        // Mengambil data user dari applicant tersebut
        $user = $applicant->user;

        try {
            // Update stage menjadi 'approved'
            $applicant->update([
                'stage' => 'approved'
            ]);

            
            $notification  = new Notification();
            $notification->user_id = $user->id;
            $notification->company_id = Auth::user()->company->id;
            $notification->pekerjaan_id = $applicant->pekerjaan->id;
            $notification->notification = 'Selamat kamu di terima di perusahaan ini';
            $notification->save();

            // Update current_job di profile user
            $user->profile()->update([
                'current_job' => $applicant->pekerjaan->title,
            ]);

            return redirect()->route('dashboard.companyapplication')->with('success', 'Approve berhasil dilakukan!');
        } catch (\Exception $th) {
            // Jika terjadi kesalahan, kembalikan pesan error
            return redirect()->route('dashboard.companyapplication')->with('error', 'Approve gagal dilakukan!');
        }
    }

    public function reject($id){
        
        $applicant  = Applicant::where('id', $id)->first();

        try {
            $applicant->update([
                'stage' => 'rejected'
            ]);
            return redirect()->back()->with('success', 'Approve berhasil dibuat!');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Approve gagal dibuat!');
        }
    }


    public function getJobApplicationStats()
    {
        $companyId = Auth::user()->company->id;
        $stats = DB::table('companies')
        ->leftJoin('pekerjaans', 'companies.id', '=', 'pekerjaans.company_id')
        ->leftJoin('applicants', 'pekerjaans.id', '=', 'applicants.pekerjaan_id')
        ->leftJoin('job_views', 'pekerjaans.id', '=', 'job_views.pekerjaan_id')
        ->select(
            'companies.name as company_name',
            DB::raw('COUNT(DISTINCT pekerjaans.id) as total_jobs'),
            DB::raw('COUNT(DISTINCT job_views.id) as total_views'),
            DB::raw('COUNT(DISTINCT applicants.id) as total_applicants')
        )
        ->where('companies.id', $companyId)
        ->groupBy('companies.id', 'companies.name')
        ->orderByDesc('total_jobs')
        ->limit(5)
        ->get();

    return response()->json($stats);
    }

  
    public function getStats()
    {
        $stats = [];
        $currentDate = Carbon::now();
        $companyId = Auth::user()->company->id;
        // Loop through the past 12 weeks
        for ($i = 11; $i >= 0; $i--) {
            $weekStart = $currentDate->copy()->subWeeks($i)->startOfWeek();
            
            $weekStats = [
                'Monday'    => ['views' => 0, 'applicants' => 0],
                'Tuesday'   => ['views' => 0, 'applicants' => 0],
                'Wednesday' => ['views' => 0, 'applicants' => 0],
                'Thursday'  => ['views' => 0, 'applicants' => 0],
                'Friday'    => ['views' => 0, 'applicants' => 0],
                'Saturday'  => ['views' => 0, 'applicants' => 0],
                'Sunday'    => ['views' => 0, 'applicants' => 0]
            ];

            // Loop through each day of the week
            foreach ($weekStats as $day => $values) {
                $startOfDay = $weekStart->copy()->startOfDay()->addDays(array_search($day, array_keys($weekStats)));
                $endOfDay = $startOfDay->copy()->endOfDay();

                $totalViews = DB::table('job_views')
                    ->leftJoin('pekerjaans', 'job_views.pekerjaan_id', '=', 'pekerjaans.id')
                    ->where('pekerjaans.company_id', $companyId)
                    ->whereBetween('job_views.created_at', [$startOfDay, $endOfDay])
                    ->count();

                $totalApplicants = DB::table('applicants')
                    ->leftJoin('pekerjaans', 'applicants.pekerjaan_id', '=', 'pekerjaans.id')
                    ->where('pekerjaans.company_id', $companyId)
                    ->whereBetween('applicants.created_at', [$startOfDay, $endOfDay])
                    ->count();

                $weekStats[$day] = [
                    'views' => $totalViews,
                    'applicants' => $totalApplicants
                ];
            }

            $stats[] = [
                'week' => $weekStart->format('M d'),
                'data' => $weekStats
            ];
        }

        return response()->json($stats);
    }

    public function summary()
    {
        // Mengambil semua applicants dengan pekerjaannya dan job types
        $applicants = Applicant::with('pekerjaans.jobTypes')->get();

        // Menghitung total applicants
        $totalApplicants = $applicants->count();

        // Menghitung jumlah applicant berdasarkan jenis pekerjaan
        $jobTypeCounts = [];

        foreach ($applicants as $applicant) {
            foreach ($applicant->pekerjaans as $pekerjaan) {
                foreach ($pekerjaan->jobTypes as $jobType) {
                    if (isset($jobTypeCounts[$jobType->name])) {
                        $jobTypeCounts[$jobType->name] += 1;
                    } else {
                        $jobTypeCounts[$jobType->name] = 1;
                    }
                }
            }
        }

        return view('applicant.summary', compact('totalApplicants', 'jobTypeCounts'));
    }


    public function getApplicantPreview($id)
{
    $applicant = Applicant::with(['user.profile', 'pekerjaan', 'company'])->findOrFail($id);
    return view('partials.applicant-preview', compact('applicant'))->render();
}
}
