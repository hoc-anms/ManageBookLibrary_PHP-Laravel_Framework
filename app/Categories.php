<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table="categories";

    public function bookCat(){
        return $this->hasMany('App\Book','b_cid','c_id');
    }
}
