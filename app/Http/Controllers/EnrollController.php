<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendToStudent;
use App\Mail\SendEnrollmentToAdmin;
use App\Models\Dashboard;
use Illuminate\Validation\ValidationException;

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

        return redirect()->back()->with('success', 'Enrollment successful. Emails sent!');

    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}

}
