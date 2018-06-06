<?php
Route::group(['middleware' => 'locale'], function()
{
    Route::get('/', 'Admin\DashboardController@index')->name('home');

    /*-----------------------------------CATEGORY--------------------------------------------------------*/
    Route::group(['prefix' => 'category'], function() {
        Route::get('/', 'Admin\CategoryController@getCate')->name('cate.index');

        Route::post('/check-name', 'Admin\CategoryController@checkName')->name('cate.checkName');

        Route::post('/check-slug', 'Admin\CategoryController@checkSlug')->name('cate.checkSlug');

        Route::get('/add', 'Admin\CategoryController@add')->name('cate.add');

        Route::get('/update/{id}', 'Admin\CategoryController@edit')->name('cate.edit')->middleware('isAuthor');

        Route::get('/show/{id}', 'Admin\CategoryController@show')->name('cate.show');

        Route::get('/remove/{id}', 'Admin\CategoryController@remove')->name('cate.remove')->middleware('isAuthor');

        Route::post('/save', 'Admin\CategoryController@save')->name('cate.save');
    });
    Route::post('getSlug', 'Admin\CategoryController@getSlug')->name('getSlug');

    /*-----------------------------------POST--------------------------------------------------------------*/
    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'Admin\PostController@getPost')->name('post.index');

        Route::post('/check-name', 'Admin\PostController@checkName')->name('post.checkName');

        Route::post('/check-tag', 'Admin\PostController@checkTag')->name('post.checkTag');

        Route::post('/check-slug', 'Admin\PostController@checkSlug')->name('post.checkSlug');

        Route::get('/add', 'Admin\PostController@add')->name('post.add');

        Route::get('/update/{id}', 'Admin\PostController@edit')->name('post.edit')->middleware('isAuthor');

        Route::get('/show/{id}', 'Admin\PostController@show')->name('post.show');

        Route::get('/remove/{id}', 'Admin\PostController@remove')->name('post.remove')->middleware('isAuthor');

        Route::post('/save', 'Admin\PostController@save')->name('post.save');
    });

    /*------------------------------------PRODUCT--------------------------------------------------------------*/
    Route::prefix('products')->group(function () {
        Route::get('/', 'Admin\ProductController@getProduct')->name('product.index');

        Route::post('/check-name', 'Admin\ProductController@checkName')->name('product.checkName');

        Route::post('/check-slug', 'Admin\ProductController@checkSlug')->name('product.checkSlug');

        Route::get('/add', 'Admin\ProductController@add')->name('product.add');

        Route::get('/update/{id}', 'Admin\ProductController@edit')->name('product.edit')->middleware('isAuthor');

        Route::get('/show/{id}', 'Admin\ProductController@show')->name('product.show');

        Route::get('/remove/{id}', 'Admin\ProductController@remove')->name('product.remove')->middleware('isAuthor');

        Route::post('/save', 'Admin\ProductController@save')->name('product.save');

        Route::get('/duplicate', 'Admin\ProductController@duplicate')->name('product.duplicate');

        Route::post('/duplicate-save', 'Admin\ProductController@saveDuplicate')->name('product.save.duplicate');

        Route::delete('/remove-all', 'Admin\ProductController@removeAll')->name('product.remove.all');
    });

/*---------------------------------------------ORDER----------------------------------------------------------------*/
    Route::prefix('orders')->group(function () {
        Route::get('/', 'Admin\OrderController@getOrders')->name('order.index');

        Route::get('/update/{id}', 'Admin\OrderController@edit')->name('order.edit')->middleware('isAuthor');

        Route::get('/remove/{id}', 'Admin\OrderController@remove')->name('order.remove')->middleware('isAuthor');

        Route::put('/save', 'Admin\OrderController@save')->name('order.save');
    });

/*-------------------------------------------User--------------------------------------------------------------*/
    Route::group(['prefix' => 'users', 'middleware' => 'isAuthor'], function() {
        Route::get('/', 'Admin\UserController@getUsers')->name('user.index');

        Route::get('/update/{id}', 'Admin\UserController@edit')->name('user.edit');

        Route::get('/remove/{id}', 'Admin\UserController@remove')->name('user.remove');

        Route::put('/edit', 'Admin\UserController@save')->name('user.save');
    });
});