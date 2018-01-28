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
        include_once('./controller/authenticate.php');
        $auth = new Auth();
        if(!empty($value[1])){
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
              header("Location: http://127.0.0.1/Personalexercises/");
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
