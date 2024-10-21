<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobView;
use App\Models\Pekerjaan;
use App\Models\Skill;
use App\Models\User;
use App\Models\userDocument;
use App\Models\userEducation;
use App\Models\UserExperience;
use App\Models\UserProfile;
use App\Models\UserProject;
use App\Models\UserSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function dashboard()
    {
        $totalApplicant = Applicant::where('user_id', Auth::user()->id)->count();
        $applicant = Applicant::with('pekerjaan')->where('user_id', Auth::user()->id)->paginate(10);
        $totalViews = JobView::where('user_id', Auth::user()->id)->count();
        $topJobs = Pekerjaan::with('company', 'applicant')
            ->withCount([
                'view as views_count',
                'applicant as applicant_count',
                'applicant as hired_count' => function ($query) {
                    $query->where('stage', 'hired');
                }
            ])
            ->orderBy('views_count', 'desc')->limit(3)->get();
        return view('dashboard.user.index', [
            'totalApplicant' => $totalApplicant,
            'totalViews' => $totalViews,
            'applicants' => $applicant,
            'topJobs' => $topJobs,

        ]);
    }

    public function index()
    {
        $applicant = Applicant::with('pekerjaan')->where('user_id', Auth::user()->id)->get();
        $profile = UserProfile::with('userSkill', 'userSocial', 'userProject', 'userExperience', 'userEducation', 'userDocument')->where('user_id', Auth::user()->id)->first();
        $users = User::withCount(['followers', 'following'])->where('id', Auth::user()->id)->first();
        return view('dashboard.user.profile.profile', [
            'profile' => $profile,
            'applicants' => $applicant,
            'follow' => $users
        ]);
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
        $applicant = $pekerjaan->applicant->where('user_id', Auth::user()->id)->first();
        $approvedApplicantsCount = $pekerjaan->applicant()->where('stage', 'approved')->count();
        $pekerjaanAwal = $pekerjaan->title; // Ambil title dari pekerjaan awal
        $pekerjaanIdAwal = $pekerjaan->id; // Ambil ID dari pekerjaan awal

        // Cari pekerjaan yang memiliki judul mirip
        $similarJobs = Pekerjaan::where('title', 'LIKE', '%' . $pekerjaanAwal . '%')
            ->where('id', '!=', $pekerjaanIdAwal) // Kecualikan pekerjaan yang sama
            ->get();

        return view('dashboard.user.jobs.jobDetail', [
            'pekerjaan' => $pekerjaan,
            'similarJobs' => $similarJobs,
            'approved' => $approvedApplicantsCount,
            'applicant' => $applicant
        ]);
    }

    public function create()
    {
        $profile = UserProfile::with('userSocial')->where('user_id', Auth::user()->id)->first();
        $userSkill = $profile ? $profile->userSkill->pluck('id')->toArray() : [];
        $allSkills = Skill::all();
        return view('dashboard.user.profile.setting', [
            'profile' => $profile,
            'userSkill' => $userSkill,
            'allSkills' => $allSkills
        ]);
    }



    public function getSkills(Request $request)
    {
        $search = $request->search;
        $skills = Skill::where('title', 'LIKE', '%' . $search . '%')->get();
        return response()->json($skills);
    }

    public function profileStore(Request $request)
    {
        try {
            $userValidate = $request->validate([
                'image' => ['nullable', 'image', 'max:2048'],
            ]);

            $userProfileId = Auth::user()->profile->id;
            $logoPath = $request->file('image')->store('image/user/logo', 'public');


            userProfile::updateOrCreate(
                ['id' => $userProfileId],
                array_merge($userValidate, ['image' => $logoPath])
            );

            return redirect()->back()->with('success', 'Photo profile anda berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Photo profile anda gagal disimpan!');
        }
    }


    public function userOtherStore(Request $request)
    {
        $userValidate = $request->validate([
            'address' => ['required'],
            'gender' => ['required'],
            'skills' => ['required', 'array'],  // Pastikan ini adalah array
            'highest_position' => ['required'],
            'experience_year' => ['required'],
            'languege' => ['required'],
            'experience' => ['required'],
            'work_type' => ['required'],
            'expected_salary' => ['required'],
        ]);

        try {
            $userId = Auth::user()->id;

            $userProfile = UserProfile::where('user_id', $userId)->first();

            if ($userProfile) {
                // Update profil pengguna
                $userProfile->update([
                    'address' => $userValidate['address'],
                    'gender' => $userValidate['gender'],
                    'highest_position' => $userValidate['highest_position'],
                    'experience_year' => $userValidate['experience_year'],
                    'language' => $userValidate['languege'],
                    'experience' => $userValidate['experience'],
                    'work_type' => $userValidate['work_type'],
                    'expected_salary' => $userValidate['expected_salary'],
                ]);
            } else {
                // Buat profil pengguna baru
                $userProfile = UserProfile::create([
                    'user_id' => $userId,
                    'address' => $userValidate['address'],
                    'gender' => $userValidate['gender'],
                    'highest_position' => $userValidate['highest_position'],
                    'experience_year' => $userValidate['experience_year'],
                    'language' => $userValidate['languege'],
                    'experience' => $userValidate['experience'],
                    'work_type' => $userValidate['work_type'],
                    'expected_salary' => $userValidate['expected_salary'],
                ]);
            }

            // Sinkronkan skill
            $skillIds = array_map('intval', $userValidate['skills']); // Pastikan skill ID adalah integer
            $userProfile->userSkill()->sync($skillIds);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('User update failed: ' . $e->getMessage());

            // Return response JSON dengan pesan kesalahan
            return response()->json([
                'message' => 'User update failed: ' . $e->getMessage(),
            ], 500);
        }
    }




    public function userUpdate(Request $request)
    {
        $userValidate = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'image' => ['nullable', 'image'],
            'birth_date' => ['required'],
            'description' => ['required'],
        ]);

        try {
            $userId = Auth::user()->id;

            $userProfile = UserProfile::where('user_id', $userId)->first();

            if ($request->hasFile('image')) {
                $logoPath = $request->file('image')->store('image/user/logo', 'public');
            } else {
                // If no new image is uploaded, keep the existing one
                $logoPath = $userProfile ? $userProfile->image : null;
            }

            if ($userProfile) {
                $userProfile->update([
                    'image' => $logoPath,
                    'name' => $userValidate['name'],
                    'birth_date' => $userValidate['birth_date'],
                    'description' => $userValidate['description'],
                ]);
                $userProfile->userSocial()->updateOrCreate(
                    [
                        'user_profile_id' => $userProfile->id
                    ],
                    [
                        'phone' => $userValidate['phone'],
                        'email' => $userValidate['email'],
                    ]
                );

                return redirect()->back()->with('success', 'Data berhasil diupdate!');
            } else {
                $userProfile = UserProfile::create([
                    'user_id' => $userId,
                    'image' => $logoPath,
                    'name' => $userValidate['name'],
                    'birth_date' => $userValidate['birth_date'],
                    'description' => $userValidate['description'],
                ]);

                $userProfile->userSocial()->create([
                    'phone' => $userValidate['phone'],
                    'email' => $userValidate['email'],
                ]);
            }


            return redirect()->back()->with('success', 'Data berhasil dibuat!');
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('User update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Data anda gagal disimpan!');
        }
    }


    public function userEmailUpdate($id, Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => ['required', 'email', 'unique:users,email,' . $id]
            ]);

            $user = User::findOrFail($id);
            $user->update(['email' => $validated['email']]);

            return redirect()->back()->with('success', 'Email anda berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Email anda gagal diperbarui.');
        }
    }

    public function userPasswordUpdate($id, Request $request)
    {
        $validated = $request->validate([
            'password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed']
        ]);
        try {

            if (Hash::check($validated['password'], Auth::user()->password)) {
                $user = User::findOrFail($id);
                $user->update(['password' => bcrypt($validated['new_password'])]);
                return redirect()->back()->with('success', 'Password anda berhasil diperbarui.');
            } else {
                return redirect()->back()->with('error', 'Password anda salah.');
            }

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Password anda gagal diperbarui.');
        }
    }


    public function sosmedStore(Request $request)
    {
        try {
            $userValidate = $request->validate([
                'instagram' => ['nullable', 'string'],
                'github' => ['nullable', 'string'],
                'facebook' => ['nullable', 'string'],
                'twitter' => ['nullable', 'string'],
                'linkedin' => ['nullable', 'string'],
            ]);

            $userProfileId = Auth::user()->profile->id;

            // Menggunakan updateOrCreate untuk mengupdate jika ada atau membuat baru jika tidak ada
            UserSocial::updateOrCreate(
                ['user_profile_id' => $userProfileId], // Kondisi pencocokan
                $userValidate // Data yang akan diupdate atau dibuat
            );
            return redirect()->back()->with('success', 'Social media anda berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Social media anda gagal disimpan!');
        }
    }


    public function experienceStore(Request $request)
    {
        try {
            $userValidate = $request->validate([
                'title' => ['required', 'string'],
                'company' => ['required', 'string'],
                'type' => ['required', 'string'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
                'location' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => ['nullable', 'image', 'max:2048'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        $userProfileId = Auth::user()->profile->id;
        // $userExperience = UserExperience::where('user_profile_id', $userProfileId)->first();

        if ($request->hasFile('image')) {
            $logoPath = $request->file('image')->store('image/company/experience', 'public');
        }
        $experienceData = array_merge($userValidate, ['image' => $logoPath]);

        try {
            UserExperience::create(array_merge($experienceData, ['user_profile_id' => $userProfileId]));
            return redirect()->back()->with('success', 'Experience anda berhasil disimpan!');
        } catch (\Exception $e) {
            // return response()->json([
            //     'message' => 'Gagal',
            //     'error' => $e->getMessage()
            // ]);
            return redirect()->back()->with('error', 'Experience anda gagal disimpan!');
        }
    }



    public function educationStore(Request $request)
    {
        try {
            $userValidate = $request->validate([
                'title' => ['required', 'string'],


                'start_date' => ['required', 'date'],

                'location' => ['required', 'string'],
                'description' => ['required', 'string'],
                'image' => ['nullable', 'image', 'max:2048'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        $userProfileId = Auth::user()->profile->id;
        // $userExperience = UserExperience::where('user_profile_id', $userProfileId)->first();

        if ($request->hasFile('image')) {
            $logoPath = $request->file('image')->store('image/company/experience', 'public');
        }
        $experienceData = array_merge($userValidate, ['image' => $logoPath]);

        try {
            userEducation::create(array_merge($experienceData, ['user_profile_id' => $userProfileId]));
            return redirect()->back()->with('success', 'Experience anda berhasil disimpan!');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal',
                'error' => $e->getMessage()
            ]);
            // return redirect()->back()->with('error', 'Data anda gagal disimpan!');
        }
    }

    public function projectStore(Request $request)
    {
        // Validasi data
        $userValidate = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'link' => ['nullable', 'string'],
            'id' => ['nullable', 'exists:user_projects,id'] // Validasi ID jika ada
        ]);

        $userProfileId = Auth::user()->profile->id;

        // Jika ada file gambar, simpan file dan dapatkan path-nya
        if ($request->hasFile('image')) {
            $logoPath = $request->file('image')->store('image/user/project', 'public');
        } else {
            $logoPath = $request->input('existing_image'); // Gunakan gambar yang sudah ada jika tidak ada file baru
        }

        // Gabungkan data yang divalidasi dengan path gambar
        $experienceData = array_merge($userValidate, ['image' => $logoPath]);

        try {
            // Gunakan updateOrCreate untuk membuat atau memperbarui proyek
            UserProject::updateOrCreate(
                ['id' => $request->input('id')], // Cari berdasarkan ID untuk update, atau buat baru jika tidak ada ID
                array_merge($experienceData, ['user_profile_id' => $userProfileId])
            );

            return redirect()->back()->with('success', 'Project anda berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data anda gagal disimpan!');
        }
    }


    public function backgroundStore(Request $request)
    {
        try {
            // Validasi
            $userValidate = $request->validate([
                'background' => ['nullable', 'image', 'max:2048'],
            ], [
                'background.image' => 'The file must be an image (jpg, jpeg, png, etc.)',
                'background.max' => 'The image size must not exceed 2MB',
            ]);

            $userProfileId = Auth::user()->profile->id;

            // Inisialisasi variable untuk menyimpan path logo
            $logoPath = null;
            if ($request->hasFile('background')) {
                // Simpan file gambar
                $logoPath = $request->file('background')->store('image/user/background', 'public');
            }

            $experienceData = array_merge($userValidate, ['background' => $logoPath]);

            // Update or create user profile
            UserProfile::updateOrCreate(
                ['id' => $userProfileId], // Kondisi pencarian
                $experienceData // Data yang akan disimpan
            );

            // Berhasil menyimpan
            return redirect()->back()->with('success', 'Project anda berhasil disimpan!');
        } catch (\Exception $e) {
            $error = $e->getMessage();
            // Gagal menyimpan
            return redirect()->back()->with('error', $error);
        }
    }

    public function roleStore(Request $request)
    {
        try {
            $userValidate = $request->validate([
                'role' => ['required', 'string'],
            ]);
            $userProfileId = Auth::user()->profile->id;

            UserProfile::updateOrCreate(
                ['id' => $userProfileId],
                $userValidate
            );

            return redirect()->back()->with('success', 'Role anda berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Role anda gagal disimpan!');
        }
    }


    public function documentStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:100'],
                'document' => ['required', 'file', 'mimes:pdf,doc,docx,odt,odp,ppt,pptx'],
            ]);

            $documentFile = $validated['document'];
            $originalFileName = $documentFile->getClientOriginalName();
            $uniqueFileName = time() . '_' . $originalFileName;
            $documentPath = $documentFile->storeAs('file/user/document', $uniqueFileName, 'public');

            userDocument::create([
                'user_profile_id' => Auth::user()->profile->id,
                'name' => $validated['name'],
                'document' => $documentPath,
            ]);

            return redirect()->back()->with('success', 'Document anda berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Document anda gagal disimpan!');
        }
    }

    public function documentDelete($id)
    {
        try {
            $document = userDocument::findOrFail($id);
            $document->delete();

            return redirect()->back()->with('success', 'Document anda berhasil dihapus');
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Data gaagl',
                'error' => $e->getMessage()
            ]);
        }
    }




    public function projectDestroy($id)
    {
        try {
            // Temukan proyek berdasarkan ID dan hapus
            $project = UserProject::findOrFail($id);
            $project->delete();

            return redirect()->back()->with('success', 'Project berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus proyek!');
        }
    }



    public function experienceDestroy($id)
    {
        try {
            // Temukan proyek berdasarkan ID dan hapus
            $experience = UserExperience::findOrFail($id);
            $experience->delete();

            return redirect()->back()->with('success', 'Experience berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus proyek!');
        }
    }
    public function educationDestroy($id)
    {
        try {
            // Temukan proyek berdasarkan ID dan hapus
            $education = userEducation::findOrFail($id);
            $education->delete();

            return redirect()->back()->with('success', 'Education berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus proyek!');
        }
    }



    public function getAppliedStats()
    {
        // Get the authenticated user
        $user = Auth::user()->id;

        // Query job applications and group them by status
        $statuses = Applicant::where('user_id', $user)
            ->selectRaw('stage, count(id) as count')
            ->groupBy('stage')
            ->get();

        return response()->json($statuses);
    }
}
