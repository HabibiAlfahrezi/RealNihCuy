<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function note()
    {
        return $this->hasMany(ApplicantNote::class);
    }
    
}
