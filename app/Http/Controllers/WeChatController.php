<?php

namespace App\Http\Controllers;

class WeChatController extends Controller
{
    public function serve()
    {
        $app = app('wechat.official_account');

        $app->server->push(function ($message) {
            \Log::info(json_encode($message));
            return "欢迎关注 everan！你发的信息为：";
        });

        return $app->server->serve();
    }
}
