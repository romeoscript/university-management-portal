<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(DeptCourse::class, 'course_id');
    }
}
