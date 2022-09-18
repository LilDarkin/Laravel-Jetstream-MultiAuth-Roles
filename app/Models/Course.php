<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'name',
        'section',
        'year',
        'syllabus',
    ];

    protected static function boot()
    {
        parent::boot();

        self::creating(function($model)
        {
            $model->user_id = auth()->id();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withTimestamps()
            ->withPivot('id', 'teacher_number', 'prelim_assignment', 'prelim_quiz', 'prelim_exam', 'midterm_assignment', 'midterm_quiz', 'midterm_exam', 'final_assignment', 'final_quiz', 'final_exam')
            ->using(CourseUser::class);
    }
}
