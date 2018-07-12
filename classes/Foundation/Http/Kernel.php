<?php namespace Pikanji\PlainCookie\Classes\Foundation\Http;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Router;
use October\Rain\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Create a new HTTP kernel instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function __construct(Application $app, Router $router)
    {
        $origClass = \Illuminate\Cookie\Middleware\EncryptCookies::class;
        $newClass = \Pikanji\PlainCookie\Classes\Cookie\Middleware\EncryptCookies::class;
        if (($key = array_search($origClass, $this->middlewareGroups['web'])) !== false) {
            $this->middlewareGroups['web'][$key] = $newClass;
        } else {
            $this->middlewareGroups['web'][] = $newClass;
        }
        parent::__construct($app, $router);
    }
}
