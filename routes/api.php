<?php

// 网页授权
Route::get('/oauth', 'Wechat\OauthController@oauth');

Route::get('/user', 'Wechat\OauthController@user');


