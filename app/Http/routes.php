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

//Route::pattern('id', '[0-9]+');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function(){

	Route::get('/', 		array('as' => 'admin_index',	'uses' => 'AdminController@index'));

    /* Rotas para Categorias*/
    Route::group(['prefix' => 'categories'], function(){

        Route::get('/',             array('as' => 'category_index', 'uses' => 'AdminCategoriesController@index'));
        Route::get('create',        array('as' => 'category_create', 'uses' => 'AdminCategoriesController@create'));
        Route::post('add',          array('as' => 'category_add', 'uses' => 'AdminCategoriesController@store'));
        Route::get('destroy/{id?}', array('as' => 'category_delete', 'uses' => 'AdminCategoriesController@destroy'));
        Route::get('edit/{id?}',    array('as' => 'category_edit', 'uses' => 'AdminCategoriesController@edit'));
        Route::put('update/{id?}',  array('as' => 'category_update', 'uses' => 'AdminCategoriesController@update'));

    });

    /* Rotas para Produtos*/
    Route::group(['prefix' => 'products'], function(){

        Route::get('/',             array('as' => 'products_index', 'uses' => 'AdminProductsController@index'));
        Route::get('create',        array('as' => 'products_create', 'uses' => 'AdminProductsController@create'));
        Route::post('add',          array('as' => 'products_add', 'uses' => 'AdminProductsController@store'));
        Route::get('destroy/{id?}', array('as' => 'products_delete', 'uses' => 'AdminProductsController@destroy'));
        Route::get('edit/{id?}',    array('as' => 'products_edit', 'uses' => 'AdminProductsController@edit'));
        Route::put('update/{id?}',  array('as' => 'products_update', 'uses' => 'AdminProductsController@update'));

        Route::group(['prefix' => 'images'], function(){
            Route::get('{id?}',    array('as' => 'products_images', 'uses' => 'AdminProductsController@images'));
            Route::get('{id?}/create',    array('as' => 'products_images_create', 'uses' => 'AdminProductsController@createImage'));
            Route::post('{id?}/store',    array('as' => 'products_images_store', 'uses' => 'AdminProductsController@storeImage'));
            Route::get('{id?}/destroy',    array('as' => 'products_images_destroy', 'uses' => 'AdminProductsController@destroyImage'));
        });

    });


});

Route::get('/', 'StoreController@index');
Route::get('category/{id?}', 'ProductsController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
