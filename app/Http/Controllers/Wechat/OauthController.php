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
        dd($this->app->oauth->user());
    }
}
