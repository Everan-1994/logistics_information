<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const SEX_UN = 0;
    const SEX_BOY = 1;
    const SEX_GIRL = 2;

    const FREEZE = 0;
    const ACTIVE = 1;

    public static $gender = [
        self::SEX_UN   => '未知',
        self::SEX_BOY  => '男',
        self::SEX_GIRL => '女'
    ];

    public static $status = [
        self::FREEZE => '冻结',
        self::ACTIVE => '正常'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick_name', 'true_name', 'avatar', 'phone',
        'position', 'openid', 'session_key', 'gender',
        'identify', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getGenderAttribute($value)
    {
        return self::$gender[$value];
    }
}
