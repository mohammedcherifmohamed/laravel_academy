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


         return view('Admin.dashboard',compact('instructors','categories'));
   }

   public function addCourse(Request $req){
      $req->validate([
            'title' => 'required|max:255',
            'description' => 'required',
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
}
