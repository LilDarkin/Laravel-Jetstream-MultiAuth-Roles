<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('teacher_number')->references('id')->on('users');
            $table->foreignId('student_number')->references('id')->on('users');
            $table->integer('prelim_assignment')->nullable();
            $table->integer('prelim_quiz')->nullable();
            $table->integer('prelim_exam')->nullable();
            $table->integer('midterm_assignment')->nullable();
            $table->integer('midterm_quiz')->nullable();
            $table->integer('midterm_exam')->nullable();
            $table->integer('final_assignment')->nullable();
            $table->integer('final_quiz')->nullable();
            $table->integer('final_exam')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
