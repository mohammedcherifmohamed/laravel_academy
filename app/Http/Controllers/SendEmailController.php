<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class SendEmailController extends Controller
{
    public function sendVerificationEmail(){
        $name = "Mohamed Gamal";
        Mail::to("mdg85505@gmail.com")->send(new SendEmail($name));
    }
}
