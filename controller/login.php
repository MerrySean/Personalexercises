<?php

  // if user has clicked the loginbutton
  if(isset($_POST['btnLogin'])){
    include('form.php');
    include('authenticate.php');

    $form = new form(
            [
                'Username'    => $_POST['username'],
                'Password'    => $_POST['password'],
            ]
        );

    $form->validate(
            [
                'Username'   => ['required'],
                'Password'   => ['required'],
            ]
        );

    // Encrypt password field
    $form->set_a_field('Password',$form->encrypt($form->get_field('Password'),$form->get_field('Username')));
    echo $form->get_field('Password');
    // Start Session
    $auth = new Auth();
    // Authenticate user
    $authentication = $auth->authenticate($form->get_fields());
    // check if user was successfully authenticated
    if($auth->is_Authenticated()){
      header("Location: ../Home");
    }else {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  }

?>
