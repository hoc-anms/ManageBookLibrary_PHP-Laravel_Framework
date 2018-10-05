<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    protected $table="author";
    protected $fillable=[
        'a_name',
    ];
    protected $primaryKey='a_id';
    public function bookAuth(){
        return $this->hasMany('App\Book','b_aid','id');
    }
}
