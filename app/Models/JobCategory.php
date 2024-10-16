<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pekerjaan(){
        return $this->belongsToMany(Pekerjaan::class, 'pekerjaan_job_categories');
    }
}
