# OctoberCMS Plain Cookie Plugin

[日本語版はこちら](./README_ja.md)

[OctoberCMS](http://octobercms.com/) plugin that enables unencrypted cookies.

Cookies handled by OctoberCMS are always encrypted.
This plugin lets the developer to specify cookies that should not be encrypted.

This is useful when you want to let the backend code to read the cookie value set in frontend.

This plugin becomes unnecessary when [this PR](https://github.com/octobercms/library/pull/335) is merged & released.

## Usage
### Installation
You can install this plugin via composer. Execute below at the root of your project.
```
composer require pikanji/plaincookie-plugin
```

### Modify app.php
Modify `bootstrap/app.php` to replace `October\Rain\Foundation\Http\Kernel::class`
with `Pikanji\PlainCookie\Classes\Foundation\Http\Kernel::class` in http kernel binding.

```
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
//    October\Rain\Foundation\Http\Kernel::class
    Pikanji\PlainCookie\Classes\Foundation\Http\Kernel::class
);
```

### Specifying Cookie Names
There are two ways to specify the cookies that you don't want to encrypt.

#### Via Config File
Add `config/cookie.php` file that returns an array of the cookie names.

Example

```
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cookies No Encryption
    |--------------------------------------------------------------------------
    |
    | List the key of cookies that you do NOT want to encrypt.
    |
    */
    "unencrypted_cookies" => [
        "my_cookie",
    ],
];
```

#### From Code
Use `Config` facade to add from your `Plugin::boot()`.
```
Config::push('cookie.unencrypted_cookies', "my_cookie");
```

