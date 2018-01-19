<?php

  // if user has clicked the loginbutton
  if(isset($_POST['btnLogin'])){
    include('form.php');
    include('authenticate.php');

    $form = new form(
            [
                'Username'     => $_POST['username'],
                'Password'     => $_POST['password'],
            ]
        );

    $form->validate(
            [
                'Username'   => ['required'],
                'Password'   => ['required'],
            ]
        );


    $form->set_a_field('Password',$form->encrypt($form->get_field('Password')));
    $auth = new Auth($form->get_fields());


    //echo json_encode($form);
  }

?>
