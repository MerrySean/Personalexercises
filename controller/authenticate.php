<?php

class Auth{

  protected $user;

  public function __construct(){
    session_start();
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

  public function user($credentials){
    if(!$credentials === 'Password'){
      return $_SESSION['user'][$credentials];  
    }
  }

  public function Logout(){
    session_destroy();
  }


}
