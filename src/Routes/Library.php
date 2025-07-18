<?php

namespace Tualo\Office\IconFont\Routes;

use Tualo\Office\Basic\TualoApplication as App;
use Tualo\Office\Basic\Route as BasicRoute;
use Tualo\Office\Basic\IRoute;
use Tualo\Office\Basic\RouteSecurityHelper;

class Library implements IRoute
{

    public static function register()
    {
        BasicRoute::add('/iconfont_library/(?P<path>.*)', function ($matches) {
            RouteSecurityHelper::serveSecureStaticFile(
                $matches['path'],
                dirname(__DIR__, 2) . '/lib',
                ['html', 'htm', 'js', 'css', 'json', 'svg', 'woff2', 'woff', 'ttf'],
                [
                    'html' => 'text/html',
                    'js' => 'application/javascript',
                    'css' => 'text/css',
                    'json' => 'application/json',
                    'svg' => 'image/svg+xml',
                    'woff2' => 'font/woff2',
                    'woff' => 'font/woff',
                    'ttf' => 'font/ttf'
                ]
            );
        }, ['get'], false);
    }
}
