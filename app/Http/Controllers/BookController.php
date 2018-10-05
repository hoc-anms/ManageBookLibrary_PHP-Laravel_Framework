<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categories;
use App\Author;
use App\Book;
class BookController extends Controller
{
    //

    public function addBook(Request $request){
        $book=new Book();
        $book->b_name=$request->b_name;
        $book->b_cid=$request->c_id;
        $book->b_aid=$request->a_id;
        $book->save();
        //$resultBook=DB::select('SELECT b.b_id,b.b_cid,b.b_aid,b.b_name,c.c_name,a.a_name,b.created_at,b.b_status FROM book b,author a,categories c WHERE b.b_aid = a.a_id AND b.b_cid = c.c_id');
        return response()->json($book);
    }
    public function editBook(Request $request){
        $book=Book::find($request->b_id);
        $book->b_name=$request->b_name;
        $book->b_cid=$request->c_id;
        $book->b_aid=$request->a_id;
        $book->save();
        //$resultBook=DB::select('SELECT b.b_id,b.b_cid,b.b_aid,b.b_name,c.c_name,a.a_name,b.created_at,b.b_status FROM book b,author a,categories c WHERE b.b_aid = a.a_id AND b.b_cid = c.c_id');
        return response()->json($book);
    }
    public function deleteBook(Request $request){
        $book=Book::find($request->b_id)->delete();
        return response()->json();

    }

    public function getList(){
        $cate=Categories::all();
        $author=Author::all();
        $book=DB::select('SELECT b.b_id,b.b_cid,b.b_aid,b.b_name,c.c_name,a.a_name,b.created_at,b.b_status FROM book b,author a,categories c WHERE b.b_aid = a.a_id AND b.b_cid = c.c_id');
        return view('admin.book.list',compact('book','author','cate'));
    }
}
