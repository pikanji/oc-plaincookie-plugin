<?php namespace Pikanji\PlainCookie\Classes\Cookie\Middleware;

use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Config;

class EncryptCookies extends \Illuminate\Cookie\Middleware\EncryptCookies
{
    public function __construct(EncrypterContract $encrypter)
    {
        parent::__construct($encrypter);
        $except = Config::get('cookie.unencrypted_cookies');
        $this->disableFor($except);
    }
}
