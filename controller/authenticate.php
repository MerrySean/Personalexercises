<?php

class Auth{

  protected $user;

  public function __construct(){
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
  }

  public function authenticate($credentials){
    //include("Database.php");
    $db = new Database();
    $user = $db->selectAll('Registration','Username',$credentials['Username']);

    if(empty($user)){
      return "User not found";
    }
    else if($user['Password'] === $credentials['Password']){
      $_SESSION['user'] = $user;
      return true;
    }
    else{
      return "Credentials does not match";
    }
  }

  public function is_Authenticated(){
    return !empty($_SESSION['user']);
  }


  public function name(){
    return $_SESSION['user']['Firstname']." ".$_SESSION['user']['Lastname'];
  }

  public function gender(){
    return $_SESSION['user']['gender'];
  }

  public function user($credentials = ''){
    if(!empty($credentials) && !($credentials === 'Password')){
      return $_SESSION['user'][$credentials];
    }else if(empty($credentials)){
      $temporary = $_SESSION['user'];
      unset($temporary['id']);
      unset($temporary['Password']);
      return $temporary;
    }
  }

  public function Logout(){
    session_destroy();
  }


}
