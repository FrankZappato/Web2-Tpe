<?php
   require_once 'RouterClass.php';

   define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

   $r = new Router();
   //Aca las rutas 

   $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);//utilizamos resources y verbos