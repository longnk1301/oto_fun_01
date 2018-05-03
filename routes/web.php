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
    //route thay doi ngon ngu
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
});
