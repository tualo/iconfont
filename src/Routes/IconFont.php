<?php
namespace Tualo\Office\IconFont\Routes;
use Tualo\Office\Basic\TualoApplication;
use Tualo\Office\Basic\Route;
use Tualo\Office\Basic\IRoute;


class IconFont implements IRoute{
    public static function register(){

        Route::add('/iconfont/read',function(){
            $db = TualoApplication::get('session')->getDB();
            $session = TualoApplication::get('session');
            try {
        
                $limit = isset($_REQUEST['limit'])?$_REQUEST['limit']:10000;
                $start = isset($_REQUEST['start'])?$_REQUEST['start']:0;
            
                $sql = 'select id,classname,shortname,source from icons';
                if (isset($_REQUEST['query'])){
                  $q = ($_REQUEST['query']);
                  $sql .= ' where shortname like \'%'.$db->escape_string($q).'%\'';
                }
                TualoApplication::result('data',$db->direct($sql.' limit '.$start.', '.$limit));
                TualoApplication::result('success', true);
            }catch(\Exception $e){
                TualoApplication::result('msg', $e->getMessage());
            }
            TualoApplication::contenttype('application/json');
        },array('get'),false);


    }
}