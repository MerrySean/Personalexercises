<?php

  include('router/index.php');
  $router = new router;
  include_once("./router/routes.php");

  $uri = substr($_SERVER['REQUEST_URI'],18);
  $router->route($uri);

?>
