<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];                                            
    public function pekerjaan(){
        return $this->belongsTo(Pekerjaan::class);
    }

    public function userProfiles()
    {
        return $this->belongsToMany(UserProfile::class, 'user_skills', 'skill_id', 'user_profile_id');
    }
}
