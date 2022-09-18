<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;   

class GradeController extends Controller
{

    public function index()
    {
        $users = User::with('courses')->get();
        
        return view('student.grades.index', compact('users'));
    }

}
