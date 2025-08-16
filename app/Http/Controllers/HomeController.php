<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard as Course;
use App\Models\Category;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function loadHome()
    {
        // Logic to load the home page
        // load courses 
       $courses = Course::with(['category', 'instructor'])->take(6)->get();
        $categories = Category::all();

        return view('home',compact('courses',"categories"));
    }
}
