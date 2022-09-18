<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\User;
use App\Models\Course;


class PDFController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();
        $courses = Course::all();
        return view('user', compact('users','courses'));
    }

public function downloadPDF()
    {
        $users = User::all();
        $courses = Course::all();
        $pdf = PDF::loadView('user', compact('users','courses'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('grades.pdf');
    }
}

 


