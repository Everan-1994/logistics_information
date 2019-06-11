<?php

Route::get('/', 'WeChatController@index');

Route::any('/wechat', 'WeChatController@serve');
