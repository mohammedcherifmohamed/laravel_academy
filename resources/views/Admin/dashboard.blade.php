@extends('Admin.layout.Main')
@section('title','Admin Dahsboard')

@section('content')

<div class="flex h-screen overflow-hidden">

    @include('Admin.includes.SideBar')

  <!-- Main Content -->
  <div class="flex-1 flex flex-col overflow-y-auto w-full">

    @include('Admin.includes.nav')

    <!-- Main Section -->
    <main class="p-6">
    @if ($errors->any())
        <x-alert type="warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif
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
      <!-- Stats -->
      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
          <h3 class="text-gray-500 dark:text-gray-400 text-sm">Students</h3>
          <p class="text-2xl font-bold text-indigo-600">200</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
          <h3 class="text-gray-500 dark:text-gray-400 text-sm">Instructors</h3>
          <p class="text-2xl font-bold text-indigo-600">15</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
          <h3 class="text-gray-500 dark:text-gray-400 text-sm">Courses</h3>
          <p class="text-2xl font-bold text-indigo-600">32</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
          <h3 class="text-gray-500 dark:text-gray-400 text-sm">Categories</h3>
          <p class="text-2xl font-bold text-indigo-600">8</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
          <h3 class="text-gray-500 dark:text-gray-400 text-sm">Admins</h3>
          <p class="text-2xl font-bold text-indigo-600">3</p>
        </div>
      </div>

      <!-- Courses Section -->
      <section id="courses" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6 overflow-x-auto">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-bold text-indigo-600">Courses</h2>
          <button onclick="openModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Course</button>
        </div>
        <table class="min-w-full border-collapse text-sm">
          <thead>
            <tr class="bg-gray-50 dark:bg-gray-700 text-left">
              <th class="p-3 text-white">Title</th>
              <th class="p-3 text-white">Category</th>
              <th class="p-3 text-white">Price</th>
              <th class="p-3 text-white">Instructor</th>
              <th class="p-3 text-white">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
              <td class="p-3 text-white">Web Development Bootcamp</td>
              <td class="p-3 text-white">Programming</td>
              <td class="p-3 text-white">$99</td>
              <td class="p-3 text-white">Jane Smith</td>
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

<!-- Add Course Modal -->
<div id="addCourseModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-lg shadow-lg">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-bold text-indigo-600">Add New Course</h2>
      <button onclick="closeModal()" class="text-gray-500 hover:text-red-500">&times;</button>
    </div>
    <form class="space-y-4" action="{{route('course.add')}}" method="POST" enctype="multipart/form-data">
     @csrf
      <!-- Image Picker -->
      <div>
        <label class="block mb-1 text-white">Image</label>
        <input 
          name="image"
          type="file" 
          accept="image/*" 
          class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"
          onchange="previewImage(event)">
        <label class="block mt-2 text-sm text-gray-500">Preview:</label>
        <img  id="imagePreview" class="mt-2  h-32 object-cover rounded border hidden">
      </div>

      <!-- Title -->
      <div>
        <label class="block mb-1 text-white">Title</label>
        <input name="title" type="text" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
      </div>

      <!-- Description -->
      <div>
        <label  class="block mb-1 text-white">Description</label>
        <textarea name="description" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"></textarea>
      </div>

      <!-- Category -->
      <div>
        <label class="block mb-1 text-white">Category</label>
        <select name="category" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          @forelse($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @empty
            <option value="0">No Categories Available</option>
          @endforelse
              
        </select>
      </div>

      <!-- Instructor -->
      <div>
        <label class="block mb-1 text-white">Instructor</label>
        <select name="instructor" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          @forelse($instructors as $instructor)
            <option value="{{$instructor->id}}">{{$instructor->full_name}}</option>
          @empty
            <option value="0">No Instructors Available</option>
          @endforelse
        
        </select>
      </div>

      <!-- Price -->
      <div>
        <label class="block mb-1 text-white">Price</label>
        <input name="price" type="number" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 rounded-lg border hover:bg-gray-200 dark:hover:bg-gray-700">Cancel</button>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Save</button>
      </div>
    </form>
  </div>
</div>


@endsection