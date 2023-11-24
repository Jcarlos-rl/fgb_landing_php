<?php
    header("Access-Control-Allow-Origin: *");
    
    require_once 'config/config.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Core.php';

    require_once(BASE_PATH.'public/vendor/autoload.php');

    spl_autoload_register(function($nameClass){
        require_once "libraries/$nameClass.php";
    });

    ini_set('log_errros', '1');
    ini_set('error_log', BASE_PATH.'public/media/errors/db/errors.log');
?>