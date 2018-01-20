<?php

$router->GET("/","./exercises/zero/index.php"); // For anyone
$router->GET("/FakeRegistration","./exercises/one/index.php"); // For anyone

$router->GET("/Register","./exercises/two/index.php")->auth('guest'); // For guest only
$router->GET("/usingAjax","./exercises/two/usingAjax/index.php")->auth('guest'); // For Guest only
$router->GET("/Login","./exercises/three/index.php")->auth('guest'); // For guest only

$router->GET("/Home","./exercises/four/index.php")->auth('user'); // For Authenticated users only
$router->GET("/Logout","./exercises/four/user/logout.php")->auth('user'); // For Authenticated users only
// TODO make a table that list all practicals
$router->GET('/List/Practical', "./practical/view/purchaseForm.php")->auth('user'); // For Authenticated users only
// TODO make a table that list all exercises
$router->GET('/List/Practical', "./practical/view/purchaseForm.php")->auth('user'); // For Authenticated users only
?>
