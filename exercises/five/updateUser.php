<?php include('./controller/form.php');?>

<?php
    if(isset($_POST['whatToUpdate']) && isset($_POST['ToUpdate']))
    {
        $validations = [
            'Firstname'   => ['required','+max-20','+min-3','noSpcChr'],
            'Lastname'    => ['required','+max-20','+min-2','noSpcChr'],
            'Address'     => ['required','+min-10'],
            'email'       => ['required','email','+Unique-Registration>Email'],
            'gender'      => ['required'],
            'Username'    => ['required','+max-15','+min-6','noSpcChr','noSpace','+Unique-Registration>Username'],
            'Password'    => ['required','+max-20','+min-6','strength'],
            'cpass'       => ['required','+max-20','+min-6','+sameWith-Password']
        ];

        $what = $_POST['whatToUpdate'];
        $to   = $_POST['ToUpdate'];
        $old  = $_POST['OldValue'];
        $pass = $_POST['Password'];
        $ThisValidation = "";

        $form = new form([$what => $to]);
        foreach ($validations as $key => $value) {
          if($key === $what){
            $ThisValidation = [$key => $value];
          }
        }
        $form->validate($ThisValidation);
            // required           = Field must not be empty
            // +max-20            = Field must have not have more than 20 characters
            //                      - 20 can be changed to anything you like
            // +min-3             = Field must have not be less than 3 characters
            //                      - 3 can be changed to anything you like
            // noSpcChr           = Field must not contain any Special characters
            // emai               = Field should be email formted
            // noSpace            = Field must not have any space characters
            // strenght           = Field must contain random characters with special
            // +sameWith-Password = Field must be the same with "Password" Field
            //                      - Password can be change but to anything you like
            //                      - Password is one of the key's in fields
        if($what === 'Password'){
          $form->set_a_field('Password',$form->encrypt($form->get_field('Password'),$form->get_field('Username')));
        }
        $encPass = $form->encrypt($pass,$_SESSION['user']['Username']);
        $auth = new Auth();
        $authentication = $auth->authenticate(['Username'=>$_SESSION['user']['Username'], 'Password'=>$encPass]);
        $IsSubmitted = false;
        if($authentication){
          $IsSubmitted = $form->update("Registration",$what,$to,$old);
          $authentication = $auth->authenticate(['Username'=>$_SESSION['user']['Username'], 'Password'=>$encPass]);
        }
        echo json_encode(['Result'=>$IsSubmitted]);
    }else{
      echo json_encode(['a'=>'hello']);
    }

?>
