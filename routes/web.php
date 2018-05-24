<?php
Route::group(['middleware' => 'locale'], function()
{
    Route::get('change-language/{language}', 'HomeController@changeLanguage')
        ->name('user.change-language');

    //trang chủ
    Route::get('/', 'HomeController@homepage')->name('homepage');

    Route::get('login', 'Auth\LoginController@login')->name('login');

    Route::post('login', 'Auth\LoginController@postlogin');

    Route::any('logout', 'Auth\LoginController@logout')->name('logout');

    //sản phẩm mới
    Route::get('/newcar', 'HomeController@newcar')->name('newcar');

    //route lấy chứa dữ liệu new car
    Route::get('/getnewcar', 'HomeController@getNewCar')->name('getnewcar');

    //route chứa dữ liệu used car
    Route::get('/getusedcar', 'HomeController@getUsedCar')->name('getusedcar');

    //route sản phẩm cũ
    Route::get('/usedcar', 'HomeController@usedcar')->name('usedcar');

    //route tin tức
    Route::get('/news', 'HomeController@news')->name('news');

    //search
    Route::get('/search-post', 'PostsController@searchPost')->name('client.search.post');

    //route tìm kiếm xe cũ để bán
    Route::get('/used-car-for-sale', 'HomeController@view_used_car_for_sale')->name('used.car.for.sale');

    //tim kiem san pham
    Route::get('/search-products', 'ProductsController@searchProduct')->name('client.search.product');

    //
    Route::post('/find-car', 'HomeController@findCar');

    //so sanh
    Route::get('/compare', 'HomeController@compare')->name('compare');

    //Route::get('/compare-add/{id}', 'HomeController@compareAdd')->name('compare.add');
    Route::post('/compare-add', 'HomeController@compareAdd')->name('compare.add');

    Route::get('/compare-del', 'HomeController@compareDeleteAll')->name('compare.del');

    Route::get('/compare-del-item', 'HomeController@compareDeleteItem')->name('compare.del.item');
    //
    Route::get('/compare-list', 'HomeController@getListCompare')->name('compare.list');

    //route chi tiết sản phẩm
    Route::get('/details-car/{id}', 'HomeController@detail_car')->name('detail.car');

    //Chi tiet danh muc
    Route::get('/categories/{cateSlug}', 'HomeController@categories')->name('cate.detail');


    Route::get('/getSession', 'HomeController@getSession');
    //chi tiết bài  viết
    Route::get('/{slug}', 'HomeController@detail')->name('detail');
});
