<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table="author";
    public function bookAuth(){
        return $this->hasMany('App\Book','b_aid','id');
    }
}
