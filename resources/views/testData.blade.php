
@extends("Layout.Main")
@section("title", "Test-Quizes")

@section('content')

@include('includes.nav')

<div class="container">
    <h1>Quizzes</h1>

    @foreach($data as $quiz)
        <div class="card mb-4">
            <div class="card-header text-white">
                <strong>{{ $quiz->quize_type }} Quiz</strong> - Level: {{ $quiz->quize_level }}
            </div>
            <div class="card-body text-white">
                @foreach($quiz->questions as $question)
                    <div class="mb-3 text-white">
                        <p><strong>Q{{ $loop->iteration }}: {{ $question->question_text }}</strong></p>

                        <ul>
                            @foreach($question->options as $option)
                                <li>
                                    {{ $option->content }}
                                    @if($option->is_correct)
                                        <span class="badge bg-success text-white">Correct</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>



@endsection