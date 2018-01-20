
<?php

if($auth->is_Authenticated()){
  $auth->Logout();
  header("Location: ./Home");
}

 ?>
