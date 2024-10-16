<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function category(){
        return $this->belongsToMany(JobCategory::class, 'pekerjaan_job_categories');
    }

    public function type(){
        return $this->belongsToMany(JobType::class, 'pekerjaan_job_type');
    }

    public function skill(){
        return $this->belongsToMany(Skill::class, 'pekerjaan_skill');
    }

    public function applicant(){
        return $this->hasMany(Applicant::class);
    }

    public function view(){
        return $this->hasMany(JobView::class);
    }
}
