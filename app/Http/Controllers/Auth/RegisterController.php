<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;


class RegisterController extends Controller
{
    public function LoadRegister()
    {
        return view('Auth.Register');
    }

     public function registerPost(Request $req){

        $req->validate([
            "name" => "required|max:30|min:2" ,
            "FamillyName" => "required|min:3|max:30",
            "email" => "email|unique:users,email",
            "password" => "required|min:3|max:30|confirmed",
            "gender" => "required|in:male,female"

        ]);

     
        try{

            $result = User::create([
                "name" => $req->name . " " . $req->FamillyName,
                "email" => $req->email ,
                "password" => Hash::make($req->password),
                "gender" => $req->gender ,
            ]);
            
            if($result){
                return redirect()->route('login.load')->with('register_success','Registration successfully you can Loginto you account');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('db_error','somthing went wrong pleas try again') ;
        }

        // return view('Auth.Register') ;
    }
}


