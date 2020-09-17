<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'AuthController@login');

Route::post('/reg', 'AuthController@store');

Route::get('categories/{category_id?}', 'CategoryController@index');
Route::get('/{category}/articles', 'ArticlesController@index');
Route::get('articles/{article}', 'ArticlesController@show');
//Route::resource('{article}/comment', 'ArticleCommentController', ['middleware' => ['store' => 'auth:api']])->shallow();
Route::resource('articles.articlecomment', 'ArticleCommentController')->shallow();
Route::get("/adv/{pos}", 'AdvertisementController@show');
Route::get('goods/{type}', 'GoodsController@index')->where('type', '[A-Za-z]+');
Route::get('/goods/{goods}', 'GoodsController@show');
Route::get('/toparticles', 'ColumnTopArticleController@index');
Route::get('/top/{category}/{type}', 'TopArticleController@index'); //
Route::get('/goods/{goods}/comments', 'GoodsCommentController@index');
Route::get('/author', "AuthorController@index");
Route::get('author/{author}/articles', 'AuthorArticlesController@index');
Route::get('/addviews/{article}', 'ArticleViewedController');
Route::get('/popular/{category?}', 'ArticleRankController@index');
Route::get('/topauthors', 'TopAuthorController');
Route::get('/search', 'ArticleSearchController');
Route::get('/bottomnav', 'BottomNavController@index');
Route::get('/bottomnav/{us}', 'BottomNavController@show');
Route::middleware('auth:api')->group(function(){
    Route::post('{type}/like/{id}', 'LikeController@store');
    Route::post('{type}/collect/{id}', 'CollectionController@store');
    Route::post("/enroll", "ConferenceEnrollController@store");
    Route::delete('/enroll/{enroll}', "ConferenceEnrollController@destroy");
    Route::delete("/cart", "CartController@destroy");
    Route::resource('/cart', 'CartController')->except('destroy');
    Route::resource('/address', 'AddressController');
    Route::post('/order', "OrderController@store");
    Route::get('/order/{type?}', 'OrderController@index')->where('type', '[A-Za-z]+');
    Route::put('/order/{order}', 'OrderController@update');
    Route::get('/order/{order}', 'OrderController@show');
    Route::post('/upload', 'UploadController');
    Route::resource('goods.comments', 'GoodsCommentController');
    Route::get('/user', 'UserController@show');
});
