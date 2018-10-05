<?php
use Illuminate\Support\Facades\DB;
use App\Categories;

Route::get('/', function () {
    return view('welcome');
});


Route::get('header',function (){
   return view('admin.layouts.header');
});

//Route to index dashboard
Route::get('index',function (){
    return view('admin.layouts.index');
});
//Route User
Route::get('admin/login','UserController@getLoginAdmin');
Route::post('admin/login','UserController@postLoginAdmin');

Route::get('admin/logout','UserController@getLogoutAdmin');

Route::get('admin/register','UserController@getRegisterAdmin');
Route::post('admin/register','UserController@postRegisterAdmin');

//Route manage book
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function (){

//Route to index dashboard
    Route::get('index',function (){
        return view('admin.layouts.index');
    });

    Route::group(['prefix' => 'categories'], function () {
//       admin/categories/add..
        Route::POST('addCategories','CategoriesController@addCategories');
        Route::POST('editCategories','CategoriesController@editCategories');
        Route::POST('deleteCategories','CategoriesController@deleteCategories');
        Route::get('list', 'CategoriesController@getList');
    });
    Route::group(['prefix' => 'author'], function () {
//       admin/author/add..
        Route::POST('addAuthor','AuthorController@addAuthor');
        Route::POST('editAuthor','AuthorController@editAuthor');
        Route::POST('deleteAuthor','AuthorController@deleteAuthor');
        Route::get('list', 'AuthorController@getList');
    });
    Route::group(['prefix' => 'book'], function () {
//       admin/book/add..

        Route::POST('addBook','BookController@addBook');
        Route::POST('editBook','BookController@editBook');
        Route::POST('deleteBook','BookController@deleteBook');
        Route::get('list', 'BookController@getList');
    });
});


