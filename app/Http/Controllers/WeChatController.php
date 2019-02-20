<?php

namespace App\Http\Controllers;

class WeChatController extends Controller
{
    public function serve()
    {
        $app = app('wechat.official_account');

        $app->server->push(function ($message) {
            \Log::info('123');
            return "欢迎关注 everan！你发的信息为：";
        });

        $response = $app->server->serve();
        \Log::info('1234:' . json_encode($response));
        return $response;
    }
}
