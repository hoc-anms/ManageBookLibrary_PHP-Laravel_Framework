<?php
use Illuminate\Support\Facades\DB;
use App\Categories;

Route::get('/', function () {
    return view('welcome');
});


Route::get('thu',function (){

    $categories=Categories::where('c_id',1)->first();
    foreach ($categories->book as $book){
        echo $book->b_name;
        echo '<br>';
    }
});

Route::get('header',function (){
   return view('admin.layouts.header');
});


Route::get('index',function (){
    return view('admin.layouts.index');
});

Route::get('login',function (){
    return view ('admin.login');
});

//Route::group(['middleware'=>['web']],function (){
//    Route::resource('index','CategoriesController');
//    Route::POST('addPost','CategoriesController@addPost');
//});






Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix' => 'categories'], function () {
//       admin/categories/add..


        Route::get('edit', 'CategoriesController@getEdit');

        Route::get('list', 'CategoriesController@getList');
    });
    Route::group(['prefix' => 'author'], function () {
//       admin/author/add..

        Route::get('list', 'AuthorController@getList');
    });
    Route::group(['prefix' => 'book'], function () {
//       admin/book/add..

        Route::get('edit', 'BookController@getEdit');

        Route::get('list', 'BookController@getList');
    });
});


