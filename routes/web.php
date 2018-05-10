<?php
Route::group(['middleware' => 'locale'], function()
{
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');

    //trang chủ
    Route::get('/', 'HomeController@homepage')->name('homepage');

    //check du lieu nhap vao
    Route::post('/logincheck','TestController@check');

    //dang nhap thanh cong
    Auth::routes();

    //data post
    Route::get('/home/forms/post', 'HomeController@post_data')->name('post-data');

    //data car
    Route::get('/home/forms/car', 'HomeController@car_data')->name('car-data');

    Route::get('/home', 'HomeController@index')->name('home');

    //san pham
    Route::get('/newcar', 'HomeController@newcar')->name('newcar');

    Route::get('/usedcar', 'HomeController@usedcar')->name('usedcar');

    //tin tuc
    Route::get('/news', 'HomeController@news')->name('news');

    //Chi tiet danh muc
    Route::get('/categories/{cateSlug}', 'HomeController@categories')->name('cate.detail');

    //Bai viet
    Route::get('/{slug}', 'HomeController@detail')->name('detail');

});
