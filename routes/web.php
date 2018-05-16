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

    //route lấy chứa dữ liệu new car
    Route::get('/getcar', 'HomeController@getCar')->name('getcar');

    //route chứa dữ liệu used car
    Route::get('/getusedcar', 'HomeController@getUsedCar')->name('getusedcar');

    //route sản phẩm cũ
    Route::get('/usedcar', 'HomeController@usedcar')->name('usedcar');

    //route chi tiết sản phẩm

    Route::get('/details-car/{id}', 'HomeController@detail_car')->name('detail.car');

    //route tin tức
    Route::get('/news', 'HomeController@news')->name('news');

    //search
    Route::get('/search-post', 'PostsController@searchPost')->name('client.search.post');

    //route tìm kiếm xe cũ để bán
    Route::get('/used-car-for-sale', 'HomeController@view_used_car_for_sale')->name('used.car.for.sale');

    //tim kiem san pham
    Route::get('/search-products', 'ProductsController@searchProduct')->name('client.search.product');

    //Chi tiet danh muc
    Route::get('/categories/{cateSlug}', 'HomeController@categories')->name('cate.detail');

    //chi tiết bài  viết
    Route::get('/{slug}', 'HomeController@detail')->name('detail');

});
