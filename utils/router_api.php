<?php
   require_once 'RouterClass.php';
   require_once '../api/ApiCommentaryController.php';
   
   $r = new Router();
   //Aca las rutas 
   $r->addRoute("commentary/:ID", "GET", "ApiCommentaryController", "getCommentaries");

   $r->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);//utilizamos resources y verbos

