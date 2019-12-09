<?php

Route::get('/seller', [
    'as'=>'seller_path',
    'uses'=>'NavMenuController@seller'
]);

Route::get('/category', [
    'as'=>'category_path',
    'uses'=>'NavMenuController@category'
]);

Route::get('/command', [
    'as'=>'command_path',
    'uses'=>'NavMenuController@command'
]);

Route::resource('sellers', 'SellerController');
Route::resource('sellers.categories', 'CategoryController');
Route::resource('sellers.categories.sub-categories', 'subCategoriesController');
Route::resource('sellers.categories.sub-categories.products', 'productController');