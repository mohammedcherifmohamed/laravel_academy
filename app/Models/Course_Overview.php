<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course_Overview extends Model
{
    protected $fillable = [
        "duration",
        "old_price",
        "requirements",
        "will_learn",
        "level",
        "course_id"
    ];
    protected $table = "course_overview";

    public function course()
{
    return $this->belongsTo(Dashboard::class, 'course_id', 'id');
}

}
