<?php


 class router {

  private $uri;

  public function GET($url,$view){
    $this->uri[$url] = $view;
  }

  public function route($PATH){

    foreach ($this->uri as $key => $value) {
      if ($PATH === $key) {
        include($value);
      }
    }
  }

 }
