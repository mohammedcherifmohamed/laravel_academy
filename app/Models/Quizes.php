<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizes extends Model
{
    protected $table = 'quizes';

    protected $fillable = [
        'quize_type',
        'quize_level',
    ];

    public function questions(){
        return $this->hasMany(Questions::class,"quize_id");
    }
}
