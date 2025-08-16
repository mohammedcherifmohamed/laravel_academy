@extends("Layout.Main")
@section("title", "Home")

@section('content')
@php
    use Illuminate\Support\Str;
@endphp
    @include('includes.nav')

    <!-- Course Listing Header -->
    <section class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Browse Our Courses</h1>
            <p class="text-lg md:text-xl mb-6 max-w-2xl">Find the perfect course to advance your skills and career.</p>
            <div class="relative max-w-2xl">
                <input type="text" id="courseSearch" placeholder="Search courses..." class="w-full px-4 py-3 rounded-lg text-white-800 ring-2 focus:outline-none  focus:ring-2 focus:ring-indigo-400">
                <button id="searchButton" class="absolute right-2 top-2 bg-indigo-600 text-white px-4 py-1 rounded-md hover:bg-indigo-700">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Course Filters -->
    <section class="py-8 bg-white dark:bg-gray-800 shadow-sm transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center space-x-4">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Filter by:</span>
                    <select id="categoryFilter" class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                        <option value="0">All Categories</option>
                        <!-- Categories will be populated by JavaScript -->
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <select id="levelFilter" class="px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                        <option value="all">All Levels</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Course List -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="mb-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">All Courses</h2>
            </div>
            <div id="courseList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Courses will be populated by JavaScript -->
               @forelse($courses as $course)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                        <img src="{{asset('storage/'.$course->image_path)}}" alt="JavaScript for Beginners" class="w-full h-48 object-cover">
                        <div class="p-4">
                        {{-- <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">New</span> --}}
                        <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">{{$course->title}}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{$course->category->name}}</p>
                        <div class="flex items-center mt-2">
                            <img src="{{$course->instructor->gender === "female" ? asset('icons/women.png') : asset('icons/man.png')}}" alt="Alice Johnson" class="w-8 h-8 rounded-full mr-2">
                            <span class="text-sm text-gray-700 dark:text-gray-200">{{$course->instructor->full_name}}</span>
                        </div>
                        <p class="mt-2 text-yellow-500">
                            <span class="text-gray-500 dark:text-gray-400">({{$course->overview->duration ?? "N/H"}} hrs)</span>
                        </p>
                        {{-- display description with break lines as wrotten --}}
                        <p class="text-gray-600 dark:text-gray-300 mt-2"> {!! nl2br(e(Str::limit($course->description,80," ..."))) !!}</p>
                        <p class="text-xl font-bold mt-4 text-gray-800 dark:text-white">{{$course->price}} DZ</p>
                        <a href="{{route('course.view',$course->id)}}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Course</a>
                        </div>
                    </div>
               @empty
                <h1>No Courses Found</h1>
               @endforelse
            </div>
            <!-- Pagination -->
               <div class="mt-12 flex justify-center">
                    {{ $courses->links('pagination::tailwind') }}
                </div>
        </div>
    </section>

    
    @include('includes.footer')
<script>
    const courseBaseUrl = "{{ url('/home/courses/view') }}";
</script>
@endsection