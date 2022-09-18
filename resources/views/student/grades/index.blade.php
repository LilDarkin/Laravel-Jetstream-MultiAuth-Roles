<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">      

                    <div class="row">
                        <div class="col-lg-6 mt-5 ml-8">
                            <div class="pull-right">
                                <a type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" href="{{ route('downloadPDF') }}">Export Grades</a>
                            </div>
                        </div>
                    </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="flex flex-col ml-5 mr-5">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-5">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">

                    <table class="min-w-full text-center border">
                        <thead class="border-b bg-gray-800">
                            <tr>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Code
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Name
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Teacher
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Prelim Assignment
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Prelim Quiz
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Prelim Exam
                            </th>
                            <th scope="col" class="text-sm bg-blue-500 text-white px-6 py-4">
                                Prelim Grade
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Midterm Assignment
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Midterm Quiz
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Midterm Exam
                            </th>
                            <th scope="col" class="text-sm bg-blue-500 text-white px-6 py-4">
                                Midterm Grade
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Final Assignment
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Final Quiz
                            </th>
                            <th scope="col" class="text-sm text-white px-6 py-4">
                                Final Exam
                            </th>
                            <th scope="col" class="text-sm bg-blue-500 text-white px-6 py-4">
                                Final Grade
                            </th>
                            </tr>
                        </thead class="border-b">
                        <tbody>
                            @foreach($users as $user)
                                @foreach($user->courses as $course)
                                @if($course->pivot->student_number == Auth::user()->id)
                        
                            <tr class="bg-white border-b">
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->code }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->name }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->teacher->name }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->prelim_assignment }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->prelim_quiz }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->prelim_exam }}</td>
                                <td class="text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $prelim = number_format(round((0.50*(($course->pivot->prelim_assignment + $course->pivot->prelim_quiz)/2) + (0.50*($course->pivot->prelim_exam)))), 2) }}</td>
            
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_assignment }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_quiz }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_exam }}</td>
                                <td class="text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $midterm = number_format(round(($prelim/3) + ((2*(0.50*(($course->pivot->midterm_assignment + $course->pivot->midterm_quiz)/2) + (0.50*($course->pivot->midterm_exam))))/3)), 2) }}</td>
            
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_assignment }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_quiz }}</td>
                                <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_exam }}</td>
                                <td class="text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $final = number_format(round($midterm/3) + ((2*(0.50*(($course->pivot->final_assignment + $course->pivot->final_quiz)/2) + (0.50*($course->pivot->final_exam))))/3), 2) }}</td>

                                @if($course->pivot->student_number != Auth::user()->id)
                                <p class="rounded mb-5 border-8 border-red-500 text-2xl font-black bg-red-500 text-white text-center font-size-50">No Enrolled Courses</p>            
                                @endif

                                @endif
                                @endforeach
                            @endforeach
                            
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>

</div>
</div>
</div>
</div>

</x-teacher-layout>