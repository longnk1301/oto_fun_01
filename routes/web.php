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

    //data post admin
    Route::get('/home/forms/post', 'HomeController@getPostData')->name('post.data');

    //data car admin
    Route::get('/home/forms/car', 'HomeController@getCarData')->name('car.data');

    Route::get('/home', 'HomeController@index')->name('home');

    //sản phẩm mới
    Route::get('/newcar', 'HomeController@newcar')->name('newcar');

    //route lấy chứa dữ liệu json
    Route::get('/getcar', 'HomeController@getCar')->name('getcar');

    //route sản phẩm cũ
    Route::get('/usedcar', 'HomeController@usedcar')->name('usedcar');

    //route chi tiết sản phẩm
    Route::get('car-details', 'Homecontroller@car_detail')->name('car.detail');

    //route tin tức
    Route::get('/news', 'HomeController@news')->name('news');

    //route tìm kiếm xe cũ để bán
    Route::get('/used-car-for-sale', 'HomeController@view_used_car_for_sale')->name('used.car.for.sale');

    //search
    Route::get('/search', 'HomeController@search')->name('client.search');

    //Chi tiet danh muc
    Route::get('/categories/{cateSlug}', 'HomeController@categories')->name('cate.detail');

    //chi tiết bài  viết
    Route::get('/{slug}', 'HomeController@detail')->name('detail');

});
