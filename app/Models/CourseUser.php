<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseUser extends Pivot
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(User::class, 'student_number');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_number');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
