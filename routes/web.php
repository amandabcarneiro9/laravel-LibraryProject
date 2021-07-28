<?php

use App\Http\Controllers\APIBookController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/eshop', 'EshopController@index');
Route::get('/eshop/{id}', 'EshopController@show')
    ->where(['id' => '\d+']);

Route::get('eshop/categories/{category_id}', 'EshopController@category')
    ->where(['category_id' => '\d+']);

Route::get('eshop/subcategories/{subcategory_id}', 'EshopController@subcategory')
    ->where(['subcategory_id' => '\d+']);

Route::get('/bookshops', 'BookshopController@index');
Route::get('/bookshop/create', 'BookshopController@create');
Route::post('/bookshop/save', 'BookshopController@save');
Route::get('/bookshops/{id}', 'BookshopController@show');

Route::get('/authors', 'AuthorController@index');
Route::get('/authors/create', 'AuthorController@create');
Route::post('/authors', 'AuthorController@store');
Route::get('/authors/{id}/edit', 'AuthorController@edit');
Route::put('/authors/{id}', 'AuthorController@update');

Route::resource('/books', 'BookController');
Route::post('/books/{book_id}/reviews', 'BookController@createReview')->middleware('auth')->name('create-review');
Route::delete('/books/reviews/{review_id}', 'BookController@destroyReview')->middleware('can:admin')->name('destroy-review');


Route::get('/publishers', 'PublisherController@index');
Route::get('/publishers/{publisher_id}', 'PublisherController@show');

Route::get('/reservations', 'ReservationController@index');
Route::get('/reservations/create', 'ReservationController@create');
Route::post('/reservations/store', 'ReservationController@store');


Route::get('/home')->middleware('auth')->name('home');

Route::post('/orders/create', 'OrderController@create')->middleware('auth')->name('create-order');

Route::get('/orders', 'OrderController@index')->name('order-list');

Route::view('/book/{book_id}/{path?}', 'book/detail')->where(['book_id' => '^\d+$', 'path' => '.*']);


Route::view('/sign-in', 'auth.react-auth');
Route::view('/sign-up', 'auth.react-auth');
