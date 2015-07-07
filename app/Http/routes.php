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
//Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => [ 'auth', 'authAdmin'], 'where' => ['id' => '[0-9]+']], function() {

    //
    Route::get('/', array('as' => 'admin_index', 'uses' => 'AdminController@index'));
    Route::get('/orders', array('as' => 'admin_orders', 'uses' => 'AdminAccountController@orders'));
    Route::get('/orders/atualizaStatus/{status}/{id}', array('as' => 'admin_orders_upd', 'uses' => 'AdminAccountController@atualizaStatus'));

    /* Rotas para Categorias */
    Route::group(['prefix' => 'categories'], function() {

        Route::get('/', array('as' => 'category_index', 'uses' => 'AdminCategoriesController@index'));
        Route::get('create', array('as' => 'category_create', 'uses' => 'AdminCategoriesController@create'));
        Route::post('add', array('as' => 'category_add', 'uses' => 'AdminCategoriesController@store'));
        Route::get('destroy/{id?}', array('as' => 'category_delete', 'uses' => 'AdminCategoriesController@destroy'));
        Route::get('edit/{id?}', array('as' => 'category_edit', 'uses' => 'AdminCategoriesController@edit'));
        Route::put('update/{id?}', array('as' => 'category_update', 'uses' => 'AdminCategoriesController@update'));
    });

    /* Rotas para Produtos */
    Route::group(['prefix' => 'products'], function() {

        Route::get('/', array('as' => 'products_index', 'uses' => 'AdminProductsController@index'));
        Route::get('create', array('as' => 'products_create', 'uses' => 'AdminProductsController@create'));
        Route::post('add', array('as' => 'products_add', 'uses' => 'AdminProductsController@store'));
        Route::get('destroy/{id?}', array('as' => 'products_delete', 'uses' => 'AdminProductsController@destroy'));
        Route::get('edit/{id?}', array('as' => 'products_edit', 'uses' => 'AdminProductsController@edit'));
        Route::put('update/{id?}', array('as' => 'products_update', 'uses' => 'AdminProductsController@update'));

        Route::group(['prefix' => 'images'], function() {
            Route::get('{id?}', array('as' => 'products_images', 'uses' => 'AdminProductsController@images'));
            Route::get('{id?}/create', array('as' => 'products_images_create', 'uses' => 'AdminProductsController@createImage'));
            Route::post('{id?}/store', array('as' => 'products_images_store', 'uses' => 'AdminProductsController@storeImage'));
            Route::get('{id?}/destroy', array('as' => 'products_images_destroy', 'uses' => 'AdminProductsController@destroyImage'));
        });
    });
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('checkout/transaction', ['as' => 'checkout.transaction', 'uses' => 'CheckoutController@transaction']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});


Route::get('/', 'StoreController@index');
Route::get('/home', 'StoreController@index');
Route::get('category/{id}', array('as' => 'store.category', 'uses' => 'StoreController@category'));
Route::get('product/{id}', array('as' => 'store.product', 'uses' => 'StoreController@product'));
Route::get('tag/{tag}', array('as' => 'products_tag', 'uses' => 'StoreController@productsByTag'));

Route::get('cart', array('as' => 'cart', 'uses' => 'CartController@index'));
Route::get('cart/getCesta', array('as' => 'cart_getcesta', 'uses' => 'CartController@getCesta'));
Route::get('cart/updCesta/{id}/{qtd}', array('as' => 'cart_updcesta', 'uses' => 'CartController@updCesta'));
Route::get('cart/getValorTotal', array('as' => 'cart_gettotal', 'uses' => 'CartController@getValorTotal'));

Route::get('cart/add/{id}', array('as' => 'cart_add', 'uses' => 'CartController@add'));
Route::delete('cart/destroy/{id}', array('as' => 'cart_destroy', 'uses' => 'CartController@destroy'));


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);