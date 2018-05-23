<?php
Route::group(['middleware' => 'locale'], function()
{
    Route::get('/', 'Admin\DashboardController@index')->name('home');

    /*-----------------------------------CATEGORY--------------------------------------------------------*/
    Route::prefix('category')->group(function () {
        Route::get('/', 'Admin\CategoryController@getCate')->name('cate.index');

        Route::post('/check-name', 'Admin\CategoryController@checkName')->name('cate.checkName');

        Route::post('/check-slug', 'Admin\CategoryController@checkSlug')->name('cate.checkSlug');

        Route::get('/add', 'Admin\CategoryController@add')->name('cate.add');

        Route::get('/update/{id}', 'Admin\CategoryController@edit')->name('cate.edit');

        Route::get('/remove/{id}', 'Admin\CategoryController@remove')->name('cate.remove');

        Route::post('/save', 'Admin\CategoryController@save')->name('cate.save');
    });
    Route::post('getSlug', 'Admin\CategoryController@getSlug')->name('getSlug');

    /*-----------------------------------POST--------------------------------------------------------------*/
    Route::prefix('posts')->group(function () {
        Route::get('/', 'Admin\PostController@getPost')->name('post.index');

        Route::post('/check-name', 'Admin\PostController@checkName')->name('post.checkName');

        Route::post('/check-slug', 'Admin\PostController@checkSlug')->name('post.checkSlug');

        Route::get('/add', 'Admin\PostController@add')->name('post.add');

        Route::get('/update/{id}', 'Admin\PostController@edit')->name('post.edit');

        Route::get('/remove/{id}', 'Admin\PostController@remove')->name('post.remove');

        Route::post('/save', 'Admin\PostController@save')->name('post.save');
    });

    /*------------------------------------PRODUCT--------------------------------------------------------------*/
    Route::get('cars', 'Admin\CarsController@getCarData')->name('car.data');
});