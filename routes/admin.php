<?php
Route::group(['middleware' => 'locale'], function()
{
    Route::get('/', 'Admin\DashboardController@index')->name('home');

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

    //data car admin
    Route::get('cars', 'Admin\CarsController@getCarData')->name('car.data');
});