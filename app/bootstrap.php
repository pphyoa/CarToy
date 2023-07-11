<?php 

require_once "../app/config/config.php";
require_once "../app/helper/helper.php";
spl_autoload_register(function($className){
     require_once "../app/libs/". $className .".php";
});

