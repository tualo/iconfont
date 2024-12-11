<?php

namespace Tualo\Office\IconFont\Middlewares;
use Tualo\Office\Basic\TualoApplication;
use Tualo\Office\Basic\IMiddleware;
use Tualo\Office\ExtJSCompiler\AppJson;

class Middleware implements IMiddleware{
    public static function register(){
        TualoApplication::use('iconfont_library',function(){
            try{
                $fa_lic = TualoApplication::configuration('fontawesome','license','free');
                TualoApplication::stylesheet("./iconfont_library/entypo/stylesheets/entypo-icons.css" );
                TualoApplication::stylesheet("./iconfont_library/fa6/".$fa_lic."/css/all.min.css" );
                TualoApplication::stylesheet("./iconfont_library/typicons/font/typicons.min.css" );
                TualoApplication::stylesheet("./iconfont_library/material-design-iconic-font/css/material-design-iconic-font.min.css" );

            }catch(\Exception $e){
                TualoApplication::set('maintanceMode','on');
                TualoApplication::addError($e->getMessage());
            }
        },-10000); // should be one of the last
    }
}