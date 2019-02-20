<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OauthController extends Controller
{
    protected $app;

    public function __construct()
    {
        $this->app = app('wechat.official_account');
    }

    public function oauth()
    {
        $response = $this->app->oauth->scopes(['snsapi_userinfo'])->redirect(env('APP_URL') . '/api/user');

        return $response;
    }

    public function user()
    {
        $user = $this->app->oauth->user();
        echo $user->getId();
    }

    public function menu()
    {
        $buttons = [
            [
                "type" => "view",
                "name" => "测试一",
                "url"  => "http://loginfo.lzdu.com/api/oauth"
            ],
            [
                "type" => "view",
                "name" => "测试二",
                "url"  => "http://loginfo.lzdu.com/api/oauth"
            ],
            [
                "name" => "其他",
                "sub_button"  => [
                    [
                        "type" => "view",
                        "name" => "送货单表",
                        "url"  => "http://www.baidu.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "个人中心",
                        "url"  => "http://www.baidu.com/"
                    ],
                ]
            ],
        ];

        $this->app->menu->create($buttons);
    }

    public function menuList()
    {
        dd($this->app->menu->list());
    }
}
