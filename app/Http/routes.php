<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () { // '/' index
    return view('home');

   // return "hello world";
  //  return view('welcome');
});

Route::get('products', function () {    //localhost:8000/products
    return "je suis la liste des produits";
    //  return view('welcome');
});*/

use Illuminate\Http\Request;
Route::pattern('id','[1-9][0-9]*');
Route::pattern('slug','[a-z_-]*');

Route::pattern('id','[1-9][0-9]*'); //proteger la page product l'id

//Route::get('contact','FrontController@showContact');
//Route::post('storeContact','FrontController@storeContact');

//Route::get('/product/foo',function(){echo "hello foo";});

//Route::get('foo',function(){echo "hello foo";});

//Route::get('post/{id}', function($id){
//return"id:$id";  });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {

    Route::get('/',['as'=>'home','uses'=>'FrontController@index']);
    Route::get('prod/{id}/{slug?}','FrontController@showProduct');
    Route::get('cat/{id}/{slug?}','FrontController@showProductByCategory');
    Route::resource('cart','CartController');
    Route::get('contact','FrontController@showContact');
    Route::post('storeContact','FrontController@storeContact');
    Route::any('login','LoginController@login');
    Route::get('logout', 'LoginController@logout');



    Route::group(['middleware'=>['throttle:60,1']], function()
    {
        Route::any('login', 'LoginController@login');
    });

    Route::group([
        'middleware'=>['auth','admin']],function()
    {
        Route::resource('product', 'ProductController');
        Route::get('product/status/{id}','ProductController@changeStatus');
        Route::get('history','FrontController@showHistoryAdmin');
    });

    Route::group([
        'middleware'=>'auth'],function()
    {
        Route::get('command','FrontController@commandShow');
        Route::get('storeCommand','FrontController@storeCommand');
    });

});




