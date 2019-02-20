<?php

// 网页授权
Route::get('/oauth', 'Wechat\OauthController@oauth');

Route::get('/user', 'Wechat\OauthController@user');

//Route::post('/menu', 'Wechat\OauthController@menu');
//Route::get('/menu', 'Wechat\OauthController@menuList');


