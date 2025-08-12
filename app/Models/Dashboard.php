<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = "course";
    protected $fillable = [
        "title",
        "description",
        "image_path",
        "price",
        "category_id",
        "instructor_id"
    ];

    public function category(){
        return $this->belongsto(Category::class);
    }
    public function instructor(){
        return $this->belongsto(instructor::class);
    }

}
