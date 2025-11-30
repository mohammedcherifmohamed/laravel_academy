<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OptionsModel;

class Questions extends Model
{
    protected $table = "questions";

        public function quize()
    {
        return $this->belongsTo(Quizes::class,"quize_id");
    }

    public function options(){
        return $this->hasMany(OptionsModel::class,"question_id");
    }
}
