<?php

namespace App\Http\Controllers;

class WeChatController extends Controller
{
    protected  $app;

    public function __construct()
    {
        $this->app = app('wechat.official_account');
    }

    public function serve()
    {
        $this->app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'text':
                    return '收到文字消息：' . $message['Content'];
                    break;
                default:
                    return '欢迎关注 『物流信息』！';
                    break;
            };

            if ($message['Event'] === 'SCAN') {
                $openid = $message['FromUserName'];

                \Log::info(json_encode($message));
            };
        });

        return $this->app->server->serve();
    }

    public function code()
    {
        $result = $this->app->qrcode->temporary('everan', 600);
        $qrcodeUrl = $this->app->qrcode->url($result['ticket']);

        return view('welcome', compact('qrcodeUrl'));
    }

    public function index()
    {
        return view('oauth');   
    }

}
