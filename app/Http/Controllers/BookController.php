<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Author;
class BookController extends Controller
{
    //

    public function getEdit(){

    }
    public function getList(){
        $cate=Categories::all();
        $author=Author::all();
        $book=DB::select('SELECT b.b_id,b.b_name,c.c_name,a.a_name,b.created_at,b.b_status FROM book b,author a,categories c WHERE b.b_aid = a.a_id AND b.b_cid = c.c_id');
        return view('admin.book.list',compact('book','author','cate'));
    }
}
