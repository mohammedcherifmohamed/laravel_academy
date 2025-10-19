<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
       public function loadStudents(){
         return view('Admin.Students');
   }

   public function addStudent($data){
       // Validate and add the student to the database  
       // check if student exists 
       $existingStudent = Student::where('email', $data["student_email"])->first();
         if ($existingStudent) {
              // Student already exists, no need to add again
              return;
         }
      Student::create([
          "name" => $data["student_name"],
          "email" => $data["student_email"],
          "phone_number" => $data["phone"]
      ]);
   }
}
