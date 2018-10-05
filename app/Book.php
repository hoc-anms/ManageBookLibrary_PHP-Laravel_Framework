<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table="book";
    protected $primaryKey="b_id";

    public function categories(){
        return $this->belongsTo('App\Categories','b_cid','c_id');
    }
    public function author(){
        return $this->belongsTo('App\Author','b_aid','id');
    }
}
