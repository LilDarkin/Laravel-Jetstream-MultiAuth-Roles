<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = Course::where('user_id',$user->id)->orderBy('id','desc')->get();

        return view('teacher.courses.index', compact('user','courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required|min:3|max:50',
            'section'=>'required', 
            'year'=>'required',
            'syllabus' => 'required|mimes:doc,docx|max:4096',
        ],[
            'name.required' => 'The Course Name must be atleast 3 characters',
        ]);

        $course = Course::create([
            'id' => $request->course_id,
            'code' => $request->code,
            'name' => $request->name,
            'section' => $request->section,
            'year' => $request->year,
        ]);

        if (request()->hasFile('syllabus')) {
            request()->file('syllabus')->storeAs('syllabus',time().'_'.$course->id.'.doc','public');
            $course->update(['syllabus' => '/storage/syllabus/'.time().'_'.$course->id.'.doc']);
        }

        return redirect()->route('teacher.courses.index');
    }

    public function edit(Course $course)
    {
        return view('teacher.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'section'=>'required', 
            'year'=>'required',   
        ]);

        $course->update($request->all());
    
        return redirect()->route('teacher.courses.index');
    }

    public function destroy(Course $course)
    {

        $course->users()->delete();
        $course->delete();
    
        return redirect()->route('teacher.courses.index')->with('success','Product deleted successfully');
    }

}
