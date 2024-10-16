<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;



    // public function userProfile() {
    //     return $this->belongsToMany(UserProfile::class, 'user_skills', 'user_skill_id', 'user_profile_id');
    // }
    
}
