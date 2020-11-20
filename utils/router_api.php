<?php
   require_once 'RouterClass.php';
   
   $r = new Router();
   //Aca las rutas 

   $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);//utilizamos resources y verbos