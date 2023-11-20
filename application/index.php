<?php
    require_once 'config/config.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Core.php';

    require_once(BASE_PATH.'public/vendor/autoload.php');

    spl_autoload_register(function($nameClass){
        require_once 'libraries/' . '$nameClass' . '.php';
    });
?>