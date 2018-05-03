<?php 

//trang chủ
Route::get('/', 'HomeController@index')->name('homepage');


//trang login
Route::get('user/login', 'HomeController@login')->name('login');


//trang register
Route::get('user/register', 'HomeController@register')->name('register');

 ?>