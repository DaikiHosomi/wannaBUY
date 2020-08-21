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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/email', 'ChangeEmailController@sendChangeEmailLink');




Auth::routes();

// Route::get('/', 'PostsController@index')->name('posts.index');
// Route::get('/', 'ProductController@index')->name('products.index');

Route::GET('/prosucts/search', 'ProductController@search')->name('products.search');

// Route::resource('/posts', 'PostsController', ['except' => ['index']]);
Route::get('/mail', 'MailSendController@send');
Route::get('/users/favorite', 'UserController@favorite')->name('users.favorite');


Route::resource('/posts', 'PostsController')->middleware('auth');
Route::resource('/users', 'UserController')->middleware('auth');
Route::resource('/postComments', 'PostCommentController')->middleware('auth');

Route::post('/products/{product}', 'ProductController@sold')->name('products.sold');
Route::resource('/products', 'ProductController'); 
Route::resource('/products/{product}/buyers', 'BuyerController')->middleware('auth');
Route::Get('productComments', 'ProductCommentController@index')->name('productComments.index')->middleware('auth');
Route::resource('/products/{product}/productComments', 'ProductCommentController', ['except' => ['index']])->middleware('auth');
Route::resource('/users', 'UserController');
Route::post('/contacts/send', 'ContactController@send')->name('contacts.sned');
Route::resource('/contacts', 'ContactController',['except' => ['create', 'show', 'update', 'destroy', 'edit']]);

Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'products/{id}'],function(){
        Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
        Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
    });
});



