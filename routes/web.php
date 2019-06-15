<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------------Route for Font-end--------------*/
Route::get('/', function (){
    return view('front/index');
})->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'HomeController@shop');
Route::get('/shop','HomeController@shop')->name('shop');

//page
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('about', 'HomeController@about')->name('about');


/*--------------END Route for Font-end--------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*--------------Route for Back-end--------------*/
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
});
/*--------------End Route for Back-end--------------*/
