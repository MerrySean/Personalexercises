<?php include('../../../controller/form.php');?>
<?php

    if(isset($_POST['btnSubmit']) && isset($_POST['gender']))
    {

        $form = new form(
                [
                    'Firstname'     => $_POST['fname'],
                    'Lastname'     => $_POST['lname'],
                    'Address'   => $_POST['Address'],
                    'email'     => $_POST['email'],
                    'gender'    => $_POST['gender'],
                    'Username'     => $_POST['uname'],
                    'Password'      => $_POST['pass'],
                    'cpass'     => $_POST['cpass']
                ]
            );

        $form->validate(
                [
                    'Firstname'   => $_POST['validation']['fname'],
                    'Lastname'   => $_POST['validation']['lname'],
                    'Address' => $_POST['validation']['Address'],
                    'email'   => $_POST['validation']['email'],
                    'gender'  => $_POST['validation']['gender'],
                    'Username'   => $_POST['validation']['uname'],
                    'Password'    => $_POST['validation']['pass'],
                    'cpass'   => $_POST['validation']['cpass']
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
        $form->set_submitted($IsSubmitted);
        echo json_encode($form);
    }






?>
