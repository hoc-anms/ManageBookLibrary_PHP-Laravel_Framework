<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //
    public function getAdd(){
        $cate=Categories::all();
        return view('admin.categories.add',['cate'=>$cate]);
    }
    public function getEdit(){

    }
    public function getList(){

        $cate=DB::table('categories as p')->leftJoin('categories as c','p.c_parent','=','c.c_id')->select(['p.c_id as id','p.c_name as category', 'c.c_name as parent', 'p.c_status as cstatus','p.created_at as date'])->get();

        return view('admin.categories.list',['cate'=>$cate]);

    }
}
