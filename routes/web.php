<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teachers\CourseController;
use App\Http\Controllers\CourseUserController;
use App\Http\Controllers\Students\GradeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PDFController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('grades', \App\Http\Controllers\Students\GradeController::class);
    });
    
   Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function() {
        Route::resource('courses', \App\Http\Controllers\Teachers\CourseController::class);
        Route::resource('courses.users', \App\Http\Controllers\CourseUserController::class);
   });

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::get('students', [\App\Http\Controllers\Admin\UserController::class, 'students'])->name('admin.students');
    });
});

// Export PDF
Route::get('/get-all-user', [\App\Http\Controllers\PDFController::class,'getAllUsers'])->name('getAllUsers');
Route::get('/download.pdf', [\App\Http\Controllers\PDFController::class, 'downloadPDF'])->name('downloadPDF');