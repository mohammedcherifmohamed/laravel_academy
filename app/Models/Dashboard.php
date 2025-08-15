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
        return $this->belongsTo(Category::class);
    }
    public function instructor(){
        return $this->belongsTo(instructor::class);
    }
    public function overview()
    {
        return $this->hasOne(Course_Overview::class, 'course_id', 'id');
    }
}

