<?php

use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', [
    'as' => 'index',
    'uses' => 'BlogController@showIndex'
]);

Route::get('/category', [
    'as' => 'categories',
    'uses' => 'BlogController@showCategories'
]);

Route::get('/category/{id}', [
    'as' => 'category',
    'uses' => 'BlogController@showCategory'
]);

Route::get('/author', [
    'as' => 'authors',
    'uses' => 'BlogController@showAuthors'
]);

Route::get('/author/{id}', [
    'as' => 'author',
    'uses' => 'BlogController@showAuthor'
]);

// Must be the last route
Route::get('/{slug}', [
    'as' => 'post',
    'uses' => 'BlogController@showPost'
]);
