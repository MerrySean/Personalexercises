<?php

$router->GET("/","./exercises/zero/index.php"); // For anyone
$router->GET("/FakeRegistration","./exercises/one/index.php"); // For anyone

$router->GET("/Register","./exercises/two/index.php")->auth('guest'); // For guest only
$router->GET("/usingAjax","./exercises/two/usingAjax/index.php")->auth('guest'); // For Guest only
$router->GET("/Login","./exercises/three/index.php")->auth('guest'); // For guest only

$router->GET("/Home","./exercises/four/index.php")->auth('user'); // For Authenticated users only
$router->GET("/Logout","./exercises/four/user/logout.php")->auth('user'); // For Authenticated users only

// TODO make a table that list all Projects of users
$router->GET('/List/Practical', "./Projects/practical/view/purchaseForm.php")->auth('user');
?>
