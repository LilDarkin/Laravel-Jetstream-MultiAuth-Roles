<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Teachers') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-5 ">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">      

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
                    Name
                </th>
                <th scope="col" class="text-sm text-white px-6 py-4">
                    Email Address
                </th>
                <th scope="col" class="text-sm text-white px-6 py-4">
                    Handled Courses
                </th>
                </tr>
            </thead class="border-b">
            <tbody>
                @foreach($users as $user)
                <tr class="bg-white border-b">
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>

                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        <ul>
                            @foreach($user->coursehandles as $coursehandle)
                                <li>{{ $coursehandle->name }}</li>
                            @endforeach
                        </ul>
                    </td>

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
</x-admin-layout>
