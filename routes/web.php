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


Route::get('/categories', function(){
    return view('pages.categories.categories');
});

Route::get('/add-categorie', function(){
    return view('pages.categories.add-categorie');
});

Route::get('/add-vendeuse', function(){
    return view('pages.sellers.add-vendeuse');
});

Route::get('/pending-commandes', function(){
    return view('pages.commands.pending-commandes');
});