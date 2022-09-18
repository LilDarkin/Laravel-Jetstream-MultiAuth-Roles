<!DOCTYPE html>
<html>
    <head>
        <title>Manila University - Grades Slip</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

    <body>
        <div>
            @foreach($users as $user)
                @foreach($user->courses as $course)
                    @if($course->pivot->student_number == Auth::user()->id)
                    
                    <h1 class="text-center font-weight-bold">Manila University - Grades Slip</h1>
                    <br><br>
                    
                    <h3 class="font-weight-normal">Name: {{ $course->pivot->student->name }}</h3>
                    <h4 class="font-weight-normal">Student Number: {{ $course->pivot->student->student_number }}</h4>
                    <h4 class="font-weight-normal">Year: {{ $course->pivot->student->year }}</h4>
                    <br><br>

                    @endif
                @endforeach                
            @endforeach
        </div>

        <table class="min-w-full text-center border">
            <thead class="table-dark">
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
                <th scope="col" class="text-sm table-primary text-dark px-6 py-4">
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
                <th scope="col" class="text-sm table-primary text-dark px-6 py-4">
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
                <th scope="col" class="text-sm table-primary text-dark px-6 py-4">
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
                    <td class="table-info text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $prelim = number_format(round((0.50*(($course->pivot->prelim_assignment + $course->pivot->prelim_quiz)/2) + (0.50*($course->pivot->prelim_exam)))), 2) }}</td>

                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_assignment }}</td>
                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_quiz }}</td>
                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->midterm_exam }}</td>
                    <td class="table-info text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $midterm = number_format(round(($prelim/3) + ((2*(0.50*(($course->pivot->midterm_assignment + $course->pivot->midterm_quiz)/2) + (0.50*($course->pivot->midterm_exam))))/3)), 2) }}</td>

                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_assignment }}</td>
                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_quiz }}</td>
                    <td class="text-sm text-gray-900 font-light py-4 whitespace-nowrap">{{ $course->pivot->final_exam }}</td>
                    <td class="table-info text-sm text-gray-900 font-bold py-4 whitespace-nowrap bg-blue-100">{{ $final = number_format(round($midterm/3) + ((2*(0.50*(($course->pivot->final_assignment + $course->pivot->final_quiz)/2) + (0.50*($course->pivot->final_exam))))/3), 2) }}</td>

                    @if($course->pivot->student_number != Auth::user()->id)
                    <p class="rounded mb-5 border-8 border-red-500 text-2xl font-black bg-red-500 text-white text-center font-size-50">No Enrolled Courses</p>            
                    @endif

                    @endif
                    @endforeach
                @endforeach
                
                </tr>
            </tbody>
        </table>
    </body>
</html>
