@extends('Admin.layout.Main')
@section('title','Admins')

@section('content')

<div class="flex h-screen overflow-hidden">

    @include('Admin.includes.SideBar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-y-auto w-full">

        @include('Admin.includes.nav')

        <!-- Main Section -->
        <main class="p-6">

            <!-- Admins Section -->
            <section id="admins" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6 overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-indigo-600">Admins</h2>
                    <button onclick="openAdminModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Admin</button>
                </div>
                <table class="min-w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-left">
                            <th class="p-3 text-white">Name</th>
                            <th class="p-3 text-white">Email</th>
                            <th class="p-3 text-white">Role</th>
                            <th class="p-3 text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-3 text-white">John Doe</td>
                            <td class="p-3 text-white">john@example.com</td>
                            <td class="p-3 text-white">Super Admin</td>
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

<!-- Add Admin Modal -->
<div id="addAdminModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-indigo-600">Add New Admin</h2>
            <button onclick="closeAdminModal()" class="text-gray-500 hover:text-red-500">&times;</button>
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

            <!-- Role -->
            <div>
                <label class="block mb-1 text-white">Role</label>
                <select class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                    <option value="">Select Role</option>
                    <option>Super Admin</option>
                    <option>Admin</option>
                    <option>Moderator</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label class="block mb-1 text-white">Password</label>
                <input type="password" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeAdminModal()" class="px-4 py-2 rounded-lg border hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function openAdminModal() {
    document.getElementById('addAdminModal').classList.remove('hidden');
}
function closeAdminModal() {
    document.getElementById('addAdminModal').classList.add('hidden');
}
</script>

@endsection
