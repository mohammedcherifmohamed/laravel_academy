
@extends('Admin.layout.Main')
@section('title','Instructors')

@section('content')

<div class="flex h-screen overflow-hidden">

    @include('Admin.includes.SideBar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-y-auto w-full">

        @include('Admin.includes.nav')

        <!-- Main Section -->
        <main class="p-6">

            @if(session('success'))
                <x-alert type="success">
                    {{session('success')}}
                </x-alert>
            @endif
            @if(session('Fail'))
                <x-alert type="warning">
                    {{session('Fail')}}
                </x-alert>
            @endif
            <!-- Instructors Section -->
            <section id="instructors" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6 overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-indigo-600">Instructors</h2>
                    <button onclick="openInstructorModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Instructor</button>
                </div>
                <table class="min-w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-left">
                            <th class="p-3 text-white">Name</th>
                            <th class="p-3 text-white">Email</th>
                            <th class="p-3 text-white">Specialization</th>
                            <th class="p-3 text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($instructors as $instructor)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="p-3 text-white">{{$instructor->full_name}}</td>
                                <td class="p-3 text-white">{{$instructor->email}}</td>
                                <td class="p-3 text-white">{{$instructor->specialization}}</td>
                                <td class="p-3 text-white">
                                    <form onsubmit="return confirm('Are you sure you want to delete this instructor?');" action="{{route('instructor.delete',$instructor->id)}}" method="POST" >
                                        @csrf        
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline" type="submit"  >Delete</button>
                                    </form>
                                        <button class="text-indigo-600 hover:underline" onclick="openEditModel({{$instructor->id}})" >Edit</button> |
                                </td>
                            </tr>
                            @empty 
                            <tr>
                                <td> NO Instructor Found </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </section>

        </main>
    </div>
</div>

<!-- Add Instructor Modal -->
<div id="addInstructorModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-indigo-600">Add New Instructor</h2>
            <button onclick="closeInstructorModal()" class="text-gray-500 hover:text-red-500">&times;</button>
        </div>
        <form id="instructorForm" class="space-y-4" action="{{route('instructor.add')}}" method="POST" >
            @csrf
            <!-- Name -->
            <div>
                <label class="block mb-1 text-white">Name</label>
                <input name="name" type="text" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-1 text-white">Email</label>
                <input name="email" type="email" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            <!-- Specialization -->
            <div>
                <label class="block mb-1 text-white">Specialization</label>
                <input name="specialization" type="text" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>
            {{-- gender --}}
                <div> 
                    <label class="block mb-1 text-white">Gender</label> 
                    <div> 
                        <input id="male" name="gender" type="radio" value="male"> 
                        <label for="male" class="ml-2 text-white">Male</label> 
                    </div> 
                    <div> 
                        <input id="female" name="gender" type="radio" value="female"> 
                        <label for="female" class="ml-2 text-white">Female</label> 
                    </div> 
                </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeInstructorModal()" class="px-4 py-2 rounded-lg border hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>


@endsection
