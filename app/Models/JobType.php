<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function pekerjaan(){
        return $this->belongsToMany(Pekerjaan::class, 'pekerjaan_job_type');
    }
}
