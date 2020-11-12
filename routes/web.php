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

// LP
Route::get('/', function () {
    return view('welcome');
});

// メール関連
Route::post('/email', 'ChangeEmailController@sendChangeEmailLink');
Route::get('/mail', 'MailSendController@send');

// ユーザーページ
Auth::routes();
Route::get('/users/favorite', 'UserController@favorite')->name('users.favorite');
Route::resource('/users', 'UserController',['except' => ['destroy']])->middleware('auth');

// 検索機能
Route::GET('/prosucts/search', 'ProductController@search')->name('products.search');


// 掲示板ページ
Route::resource('/posts', 'PostsController',['except' => ['edit','update']])->middleware('auth');
Route::resource('/postComments', 'PostCommentController', ['only' => ['create', 'store', 'destroy']])->middleware('auth');


// 商品ページ関連
Route::post('/products/{product}', 'ProductController@sold')->name('products.sold');
Route::resource('/products', 'ProductController'); 
Route::Get('productComments', 'ProductCommentController@index',)->name('productComments.index')->middleware('auth');
Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'products/{id}'],function(){
        Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
        Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
    });
});


// 取引ページ関連
Route::resource('/products/{product}/productComments', 'ProductCommentController', ['only' => ['create','store']])->middleware('auth');
Route::resource('/products/{product}/buyers', 'BuyerController', ['only' => ['store','show','destroy']])->middleware('auth');


// お問い合わせページ関連
Route::post('/contacts/send', 'ContactController@send')->name('contacts.sned');
Route::resource('/contacts', 'ContactController',['only' => ['index', 'store']]);




