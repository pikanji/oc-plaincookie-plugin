# OctoberCMS Plain Cookie Plugin

[OctoberCMS](http://octobercms.com/) で暗号化されていないCookieを使用するためのプラグインです。

OctoberCMSはCookieを常に暗号化するため、例えばフロントエンドで設定したCookieを正常に読み込むことができません。
このプラグインは、指定したCookieの暗号化を無効にします。

## 使い方
### インストール
下記コマンドでComposerからインストールします。
```
composer require pikanji/plaincookie-plugin
```

### app.php の修正
下記の様に`bootstrap/app.php`を修正してください。
```
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
//    October\Rain\Foundation\Http\Kernel::class
    Pikanji\PlainCookie\Classes\Foundation\Http\Kernel::class
);
```

### Specifying Cookie Names
暗号化を無効にするCookieを指定する方法は２通りあります。

#### 設定ファイルから
`config/cookie.php`を作成し、暗号化を無効にしたいCookieの名前の配列を`unencrypted_cookies`として返します。

例：

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

#### プログラムから
`Config` ファサードで設定を追加することもできます。
```
Config::push('cookie.unencrypted_cookies', "my_cookie");
```

