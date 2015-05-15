<?php

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

Route::pattern('id', '[0-9]+');

Route::get('/', 'HomeController@index');

/* Rotas para Categorias*/
Route::group(['prefix' => 'categories'], function(){

	Route::get('/', 			array('as' => 'category_index',	'uses' => 'CategoriesController@index'));
    Route::get('create',		array('as' => 'category_create', 'uses' => 'CategoriesController@create'));
    Route::get('delete/{id?}',	array('as' => 'category_delete', 'uses' => 'CategoriesController@delete'));

});

/* Rotas para Categorias*/
Route::group(['prefix' => 'products'], function(){

	Route::get('/', 			array('as' => 'products_index',	'uses' => 'ProductsController@index'));
    Route::get('create',		array('as' => 'products_create', 'uses' => 'ProductsController@create'));
    Route::get('delete/{id?}',	array('as' => 'products_delete', 'uses' => 'ProductsController@delete'));

});

Route::group(['prefix' => 'admin'], function(){

	Route::get('/', 		array('as' => 'admin_index',	'uses' => 'AdminController@index'));
    Route::get('category',	array('as' => 'admin_category', 'uses' => 'AdminCategoriesController@index'));
    Route::get('product', 	array('as' => 'admin_product', 	'uses' => 'AdminProductsController@index'));

});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
