<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendToStudent;
use App\Mail\SendEnrollmentToAdmin;
use App\Models\Dashboard;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Admin\StudentsController ;


class EnrollController extends Controller
{

public function enrollCourse(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'studentName' => 'required|string|max:255',
            'studentEmail' => 'required|email|max:255',
            'studentPhone' => 'required|string|max:10|min:10',
        ]);

        $course = Dashboard::findOrFail($id);

        $data = [
            'course_name' => $course->title,
            'student_email' => $validated['studentEmail'],
            'course_price' => $course->price,
            'course_duration' => $course->duration,
            'student_name' => $validated['studentName'],
            'phone' => $validated['studentPhone'],
            'subject' => 'Enrollment Confirmation',
            'message' => 'You have successfully enrolled in the course.',
        ];

        $AdminData = [
            'course_name' => $course->title,
            'course_price' => $course->price,
            'course_duration' => $course->duration,
            'student_name' => $validated['studentName'],
            'student_email' => $validated['studentEmail'],
            'phone' => $validated['studentPhone'],
            'subject' => 'New Course Enrollment',
            'message' => 'A new student has enrolled in the course.',
        ];

        // Send email To Student 
        Mail::to($validated['studentEmail'])->send(new SendToStudent($data));
        // Send email To Admin
        Mail::to('mdg85505@gmail.com')->send(new SendEnrollmentToAdmin($AdminData));

        // save it as student in database
        $studentcontroller = new StudentsController ();
        $studentcontroller->addStudent($data);


        return redirect()->back()->with('success', 'Enrollment successful. Emails sent!');

    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}

public function GetQuizPage(Request $req , $id){

    return view("QuizePage",["course_id"=>$id]);
}

public function SubmitQuiz(Request $req, $id){

    // Get answers from request
    $answers = $req->all();

    // Example correct answers
    $correctAnswers = [
        'q1' => '22',
        'q2' => '<script>',
        'q3' => 'React'
    ];

    // Calculate score
    $score = 0;
    foreach ($correctAnswers as $key => $correct) {
        if (isset($answers[$key]) && $answers[$key] == $correct) {
            $score++;
        }
    }

    $percentage = ($score / count($correctAnswers)) * 100;

    $course = Dashboard::find($id);


    // Return JSON so JS can parse it
    return response()->json([
        'success' => true,
        'score' => round($percentage),
        'course_name' => $course->title,
        'price' => $course->price
    ]);
}

public function enrollAfterQuiz(Request $req , $id){

    $course = Dashboard::find($id);

    $validated = $req->validate([
        "studentName" => "required",
        "studentPhone" => "required|min:10|max:10",
        "studentEmail" => "required|email"
    ]);

    // dd($req->all());

        $data = [
            'course_name' => $course->title,
            'student_email' => $validated['studentEmail'],
            'course_price' => $course->price,
            'course_duration' => $course->duration,
            'student_name' => $validated['studentName'],
            'phone' => $validated['studentPhone'],
            'subject' => 'Enrollment Confirmation',
            'message' => 'You have successfully enrolled in the course. And Your Grade Is 67% ',
        ];

        $AdminData = [
            'course_name' => $course->title,
            'course_price' => $course->price,
            'course_duration' => $course->duration,
            'student_name' => $validated['studentName'],
            'student_email' => $validated['studentEmail'],
            'phone' => $validated['studentPhone'],
            'subject' => 'New Course Enrollment',
            'message' => 'A new student has enrolled in the course. with Grade 67%',
        ];
    // Send email To Student 
        Mail::to($validated['studentEmail'])->send(new SendToStudent($data));
        // Send email To Admin
        Mail::to('mdg85505@gmail.com')->send(new SendEnrollmentToAdmin($AdminData));

    // mark him as student in DB

}

}
