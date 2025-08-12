<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable =[
        "full_name",
        "email",
        "gender",
        "pasword",
        "specialization",
    ];

    protected $table ="instructor" ;
    

}
