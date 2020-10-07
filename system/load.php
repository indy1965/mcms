<?php

require_once(WUO_ROOT . '/vendor/autoload.php');

use Engine\{DI, Cms};

try{
//    dependency injection
    $di = new DI();

    $services = require (__DIR__ . '/engine/service/config.php');

    foreach ($services as $serv){
        $sr = new $serv($di);
        $sr->init();
    }

    $cms = new Cms($di);
    $cms->run();
}
catch (\ErrorException $err){
    echo $err->getMessage();
}
