<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;  
 
class UserController extends Controller
{
    public function index()
    {
        $users = User::with('coursehandles')->where('role_id', 3)->get();

        return view('admin.users.index', compact('users'));
    }

    public function students()
    {
        $users = CourseUser::with('student', 'course')->get();
        
        return view('admin.users.students', compact('users'));
    }
}
