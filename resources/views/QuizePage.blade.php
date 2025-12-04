@extends("Layout.Main")
@section("title", "Course-Quizes")

@section('content')

@include('includes.nav')

@if(session('success'))
  <div class="fixed top-5 right-5 z-[9999]">
  <x-alert type="success" >{{session("success")}}</x-alert>

</div>
@endif  

  @if ($errors->any())
  <div class="fixed top-5 right-5 z-[9999]">



        <x-alert type="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
      
    </div>
    @endif


  <!-- Quiz Modal -->
  <div id="quizModal" class="fixed inset-0 flex items-center justify-center inset-0 bg-black/60 z-40">
    <div id="quizContent" class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg p-8 relative transform transition-all duration-300 scale-100">

      {{-- <!-- Close Button -->
      <button onclick="closeQuiz()" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition">
        <i class="fas fa-times text-xl"></i>
      </button> --}}

      <!-- Quiz Header -->
      <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-4">Course Quiz</h2>
      <p class="text-center text-gray-500 dark:text-gray-400 mb-6">Question <span id="currentPage">1</span> of <span id="totalPages">3</span></p>

      <!-- Quiz Questions -->
      <div id="quizPages">
        @forelse ($quizes as $quize)
            <h1>{{$quize->quize_type}}</h1>
            @foreach($quize->questions as $question)
              <h1>{{$question->question_text}}</h1>

              @foreach($question->options as $option)
                <label>
                  <input type="radio" name="question_{{$question->id}}" value="{{$option->option_text}}">
                  {{$option->content}}
                </label>


            @endforeach
            @endforeach
        @empty
            
        @endforelse
        {{-- <!-- Question 1 -->
        <div class="quiz-page" id="page1">
          <p class="text-lg font-medium mb-4 text-gray-800 dark:text-gray-100">1️⃣ What is the output of <code>2 + "2"</code> in JavaScript?</p>
          <div class="space-y-3">
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q1" value="4" class="mr-2"> 4
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q1" value="22" class="mr-2"> 22
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q1" value="NaN" class="mr-2"> NaN
            </label>
          </div>
        </div>

        <!-- Question 2 -->
        <div class="quiz-page hidden" id="page2">
          <p class="text-lg font-medium mb-4 text-gray-800 dark:text-gray-100">2️⃣ Which HTML tag is used to link JavaScript?</p>
          <div class="space-y-3">
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q2" value="<script>" class="mr-2"> &lt;script&gt;
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q2" value="<link>" class="mr-2"> &lt;link&gt;
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q2" value="<js>" class="mr-2"> &lt;js&gt;
            </label>
          </div>
        </div> --}}

        <!-- Question 3 -->
        {{-- <div class="quiz-page hidden" id="page3">
          <p class="text-lg font-medium mb-4 text-gray-800 dark:text-gray-100">3️⃣ Which of the following is a JavaScript framework?</p>
          <div class="space-y-3">
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q3" value="Laravel" class="mr-2"> Laravel
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q3" value="React" class="mr-2"> React
            </label>
            <label class="block p-3 border dark:border-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
              <input type="radio" name="q3" value="Django" class="mr-2"> Django
            </label>
          </div>
        </div> --}}
      </div>

      <!-- Pagination -->
      <div class="flex justify-between items-center mt-8">
        <button id="prevBtn" onclick="prevPage()" class="px-5 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition disabled:opacity-40" disabled>
          Previous
        </button>
        <button id="nextBtn" onclick="nextPage()" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
          Next
        </button>
      </div>
    </div>
  </div>

   <!-- RESULT MODAL -->
  <div id="resultModal" class="fixed inset-0 flex items-center justify-center inset-0 bg-black/60 hidden z-40 ">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md p-8 relative">

      <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-4">🎉 Quiz Result for course {{$course_id}}</h2>
      <p id="quizScore" class="text-center text-gray-600 dark:text-gray-300 mb-6"></p>

      <form action="{{ route('course.enrollAfterQuiz', ['id' => $course_id]) }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="StudentScore" value="" id="studentScore" hidden>
        <input type="text" name="studentName" value="{{auth()->user()->name}}" placeholder="Full Name" required
          class="w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-indigo-400 outline-none">

        <input type="email" name="studentEmail" value="{{auth()->user()->email}}" placeholder="Email" required
          class="w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-indigo-400 outline-none">

        <input type="text" name="studentPhone"   placeholder="Phone Number" required
          class="w-full px-4 py-3 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-indigo-400 outline-none">

        <div class="bg-gray-100 dark:bg-gray-700 p-3 rounded-lg">
          <p class="text-gray-700 dark:text-gray-300"><strong>Course:</strong> <span id="courseName"></span></p>
          <p class="text-gray-700 dark:text-gray-300"><strong>Total Price:</strong> $<span id="coursePrice"></span></p>
        </div>

        <button type="submit"
          class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
          Confirm Enrollment
        </button>
      </form>
    </div>
  </div>
 
<script>
    const quizSubmitUrl = "{{ route('course.SubmitQuiz', ['id' => $course_id]) }}";
    const csrfToken = "{{ csrf_token() }}";
</script>

@endsection