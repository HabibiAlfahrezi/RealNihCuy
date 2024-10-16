<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userSkill()
    {
        return $this->belongsToMany(Skill::class, 'user_skills', 'user_profile_id', 'skill_id');
    }
    
    public function userSocial(){
        return $this->hasOne(UserSocial::class);
    }
    public function userExperience(){
        return $this->hasMany(UserExperience::class);
    }
    public function userEducation(){
        return $this->hasMany(userEducation::class);
    }
    public function userProject(){
        return $this->hasMany(UserProject::class);
    }

    public function userDocument(){
        return $this->hasMany(userDocument::class);
    }
}
