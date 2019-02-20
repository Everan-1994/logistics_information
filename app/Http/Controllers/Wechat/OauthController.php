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
        $response = $this->app->oauth->scopes(['snsapi_userinfo'])->redirect();
        \Log::info(json_encode($response));
        return $response;
    }
}
