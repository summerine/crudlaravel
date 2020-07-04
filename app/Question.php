<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function answer(){
        return $this->belongsTo('App\Answer');
    }
}
