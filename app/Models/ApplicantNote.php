<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantNote extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
