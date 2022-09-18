<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;   

class CourseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, User $users, Request $request)
    {
        $courses = CourseUser::with('student', 'course')->where('course_id', $course->id)->get();

        return view('teacher.users.index', compact('courses', 'users', 'course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $users = $course->users()->get();
        $users = User::where('role_id',2)->get();
        
        return view('teacher.users.create', compact('users', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {

        $user = Auth::user();

        $user->courses()->attach($course->id, [
            'teacher_number' => $user->id,
            'student_number' => $request['student_number'],
            'prelim_assignment' => $request['prelim_assignment'],
            'prelim_quiz' => $request['prelim_quiz'],
            'prelim_exam' => $request['prelim_exam'],
            'midterm_assignment' => $request['midterm_assignment'],
            'midterm_quiz' => $request['midterm_quiz'],
            'midterm_exam' => $request['midterm_exam'],
            'final_assignment' => $request['final_assignment'],
            'final_quiz' => $request['final_quiz'],
            'final_exam' => $request['final_exam'],
        ]);
        
        return redirect()->route('teacher.courses.users.index', $course);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, User $users)
    {

        $courses = CourseUser::with('student', 'course')->where('course_id', $course->id)->get();
        $users = User::where('role_id',2)->get();
        
        return view('teacher.users.edit', compact('courses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, User $user)
    {
        $user = Auth::user();

        $user->courses()->updateExistingPivot($course->id, [
            'teacher_number' => $user->id,
            'student_number' => $request['student_number'],
            'prelim_assignment' => $request['prelim_assignment'],
            'prelim_quiz' => $request['prelim_quiz'],
            'prelim_exam' => $request['prelim_exam'],
            'midterm_assignment' => $request['midterm_assignment'],
            'midterm_quiz' => $request['midterm_quiz'],
            'midterm_exam' => $request['midterm_exam'],
            'final_assignment' => $request['final_assignment'],
            'final_quiz' => $request['final_quiz'],
            'final_exam' => $request['final_exam'],
        ]);
        
        return redirect()->route('teacher.courses.users.index', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $user = Auth::user();
        $user->courses()->detach($course->id);

        return redirect()->route('teacher.courses.users.index', $course);
    }
}
