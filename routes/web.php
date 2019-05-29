<?php

Route::get('/', 'WeChatController@code');

Route::any('/wechat', 'WeChatController@serve');
