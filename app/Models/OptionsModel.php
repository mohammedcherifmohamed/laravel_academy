<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Questions;

class OptionsModel extends Model
{
    protected $table = 'options';
    
    protected $fillable = [
        'question_id',
        'content',
        'is_correct',
    ];

     public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }
}
