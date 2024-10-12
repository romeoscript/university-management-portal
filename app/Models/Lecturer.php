<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Lecturer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function courses()
    {
        return $this->belongsToMany(DeptCourse::class, 'course_lecturer');
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

}
