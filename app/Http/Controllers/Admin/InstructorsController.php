<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\instructor;

class InstructorsController extends Controller
{
    public function loadInstructors(){
       $instructors = instructor::all();
         return view('Admin.Instructor',compact('instructors'));
   }

   public function AddInstructor(Request $req){

      $req->validate([
        "name" => "required|max:200|min:3",
        "email" => "required|email|unique:instructor,email",
        "gender" => "required",
        "password" => "required|min:3",
         "specialization" => "required|max:100|min:3",
      ]);

      $res = instructor::create([
         "full_name" => $req->name ,
         "email" => $req->email,
         "gender" => $req->gender,
         "password" => bcrypt($req->password),
         "specialization" => $req->specialization,

      ]);

      if($res){
         return redirect()->back()->with("success","Instructor Added Successfully");
      }else{
         return redirect()->back()->with("Fail","Somthing Went Wrong");

      }

   }

   public function deleteInstructor($id){

      $instructor = instructor::find($id);
      if($instructor){
         $instructor->delete();
         return redirect()->back()->with('success'," Instructor delete successfully");
      }else{
         return redirect()->back()->with('Fail',"Could'nt delete Instructor");
      }


   }

   public function editInstructor(Request $req , $id){
      
      $instructor = instructor::findOrFail($id);

     

      if($instructor){
        return response()->json([
         "success" => true ,
         "instructor" => $instructor
        ]);
      }else{
         return response()->json([
            "success" => false ,
            "message" => "Instructor not found"
         ]);
      }


   }

   public function updateInstructor(Request $req , $id){

      $instructor = instructor::findOrFail($id);
       $req->validate([
        "name" => "required|max:200|min:3",
        "email" => "required|email|unique:instructor,email,{$id}",
        "gender" => "required",
         "specialization" => "required|max:100|min:3",
      ]);
      $res = $instructor->update([
         "full_name" => $req->name ,
         "email" => $req->email,
         "gender" => $req->gender,
         "specialization" => $req->specialization,
      ]);

      if($res){
         return redirect()->back()->with("success","Instructor Updated Successfully");
      }else{
         return redirect()->back()->with("Fail","Somthing Went Wrong"); 
      }

   }

}
