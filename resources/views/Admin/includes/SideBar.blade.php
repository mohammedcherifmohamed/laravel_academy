

  <!-- Sidebar -->
  <aside id="sidebar" 
    class="fixed md:static inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 shadow-md 
           transform -translate-x-full md:translate-x-0 
           transition-transform duration-200 z-50">
    <div class="p-6 font-bold text-xl border-b border-gray-200 dark:border-gray-700 text-indigo-600">
      🎓 Academy Admin
    </div>
    <nav class="p-4 space-y-2">
      <a href="{{route('admin.dashboard')}}" class=" {{Route::is('admin.dashboard') ? 'bg-gray-600' : ""}} text-white block px-4 py-2 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700">Courses</a>
      <a href="{{route('admin.Students')}}" class=" {{Route::is('admin.Students') ? 'bg-gray-600' : ""}} text-white block px-4 py-2 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700">Students</a>
      <a href="{{route('admin.instructors')}}" class=" {{Route::is('admin.instructors') ? 'bg-gray-600' : ""}} text-white block px-4 py-2 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700">Instructors</a>
      <a href="{{route('admin.categories')}}" class=" {{Route::is('admin.categories') ? 'bg-gray-600' : ""}} text-white block px-4 py-2 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700">Categories</a>
      <a href="{{route('admin.admins')}}" class=" {{Route::is('admin.admins') ? 'bg-gray-600' : ""}} text-white block px-4 py-2 rounded-lg hover:bg-indigo-100 dark:hover:bg-gray-700">Admins</a>
    </nav>
  </aside>