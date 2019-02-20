<?php

namespace App\Http\Controllers;

class WechatController extends Controller
{
    public function serve()
    {
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 everan！你发的信息为：" . $message;
        });

        return $app->server->serve();
    }
}
