@extends("Layout.Main")
@section("title", "Home")

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Learn Without Limits</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">Start, switch, or advance your career with over 5,000 courses, Professional Certificates, and degrees from world-class universities and companies.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="register.html" class="px-8 py-3 bg-white text-indigo-600 font-bold rounded-lg hover:bg-gray-100 transition duration-300">Join for Free</a>
                <a href="courses.html" class="px-8 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-indigo-600 transition duration-300">Explore Courses</a>
            </div>
        </div>
    </section>

    <!-- Course Categories -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">Popular Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- Category cards will be populated by JavaScript -->
                  <!-- Web Development -->
      <a href="category.html?id=1" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/web-dev-icon.png" alt="Web Development" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Web Development</span>
      </a>
      
      <!-- Data Science -->
      <a href="category.html?id=2" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/data-science-icon.png" alt="Data Science" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Data Science</span>
      </a>
      
      <!-- Design -->
      <a href="category.html?id=3" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/design-icon.png" alt="Design" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Design</span>
      </a>
      
      <!-- Business -->
      <a href="category.html?id=4" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/business-icon.png" alt="Business" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Business</span>
      </a>
      
      <!-- Marketing -->
      <a href="category.html?id=5" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/marketing-icon.png" alt="Marketing" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Marketing</span>
      </a>
      
      <!-- Photography -->
      <a href="category.html?id=6" class="flex flex-col items-center p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition">
        <img src="images/photography-icon.png" alt="Photography" class="w-16 h-16 mb-2">
        <span class="text-gray-800 dark:text-white font-medium">Photography</span>
      </a>
            </div>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Featured Courses</h2>
                <a href="courses.html" class="text-indigo-600 dark:text-indigo-400 font-medium hover:underline">View All</a>
            </div>
            <div id="courseList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Featured courses will be populated by JavaScript -->
              
      <!-- JavaScript for Beginners -->
      <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
        <img src="images/js-course.jpg" alt="JavaScript for Beginners" class="w-full h-48 object-cover">
        <div class="p-4">
          <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">New</span>
          <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">JavaScript for Beginners</h3>
          <p class="text-sm text-gray-600 dark:text-gray-300">Category: Web Development</p>
          <div class="flex items-center mt-2">
            <img src="images/alice.jpg" alt="Alice Johnson" class="w-8 h-8 rounded-full mr-2">
            <span class="text-sm text-gray-700 dark:text-gray-200">Alice Johnson</span>
          </div>
          <p class="mt-2 text-yellow-500">
            ★ 4.8 <span class="text-gray-500 dark:text-gray-400">(12 hrs)</span>
          </p>
          <p class="text-gray-600 dark:text-gray-300 mt-2">Learn JavaScript from scratch with hands-on examples and projects.</p>
          <p class="text-xl font-bold mt-4 text-gray-800 dark:text-white">$39.99</p>
          <a href="course-detail.html?id=1" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Course</a>
        </div>
      </div>

      <!-- Data Science with Python -->
      <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
        <img src="images/python-course.jpg" alt="Data Science with Python" class="w-full h-48 object-cover">
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">Data Science with Python</h3>
          <p class="text-sm text-gray-600 dark:text-gray-300">Category: Data Science</p>
          <div class="flex items-center mt-2">
            <img src="images/bob.jpg" alt="Bob Smith" class="w-8 h-8 rounded-full mr-2">
            <span class="text-sm text-gray-700 dark:text-gray-200">Bob Smith</span>
          </div>
          <p class="mt-2 text-yellow-500">
            ★ 4.7 <span class="text-gray-500 dark:text-gray-400">(15 hrs)</span>
          </p>
          <p class="text-gray-600 dark:text-gray-300 mt-2">Analyze data and build predictive models using Python.</p>
          <p class="text-xl font-bold mt-4 text-gray-800 dark:text-white">$59.99</p>
          <a href="course-detail.html?id=2" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Course</a>
        </div>
      </div>

      <!-- UI/UX Design Masterclass -->
      <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
        <img src="images/design-course.jpg" alt="UI/UX Design Masterclass" class="w-full h-48 object-cover">
        <div class="p-4">
          <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full">New</span>
          <h3 class="text-lg font-semibold mb-2 text-gray-800 dark:text-white">UI/UX Design Masterclass</h3>
          <p class="text-sm text-gray-600 dark:text-gray-300">Category: Design</p>
          <div class="flex items-center mt-2">
            <img src="images/charlie.jpg" alt="Charlie Brown" class="w-8 h-8 rounded-full mr-2">
            <span class="text-sm text-gray-700 dark:text-gray-200">Charlie Brown</span>
          </div>
          <p class="mt-2 text-yellow-500">
            ★ 4.9 <span class="text-gray-500 dark:text-gray-400">(10 hrs)</span>
          </p>
          <p class="text-gray-600 dark:text-gray-300 mt-2">Create stunning and user-friendly designs with Figma.</p>
          <p class="text-xl font-bold mt-4 text-gray-800 dark:text-white">$45.00</p>
          <a href="course-detail.html?id=3" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Course</a>
        </div>
      </div>

            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800 dark:text-white">What Our Students Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-indigo-600 font-bold">JD</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800 dark:text-white">John Doe</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"The courses here are top-notch. I was able to transition to a new career in just 6 months!"</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-indigo-600 font-bold">AS</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800 dark:text-white">Alice Smith</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"The instructors are knowledgeable and the platform is easy to use. Highly recommended!"</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                            <span class="text-indigo-600 font-bold">RJ</span>
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800 dark:text-white">Robert Johnson</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"I've taken several courses and each one has helped me grow professionally. Great value!"</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-indigo-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to start learning?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Join thousands of learners worldwide and start your learning journey today.</p>
            <a href="register.html" class="px-8 py-3 bg-white text-indigo-600 font-bold rounded-lg hover:bg-gray-100 transition duration-300 inline-block">Get Started</a>
        </div>
    </section>

    @include('includes.footer')

@endsection