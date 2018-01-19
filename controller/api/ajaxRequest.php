<?php include('../form.php');?>
<?php

    if(isset($_POST['btnSubmit']) && isset($_POST['gender']))
    {

        $form = new form(
                [
                    'Firstname' => $_POST['fname'],
                    'Lastname'  => $_POST['lname'],
                    'Address'   => $_POST['Address'],
                    'email'     => $_POST['email'],
                    'gender'    => $_POST['gender'],
                    'Username'  => $_POST['uname'],
                    'Password'  => $_POST['pass'],
                    'cpass'     => $_POST['cpass']
                ]
            );

        $form->validate(
                [
                    'Firstname' => ['required','+max-20','+min-3','noSpcChr'],
                    'Lastname'  => ['required','+max-20','+min-2','noSpcChr'],
                    'Address'   => ['required','+min-10'],
                    'email'     => ['required','email','+Unique-Registration>Email'],
                    'gender'    => ['required'],
                    'Username'  => ['required','+max-15','+min-6','noSpcChr','noSpace','+Unique-Registration>Username'],
                    'Password'  => ['required','+max-20','+min-6','strength'],
                    'cpass'     => ['required','+max-20','+min-6','+sameWith-Password']
                ]
            );
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
        array_pop($form->fields);
        //before running submit all form validation must have no errors
        $IsSubmitted = $form->submit("Registration");
        //set Submitted to to what is the result of the submittion
        $form->set_submitted($IsSubmitted);
        //echo out a json encoded of a form
        echo json_encode($form);
    }






?>
