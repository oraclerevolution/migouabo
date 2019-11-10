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

Route::get('/vendeuses', function(){
    return view('vendeuses');
});

Route::get('/categories', function(){
    return view('categories');
});

Route::get('/add-categorie', function(){
    return view('add-categorie');
});

Route::get('/add-vendeuse', function(){
    return view('add-vendeuse');
});

Route::get('/pending-commandes', function(){
    return view('pending-commandes');
});