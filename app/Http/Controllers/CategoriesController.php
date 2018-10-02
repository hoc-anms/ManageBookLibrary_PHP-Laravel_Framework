<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
class CategoriesController extends Controller
{
    //
    public function addCategories(Request $request){
        $categories=new Categories();
        $categories->c_name=$request->category;
        $categories->c_parent=$request->id;
        $categories->save();
        return response()->json($categories);

    }

    public function editCategories(Request $request){

        $categories= Categories::find($request->id);
        $categories->c_name=$request->category;
        $categories->c_parent=$request->c_id;
        $categories->save();
        return response()->json($categories);

    }
    public function deleteCategories(Request $request){
        $categories=Categories::find($request->id)->delete();
        return response()->json();
    }
    public function getList(){
        $categories=Categories::all();
        $cate=DB::table('categories as p')->leftJoin('categories as c','p.c_parent','=','c.c_id')->select(['p.c_id as id' ,'p.c_name as category', 'c.c_name as parent', 'p.c_status as status','p.created_at as date'])->get();

        return view('admin.categories.list',['cate'=>$cate],['categories'=>$categories]);
    }

}
