<?php namespace Pikanji\PlainCookie\Classes\Cookie\Middleware;

use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Config;

class EncryptCookies extends \Illuminate\Cookie\Middleware\EncryptCookies
{
    public function __construct(EncrypterContract $encrypter)
    {
        parent::__construct($encrypter);
        $except = Config::get('cookie.no_encrypt');
        $this->disableFor($except);
    }
}
