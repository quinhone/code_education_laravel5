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

Route::group(['prefix' => 'admin'], function(){

	Route::get('/', 		array('as' => 'admin_index',	'uses' => 'AdminController@index'));

    /* Rotas para Categorias*/
    Route::group(['prefix' => 'categories'], function(){

        Route::get('/',             array('as' => 'category_index', 'uses' => 'CategoriesController@index'));
        Route::get('create',        array('as' => 'category_create', 'uses' => 'CategoriesController@create'));
        Route::post('add',          array('as' => 'category_add', 'uses' => 'CategoriesController@store'));
        Route::get('destroy/{id?}', array('as' => 'category_delete', 'uses' => 'CategoriesController@destroy'));
        Route::get('edit/{id?}',    array('as' => 'category_edit', 'uses' => 'CategoriesController@edit'));
        Route::put('update/{id?}',  array('as' => 'category_update', 'uses' => 'CategoriesController@update'));

    });

    /* Rotas para Produtos*/
    Route::group(['prefix' => 'products'], function(){

        Route::get('/',             array('as' => 'products_index', 'uses' => 'ProductsController@index'));
        Route::get('create',        array('as' => 'products_create', 'uses' => 'ProductsController@create'));
        Route::post('add',          array('as' => 'products_add', 'uses' => 'ProductsController@store'));
        Route::get('destroy/{id?}', array('as' => 'products_delete', 'uses' => 'ProductsController@destroy'));
        Route::get('edit/{id?}',    array('as' => 'products_edit', 'uses' => 'ProductsController@edit'));
        Route::put('update/{id?}',  array('as' => 'products_update', 'uses' => 'ProductsController@update'));

    });


});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
