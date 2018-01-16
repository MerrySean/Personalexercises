<?php include('../../../controller/form.php');?>
<?php 

    if(isset($_POST['btnSubmit']) && isset($_POST['gender']))
    {

        $form = new form(
                [
                    'fname'     => $_POST['fname'],
                    'lname'     => $_POST['lname'],
                    'Address'   => $_POST['Address'],
                    'email'     => $_POST['email'],
                    'gender'    => $_POST['gender'],
                    'uname'     => $_POST['uname'],
                    'pass'      => $_POST['pass'],
                    'cpass'     => $_POST['cpass']
                ]
            );

        $form->validate(
                [
                    'fname'   => $_POST['validation']['fname'],
                    'lname'   => $_POST['validation']['lname'],
                    'Address' => $_POST['validation']['Address'],
                    'email'   => $_POST['validation']['email'],
                    'gender'  => $_POST['validation']['gender'],
                    'uname'   => $_POST['validation']['uname'],
                    'pass'    => $_POST['validation']['pass'],
                    'cpass'   => $_POST['validation']['cpass']
                ]
            );
        echo json_encode($form);
    }


    



?>