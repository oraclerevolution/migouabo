<?php

Route::resource('sellers', 'SellerController');
Route::resource('sellers.categories', 'CategoryController');
Route::resource('sellers.categories.sub-categories', 'subCategoriesController');
Route::resource('sellers.categories.sub-categories.products', 'productController');