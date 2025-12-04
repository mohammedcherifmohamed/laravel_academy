@extends('Admin.layout.Main')
@section('title','Admin Dahsboard')

@section('content')

<div class="flex h-screen ">

    @include('Admin.includes.SideBar')

  <!-- Main Content -->
  <div class="flex-1 flex flex-col  w-full">

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
          <button onclick="openCourseModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">+ Add Course</button>
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
             @forelse($courses as $course)
                <td class="p-3 text-white">{{$course->title}}</td>
                <td class="p-3 text-white">{{$course->category->name}}</td>
                <td class="p-3 text-white">{{$course->price}}</td>
                <td class="p-3 text-white">{{$course->instructor->full_name}}</td>
            

              <td class="flex p-3 text-white">
                <button type="button" onclick="openEditCourseModel({{$course->id}})" class="text-indigo-600 px-3 hover:underline">Edit</button> |
                <form
                   onsubmit="return confirm('Are you sure you want to delete this course?');" 
                   action="{{route('course.delete',$course->id)}}"
                    method="POST"
                  class="px-3"
                  >
                  @csrf
                  @method('DELETE')
                  <button class="text-red-600 hover:underline">Delete</button>
                </form>
              </td>
            </tr> 
             @empty
                <td colspan="5" class="p-3 text-center text-gray-500">
                  No Courses Found
                </td>
              @endforelse
          </tbody>
        </table>
      </section>

    </main>
  </div>
</div>

<!-- Add Course Modal -->
<div id="addCourseModal"
     class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto h-screen ">
  <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-full max-w-4xl shadow-lg my-10 h-full overflow-y-auto">
    <!-- Modal Header -->
    <div class="flex justify-between items-center mb-6 border-b pb-3">
      <h2 class="text-xl font-bold text-indigo-600">Add New Course</h2>
      <button onclick="closeCourseModal()" class="text-gray-500 hover:text-red-500 text-2xl leading-none">&times;</button>
    </div>

    <form id="addCourseForm" class="space-y-6" action="{{ route('course.add') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- 2 Column Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Left Column -->
        <div class="space-y-4">
          <!-- Image Picker -->
          <div>
            <label class="block mb-1 font-semibold text-white">Image</label>
            <input name="image" type="file" accept="image/*" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600" 
              onchange="previewImage(event)">
            <p class="text-sm text-gray-500 mt-1">Preview:</p>
            <img id="imagePreview" class="mt-2 h-32 w-full object-cover rounded border hidden">
          </div>

          <!-- Title -->
          <div>
            <label class="block mb-1 font-semibold text-white">Title</label>
            <input name="title" type="text" value="{{ old('title') }}" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          </div>

          <!-- Description -->
          <div>
            <label class="block mb-1 font-semibold text-white">Description</label>
            <textarea id="courseDescription" name="description" rows="4"
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">{{ old('description') }}</textarea>
          </div>

          <!-- Category -->
          <div>
            <label class="block mb-1 font-semibold text-white">Category</label>
            <select name="category" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
              @forelse($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @empty
                <option value="0">No Categories Available</option>
              @endforelse
            </select>
          </div>

          <!-- Instructor -->
          <div>
            <label class="block mb-1 font-semibold text-white">Instructor</label>
            <select  name="instructor" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
              @forelse($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->full_name }}</option>
              @empty
                <option value="0">No Instructors Available</option>
              @endforelse
            </select>
          </div>

          <!-- Price -->
          <div>
            <label class="block mb-1 font-semibold text-white">Price</label>
            <input name="price" type="number" value="{{ old('price') }}" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          </div>
          {{-- Quize --}}
          <div>
            <label class="block mb-1 font-semibold text-white">Attach Quize</label>
            <select name="quize_type" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
              <option value="0">No Quize required</option>
              @forelse($quizes as $quize)
                <option value="{{ $quize->id}}">{{ $quize->quize_type }}</option>
              @empty
                <option value="0">No Quize Available</option>
              @endforelse
            </select>
          </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4">
          <span class="text-red-800 text-bold text-l italic" >This section is not mandatory, but it is recommended that the student fill it out with sufficient information.</span>
          <!-- Duration -->
          <div>
            <label class="block mb-1 font-semibold text-white">Duration</label>
            <input name="duration" type="number" value="{{ old('duration') }}" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          </div>

          <!-- Lessons -->
          <div>
            <label class="block mb-1 font-semibold text-white">Lessons</label>
            <input name="lessons" type="number" value="{{ old('lessons') }}" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          </div>

          <!-- Level -->
          <div>
            <label class="block mb-1 font-semibold text-white">Level</label>
            <select name="level" class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
              <option value="">Select Level</option>
              <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
              <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
              <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
          </div>

          <!-- Old Price -->
          <div>
            <div class="flex" >
              <label class="block mb-1 font-semibold text-white">Old Price </label>
              <span class="text-red-800 text-bold text-l italic" > (if ther is discount)</span>
            </div>
            
            <input name="old_price" type="number" value="{{ old('old_price') }}" 
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">
          </div>

          <!-- Requirements -->
          <div>
            <label class="block mb-1 font-semibold text-white">Requirements</label>
            <textarea id="requirements" name="requirements" rows="4"
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">{{ old('requirements') }}</textarea>
          </div>
          <!-- what will learn -->
          <div>
            <label class="block mb-1 font-semibold text-white">what will learn</label>
            <textarea id="will_learn" name="will_learn" rows="4"
              class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600">{{ old('will_learn') }}</textarea>
          </div>

        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-3 border-t pt-4">
        <button type="button" onclick="closeCourseModal()" 
          class="px-4 py-2 rounded-lg border dark:border-gray-600 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300">
          Cancel
        </button>
        <button type="submit" 
          class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
          Save
        </button>
      </div>
    </form>
  </div>
</div>



@endsection