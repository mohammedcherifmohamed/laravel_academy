<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail - LearnHub</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    @include('includes.nav')

    <!-- Course Banner -->
    <section class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div class="max-w-3xl">
                        <!-- Wild image above the title -->
                            <img 
                                src="{{asset('storage/'.$course->image_path)}}" 
                                alt="Wild" 
                                class="object-cover rounded-lg mb-4"
                            >
                    <span class="inline-block px-3 py-1 bg-indigo-600 rounded-full text-sm font-medium mb-3">{{$course->title}}</span>
                    <p id="courseDescription" class="text-lg text-gray-300 mb-6">{!! nl2br(e( $course->description)) !!}</p>
                    <div class="flex items-center space-x-4">
                        <!-- <div class="flex items-center">
                            <div class="flex text-yellow-400 mr-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-300">4.7 (1,234 reviews)</span>
                        </div> -->
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-gray-300"></i>
                            <span class="text-gray-300">12,345 students</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 w-full md:w-80 shrink-0">
                    <div class="relative mb-4">
                        <img id="courseThumbnail" src="{{asset('storage/'.$course->image_path)}}" alt="Course thumbnail" class="w-full rounded-lg">
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span id="coursePrice" class="text-2xl font-bold text-gray-800 dark:text-white">{{$course->price}} DZ</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400 line-through">{{$course->overview->old_price ?? ""}} </span>
                    </div>
                    <button class="w-full bg-indigo-600 text-white py-3 rounded-lg font-medium hover:bg-indigo-700 mb-3">Enroll Now</button>
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                        @if($course->overview && $course->overview->duration)
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600 dark:text-gray-300">Duration:</span>
                                <span id="courseDuration" class="font-medium text-gray-800 dark:text-white">{{$course->overview->duration ?? ""}} h</span>
                            </div>
                        @endif
                         @if($course->overview && $course->overview->lessons)
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600 dark:text-gray-300">Lessons:</span>
                            <span id="courseLessons" class="font-medium text-gray-800 dark:text-white">{{$course->overview->lessons ?? ""}}</span>
                        </div>
                            @endif
                         @if($course->overview && $course->overview->level)
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-300">Level:</span>
                            <span id="courseLevel" class="font-medium text-gray-800 dark:text-white">{{$course->overview->level ?? ""}}</span>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Content -->
    <section class="py-12 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <!-- Course Tabs -->
                    @if($course->overview)
                        <div class="border-b border-gray-200 dark:border-gray-700 mb-8">
                            <nav class="flex space-x-8">
                                <button class="py-4 px-1 border-b-2 font-medium text-sm border-indigo-600 text-indigo-600 dark:text-indigo-400">Overview</button>
                            </nav>
                        </div>
                    @endif

                    <!-- What You'll Learn -->
                    @if($course->overview && $course->overview->will_learn)
                        <div class="mb-8">
                            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">What You'll Learn</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-start">
                                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                    <span class="text-gray-700 dark:text-gray-300">{!! nl2br(e($course->overview->will_learn ?? ""))!!}</span>
                                </div>
                                
                            </div>
                        </div>
                    @endif
                  
                    
                    @if($course->overview && $course->overview->description)
                        <!-- Course Curriculum -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Course Curriculum</h3>
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                                <!-- Course sections will be populated by JavaScript -->
                                <div id="courseSections" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <!-- Sections and lessons will be added here -->
                                </div>
                            </div>
                        </div>
                        <!-- Requirements -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Requirements</h3>
                            <ul class="list-disc pl-5 space-y-2 text-gray-700 dark:text-gray-300">
                                <li>{{$course->overview->requirements ?? ""}}</li>
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">

                    <!-- Instructor -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Instructor</h3>
                        <div class="flex items-start space-x-4 mb-4">
                            <img id="instructorAvatar"
                                   src="{{ $course->instructor->gender === 'female' ? asset('icons/women.png') : asset('icons/man.png') }}" 
                                    alt="Instructor" class="w-16 h-16 rounded-full">
                            <div>
                                <h4 id="instructorName" class="font-bold text-gray-800 dark:text-white">{{$course->instructor->full_name}}</h4>
                                <span id="instructorTitle" class="text-gray-600 dark:text-gray-300 text-sm">{{$course->instructor->specialization}}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 mb-4">
                      
                            <div class="flex items-center">
                                <i class="fas fa-book text-gray-500 dark:text-gray-400 mr-1"></i>
                                <span class="text-gray-800 dark:text-white">12 Courses</span>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-white">Student Reviews</h2>
            
            <!-- Rating Summary -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="text-center md:text-left mb-6 md:mb-0 md:mr-8">
                        <div class="text-5xl font-bold text-gray-800 dark:text-white mb-2">4.7</div>
                        <div class="flex justify-center md:justify-start mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-400">Based on 1,234 reviews</div>
                    </div>
                    <div class="flex-1 w-full">
                        <div class="flex items-center mb-2">
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">5 star</span>
                            <div class="flex-1 mx-2 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">75%</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">4 star</span>
                            <div class="flex-1 mx-2 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">15%</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">3 star</span>
                            <div class="flex-1 mx-2 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 7%"></div>
                            </div>
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">7%</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">2 star</span>
                            <div class="flex-1 mx-2 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 2%"></div>
                            </div>
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">2%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">1 star</span>
                            <div class="flex-1 mx-2 h-2 bg-gray-200 dark:bg-gray-700 rounded-full">
                                <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%"></div>
                            </div>
                            <span class="w-10 text-sm text-gray-600 dark:text-gray-400">1%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            <div id="reviewsList" class="space-y-6">
                <!-- Reviews will be populated by JavaScript -->
            </div>

      
        </div>
    </section>

    <!-- Related Courses -->
    <section class="py-12 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-white">You May Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Related courses will be populated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Footer (same as index.html) -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">LearnHub</h3>
                    <p class="text-gray-400">Empowering learners to achieve their goals through accessible, high-quality education.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="courses.html" class="text-gray-400 hover:text-white">Courses</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 LearnHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="app.js"></script>
</body>
</html>