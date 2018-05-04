<?php
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');

    //trang chủ
    Route::get('/', 'HomeController@homepage')->name('homepage');

    //check du lieu nhap vao
    Route::post('/logincheck','TestController@check');

    //dang nhap thanh cong
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    //san pham
    Route::get('/car', 'HomeController@car')->name('car');

    //tin tuc
    Route::get('/news', 'HomeController@news')->name('news');

    //Bai viet
    Route::get('/{slug}', 'HomeController@detail')->name('detail');
});
