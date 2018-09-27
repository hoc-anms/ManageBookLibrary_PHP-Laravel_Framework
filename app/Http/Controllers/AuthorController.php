<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class AuthorController extends Controller
{

    public function getList(){
        $author=Author::all();
        return view('admin.author.list',['author'=>$author]);
    }

    public function addAuthor(Request $request){
        $author= new Author();
        $author->a_name=$request->a_name;
        $author->save();
        return response()->json($author);
    }

    public function editAuthor(Request $request){

        $author = Author::find($request->a_id);
        $author->a_name = $request->a_name;
        $author->save();
        return response()->json($author);
    }
    public function deleteAuthor(Request $request){
        $author=Author::find($request->a_id)->delete();
        return response()->json();
    }


}
