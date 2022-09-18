<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<x-teacher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Handled Courses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="row">
                        <div class="col-lg-12 mt-5 ml-8">
                            <div class="pull-right">
                                <a type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('teacher.courses.create') }}"> &plus; Add Course Handle</a>
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
                                                    Section
                                                </th>
                                                <th scope="col" class="text-sm text-white px-6 py-4">
                                                    Year
                                                </th>
                                                <th scope="col" class="text-sm text-white px-6 py-4">
                                                    Course Syllabus
                                                </th>
                                                <th scope="col" class="text-sm text-white px-6 py-4">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead class="border-b">

                                        <tbody>
                                            @foreach($courses as $course)
                                            <tr class="bg-white border-b">
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $course->code }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $course->name }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $course->section }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $course->year }}</td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <a class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="http://127.0.0.1:8000{{ $course->syllabus }}">Download Now</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST">
                                                        <a type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('teacher.courses.users.index', $course->id) }}">View Students</a>
                                                        <a type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('teacher.courses.edit', $course->id) }}">Edit</a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
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