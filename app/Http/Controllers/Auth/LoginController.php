<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
      public function LoadLogin(){
        return view('Auth.login') ;
    }

    public function CheckLogin(Request $req){

        $user = User::where('email',$req->email)->first();
        $credentials = $req->only('email','password');
        $remember = $req->filled('remember') ;
        if(Auth::attempt($credentials,$remember)){
            return redirect()->route('home.load') ;     
        }else{
            
            return redirect()->back()->with('error_login','Email or User Name') ;
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.load');
    }
}
