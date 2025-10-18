<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendToStudent;
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

        // Send emails
        Mail::to($validated['studentEmail'])->send(new SendToStudent($data));
        Mail::to('mafsamarari@gmail.com')->send(new SendToStudent($data));

        return redirect()->back()->with('success', 'Enrollment successful. Emails sent!');

    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    }
}

}
