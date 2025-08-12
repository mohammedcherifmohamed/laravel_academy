@extends('Admin.layout.Main')
@section('title','Admin Dashboard')

@section('content')

<div class="flex h-screen overflow-hidden">

    @include('Admin.includes.SideBar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-y-auto w-full">

        @include('Admin.includes.nav')

        <!-- Main Section -->
        <main class="p-6">

            <!-- Students Section -->
            <section id="students" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6 overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-indigo-600">Students</h2>
                    <button onclick="openStudentModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Student</button>
                </div>
                <table class="min-w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-left">
                            <th class="p-3 text-white">Name</th>
                            <th class="p-3 text-white">Email</th>
                            <th class="p-3 text-white">Course</th>
                            <th class="p-3 text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3 text-white">Ahmed Ali</td>
                            <td class="p-3 text-white">ahmed@example.com</td>
                            <td class="p-3 text-white">Web Development</td>
                            <td class="p-3 text-white">
                                <button class="text-indigo-600 hover:underline">Edit</button> |
                                <button class="text-red-600 hover:underline">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

        </main>
    </div>
</div>

<!-- Add Student Modal -->
<div id="addStudentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-indigo-600">Add New Student</h2>
            <button onclick="closeStudentModal()" class="text-gray-500 hover:text-red-500">&times;</button>
        </div>
        <form class="space-y-4">
            <!-- Name -->
            <div>
                <label class="block mb-1 text-white">Name</label>
                <input type="text" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-1 text-white">Email</label>
                <input type="email" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            <!-- Course -->
            <div>
                <label class="block mb-1 text-white">Course</label>
                <select class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <option value="">Select Course</option>
                    <option>Web Development</option>
                    <option>Design Basics</option>
                    <option>Marketing 101</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeStudentModal()" class="px-4 py-2 rounded-lg border hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function openStudentModal() {
    document.getElementById('addStudentModal').classList.remove('hidden');
}
function closeStudentModal() {
    document.getElementById('addStudentModal').classList.add('hidden');
}
</script>

@endsection
