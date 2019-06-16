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


/*--------------Route for Cart--------------*/
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/addItem/{id}', 'CartController@addItem')->name('cart.add');
Route::get('/cart/destroy/{id}', 'CartController@destroy')->name('cart.destroy');
Route::put('/cart/update/{id}', 'CartController@update')->name('cart.update');

/*--------------END Route for Cart--------------*/

/*--------------END Route for Font-end--------------*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/product_details/{id}', 'HomeController@product_details')->name('product_details');
//logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*--------------Route for Back-end--------------*/
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/', function () {
        return view('admin/index');
    })->name('admin.index');

    Route::resource('product','ProductsController');

});
/*--------------End Route for Back-end--------------*/
