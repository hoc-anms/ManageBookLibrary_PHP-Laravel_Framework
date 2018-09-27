<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table="categories";
    protected $fillable=['c_name','c_parent'];
    protected $primaryKey='c_id';
    public function bookCat(){
        return $this->hasMany('App\Book','b_cid','c_id');
    }
}
