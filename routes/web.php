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



Route::get('/vendeuses', [
    'as'=> 'seller_path',
    'uses'=>'SellerController@display'
]);

Route::get('/add-vendeuse', [
    'as'=> 'add-vendeuse_path',
    'uses'=>'SellerController@create'
]);

Route::post('/add-vendeuse', [
    'as'=>'create-vendeuse_path',
    'uses'=>'SellerController@store'
]);
Route::get('/categories', [
    'as'=>'categorie_path',
    'uses'=>'CategoriesController@display'
]);

Route::get('/add-categorie', [
    'as'=>'add-categorie_path',
    'uses'=>'CategoriesController@create'
]);

Route::post('/add-categorie', [
    'as'=>'create-categorie_path',
    'uses'=>'CategorieController@store'
]);

Route::get('/pending-commandes', function(){
    return view('pages.commands.pending-commandes');
});