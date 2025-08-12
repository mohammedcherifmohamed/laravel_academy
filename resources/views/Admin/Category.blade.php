@extends('Admin.layout.Main')
@section('title','Categories')

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
            <!-- Categories Section -->
            <section id="categories" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6 overflow-x-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-indigo-600">Categories</h2>
                    <button onclick="openCategoryModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Category</button>
                </div>
                <table class="min-w-full border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700 text-left">
                            <th class="p-3 text-white">Icon</th>
                            <th class="p-3 text-white">Name</th>
                            <th class="p-3 text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                 @forelse($categories as $category)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
    <!-- Icon -->
                        <td class="p-3 text-white text-center">
                            <img class="w-10 h-10 object-contain rounded" src="{{ asset('icons/' . $category->icon) }}" alt="{{ $category->name }}">
                        </td>

                        <!-- Category Name -->
                        <td class="p-3 text-white align-middle">
                            {{ $category->name }}
                        </td>

                        <!-- Actions -->
                        <td class="p-3 text-white align-middle">
                            <button class="text-indigo-600 hover:underline">Edit</button> | 
                            <button class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>

                        @empty
                            <tr>
                                <td> NO Category Found </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </section>

        </main>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-indigo-600">Add New Category</h2>
            <button onclick="closeCategoryModal()" class="text-gray-500 hover:text-red-500">&times;</button>
        </div>
        <form action="{{route('category.add')}}" method="POST" class="space-y-4">
           @csrf
            <!-- Name -->
            <div>
                <label class="block mb-1 text-white">Name</label>
                <input name="name" type="text" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
            </div>

            @php
                $icons = [
                    'science.png',
                    'physics.png',
                    'math.png',
                    'languages.png',
                ];
            @endphp

            <label class="block mb-1 text-white">Icon</label>
            <select name="icon" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
                @foreach($icons as $icon)
                    <option value="{{ $icon }}">{{ ucfirst(pathinfo($icon, PATHINFO_FILENAME)) }}</option>
                @endforeach
            </select>


            <!-- Buttons -->
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeCategoryModal()" class="px-4 py-2 rounded-lg border hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function openCategoryModal() {
    document.getElementById('addCategoryModal').classList.remove('hidden');
}
function closeCategoryModal() {
    document.getElementById('addCategoryModal').classList.add('hidden');
}
</script>

@endsection
