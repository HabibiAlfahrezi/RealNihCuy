<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobType;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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
    
    return view('home.pages.jobs', [
        'categories' => $categories,
        'types' => $jobTypes,
        'jobs' => $jobs
    ]);
}

}
