<?php

  // if user has clicked the loginbutton
  if(isset($_POST['btnLogin'])){
    include('form.php');

    $form = new form(
            [
                'Username'     => $_POST['username'],
                'Password'     => $_POST['password'],
            ]
        );

    $form->validate(
            [
                'Username'   => ['required','+max-20','+min-3','noSpcChr'],
                'Password'   => ['required','+max-20','+min-3','noSpcChr'],
            ]
        );
    
    echo json_encode($form);
  }

?>
