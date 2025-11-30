<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dashboard;;
use App\Models\Quizes;

class Course_Overview extends Model
{
    protected $fillable = [
        "duration",
        "old_price",
        "requirements",
        "will_learn",
        "level",
        "course_id",
        "quize_id"
    ];
    protected $table = "course_overview";

    public function course()
{
    return $this->belongsTo(Dashboard::class, 'course_id', 'id');
}

public function quize(){
    return $this->belongsTo(Quizes::class, 'quize_id', 'id');
}

}
