<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dashboard as Course;
use App\Models\Instructor;
use App\Models\Category;

class DashboardController extends Controller
{
   public function loadDashboard(){
      // fetch instructors and categories
      $instructors = instructor::all();
      $categories = Category::all();
      // join category and instructors tables
      $courses = Course::with(['category', 'instructor'])->get();
      // $courses = Course::all();

         return view('Admin.dashboard',compact('instructors','categories',"courses"));
   }

   public function addCourse(Request $req){
      $req->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'category' => 'required|exists:category,id',
            'instructor' => 'required|exists:instructor,id',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048'
      ]);

      // Handle file upload
      if($req->hasFile('image')){
            $imagePath = $req->file('image')->store('courses', 'public');
      } else {
            $imagePath = null; // or set a default image path
      }

     $res =  Course::create([
            'title' => $req->title,
            'description' => $req->description,
            'category_id' => $req->category,
            'instructor_id' => $req->instructor,
            'price' => $req->price,
            'image_path' => $imagePath 
      ]);


      if($res){
            return redirect()->back()->with('success', 'Course added successfully!');
      } else {
            return redirect()->back()->with('Fail', 'Failed to add course!');
      }


   }

   public function deleteCourse($id){
      $course = Course::find($id);
      if($course){
            $course->delete();
            return redirect()->back()->with('success', 'Course deleted successfully!');
      } else {
            return redirect()->back()->with('Fail', 'Course not found!');
      }
   }

   public function editCourse($id){
      $course = Course::with(['category','instructor'])->find($id);
      if($course){
            $instructors = Instructor::all();
            $categories = Category::all();
            return response()->json([
                  "success" => true ,
                  "course"=> $course,
                  "instructors" => $instructors,
                  "categories" => $categories
            ]);
      } else {
            return response()->json([
                  "success" => false ,
            ]);
      }
   }


   public function updateCourse(Request $req , $id){

      $req->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'category' => 'required|exists:category,id',
            'instructor' => 'required|exists:instructor,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
      ]);

      $course = Course::find($id);
      if(!$course){
            return redirect()->back()->with('Fail', 'Course not found!');
      }

      if($req->hasFile('image')){
            $imagePath = $req->file('image')->store('courses', 'public');
      } else {
            $imagePath = $course->image_path; 
      }

      $course->update([
            'title' => $req->title,
            'description' => $req->description,
            'category_id' => $req->category,
            'instructor_id' => $req->instructor,
            'price' => $req->price,
            'image_path' => $imagePath ?? $course->image_path
      ]);

      return redirect()->back()->with('success', 'Course updated successfully!');


   }

      public function viewCourse($id){
            $course = Course::with(['category', 'instructor'])->find($id);

            
            return view('Course-detail',compact('course'));

            

      }



}
