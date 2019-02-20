<?php

namespace App\Http\Controllers;

class WeChatController extends Controller
{
    public function serve()
    {
        $app = app('wechat.official_account');

        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'text':
                    return '收到文字消息：' . $message['Content'];
                    break;
                default:
                    return '欢迎关注 『物流信息』！';
                    break;
            }
        });

        return $app->server->serve();
    }
}
