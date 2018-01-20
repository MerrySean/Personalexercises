<?php

$router->GET("/","./exercises/zero/index.php");
$router->GET("/FakeRegistration","./exercises/one/index.php");
$router->GET("/Register","./exercises/two/index.php")->auth('guest');
$router->GET("/usingAjax","./exercises/two/usingAjax/index.php")->auth('guest');
$router->GET("/Login","./exercises/three/index.php")->auth('guest');
$router->GET("/Home","./exercises/four/index.php")->auth('user');

?>
