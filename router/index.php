<?php


 class router {

  private $uri;
  private $url;

  public function GET($url,$view){
    $this->uri[$url] = [$view];
    $this->url = $url;
    return $this;
  }

  public function auth($auth){
    array_push($this->uri[$this->url],$auth);
  }

  public function route($PATH){
    foreach ($this->uri as $key => $value) {
      if ($PATH === $key) {
        if(!empty($value[1])){
          include('./controller/authenticate.php');
          $auth = new Auth();
          if($value[1] === 'guest'){
            if ($auth->is_Authenticated()) {
              header("Location: ./Home");
            }else{
              include($value[0]);
            }
          }
          else if($value[1] === 'user'){
            if ($auth->is_Authenticated()) {
              include($value[0]);
            }else{
              header("Location: ./");
            }
          }
        }
        else{
          include($value[0]);
        }
      }
    }
  }

 }
