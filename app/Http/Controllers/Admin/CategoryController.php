<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
   public function loadCategories(){
      $categories = Category::all();
      return view('Admin.Category',compact("categories"));
   }

      public function addCategory(Request $req){

            $req->validate([
                  'name' => 'required|max:200',
                  'icon' => 'required'
            ]);

            Category::create([
                  'name' => $req->name,
                  'icon' => $req->icon,
            ]);

            return redirect()->back()->with('success', 'Category created successfully!');
      }

      public function DeleteCategory($id){
            $category = Category::find($id);
            if($category){
                  $category->delete();
                  return redirect()->back()->with('success', 'Category deleted successfully!');
            } else {
                  return redirect()->back()->with('Fail', 'Category not found!');
            }
      }


      public function editCategory($id){
            $category = Category::find($id);
            if($category){
                  return response()->json([
                        "success" => true ,
                        "category" => $category
                  ]) 
                  ;
            } else {
                 return response()->json([
                        "success" => false ,
                  ]) ;
            }
      }

      public function UpdateCategory(Request $req, $id){
            $req->validate([
                  'name' => 'required|max:200',
                  'icon' => 'required'
            ]);

            $category = Category::find($id);
            if($category){
                  $category->update([
                        'name' => $req->name,
                        'icon' => $req->icon,
                  ]);
                  return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
            } else {
                  return redirect()->back()->with('Fail', 'Category not found!');
            }
      }


}
