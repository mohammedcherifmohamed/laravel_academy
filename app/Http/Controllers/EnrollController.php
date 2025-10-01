<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollController extends Controller
{
    public function enrollCourse($id){
        return "enroll ". $id;
    }
}
