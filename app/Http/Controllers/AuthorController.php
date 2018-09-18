<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    //
    public function getAdd(){

    }
    public function getEdit(){

    }
    public function getList(){
        $author=Author::all();
        return view('admin.author.list',['author'=>$author]);
    }
}
