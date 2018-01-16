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

        $FormValid = $form->validate(
                [
                    'fname'   => ['required','+max-20','+min-3','noSpcChr'],
                    'lname'   => ['required','+max-20','+min-2','noSpcChr'],
                    'Address' => ['required','+min-10'],
                    'email'   => ['required','email'],
                    'gender'  => ['required'],
                    'uname'   => ['required','+max-15','+min-6','noSpcChr','noSpace'],
                    'pass'    => ['required','+max-20','+min-6','strength'],
                    'cpass'   => ['required','+max-20','+min-6','+sameWith-pass']
                ]
            );

        $SubmitResult = "";

        if($FormValid){
            $table = "Registration (firstname,lastname,address,email,gender,username,pass)";
            $encpass = md5($form->fields['pass']);
            $values = 'Values ('.$form->fields['fname'].','.$form->fields['lname'].','.$form->fields['Address'].','.$form->fields['email'].','.$form->fields['gender'].','.$form->fields['uname'].','.$encpass.')';
            $SubmitResult = $form->submit($table,$values);
        }

            //Show Send Errors...
            echo json_encode([
                'validation_errors'=>$form->validation_errors,
                'wasSubmitted' => $form->wasSubmitted,
                'SubmitResult' => $SubmitResult
                ]);


    }else {
        header("Location: ../");
    }
?>