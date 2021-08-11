<?php

namespace App\Http\Middleware;

use App\Helpers\SecurityUtil;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        SecurityUtil::ORDER_COOKIE_KEY
    ];
}
