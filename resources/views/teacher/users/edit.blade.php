<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach($courses as $course)
            {{ __('Edit Grades - ') }} {{ $course->student->name }} 
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">        
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
   
                    @foreach($courses as $course)
                    <form action="{{ route('teacher.courses.users.update', ['course'=>$course->course_id,'user'=>$course->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap m-5">
                            <div class="w-full px-3">
                                <label for="student_number" class="block text-black text-sm font-bold mb-2">Student Name</label>
                                <select name="student_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="{{ $course->student_number }}">{{ $course->student->name }}</option>
                                </select>                            
                            </div>
                        </div>

                        <!--PRELIM-->
                        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2 ml-8 mr-8">
                            Prelim
                          </div>
                          <div class="border border-t-0 rounded-b bg-blue-100 px-4 py-3 ml-8 mr-8">
                        <div class="flex flex-wrap m-5">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Assignment</label>
                                <input type="number" value="{{ $course->prelim_assignment }}" name="prelim_assignment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Quiz</label>
                                <input type="number" value="{{ $course->prelim_quiz }}" name="prelim_quiz" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Exam</label>
                                <input type="number" value="{{ $course->prelim_exam }}" name="prelim_exam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                          </div>
                        </div>

                        <br>

                        <!--MIDTERM-->
                        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2 ml-8 mr-8">
                            Midterm
                          </div>
                          <div class="border border-t-0 rounded-b bg-blue-100 px-4 py-3 ml-8 mr-8">
                        <div class="flex flex-wrap m-5">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Assignment</label>
                                <input type="number" value="{{ $course->midterm_assignment }}" name="midterm_assignment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Quiz</label>
                                <input type="number" value="{{ $course->midterm_quiz }}" name="midterm_quiz" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Exam</label>
                                <input type="number" value="{{ $course->midterm_exam }}" name="midterm_exam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                          </div>
                        </div>

                        <br>

                        <!--FINAL-->
                        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2 ml-8 mr-8">
                            Final
                          </div>
                          <div class="border border-t-0 rounded-b bg-blue-100 px-4 py-3 ml-8 mr-8">
                        <div class="flex flex-wrap m-5">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Assignment</label>
                                <input type="number" value="{{ $course->final_assignment }}" name="final_assignment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Quiz</label>
                                <input type="number" value="{{ $course->final_quiz }}" name="final_quiz" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block text-black text-sm font-bold mb-2">Exam</label>
                                <input type="number" value="{{ $course->final_exam }}" name="final_exam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                          </div>
                        </div>

                        <div class="flex flex-wrap m-5">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit Grades</button>
                                <a type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" href="{{ route('teacher.courses.users.index', $course->course_id) }}"> Back</a>
                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</x-teacher-layout>
