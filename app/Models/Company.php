<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tech(){
        return $this->belongsToMany(Tech::class);
    }

    public function companyImage(){
        return $this->hasOne(CompanyImage::class);
    }

    public function companyBenefit(){
        return $this->hasMany(CompanyBenefits::class);
    }
    public function companySocial(){
        return $this->hasOne(CompanySocial::class);
    }

    public function companyLocation(){
        return $this->hasMany(CompanyLocation::class);
    }

    public function pekerjaan(){
        return $this->hasMany(Pekerjaan::class);
    }

    public function applicant(){
        return $this->hasMany(Applicant::class);
    }
    

    public function note(){
        return $this->hasMany(ApplicantNote::class);
    }
}
