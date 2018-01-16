
<?php

    class validator {

        // this array is what is going to be validated
        public $cases = [];

        // dynamic value extractor
        function dynamic_extract($value){
            $part1 = substr(strstr($value, '-', true),1);
            $part2 = substr(strstr($value, '-'), 1);

            return [$part1 => $part2];
        }

        // this adds a function in the array of cases
        function addCase($casename,$fn){
            $newArray = [ $casename => $fn];
            $this->cases += $newArray;
        }

        // Use this function to validated
        function psuedoSwitch($validation,$value){
            if($this->cases[$validation]){
                if(is_array($value)){
                    return call_user_func_array($this->cases[$validation], $value);
                }else{
                    return call_user_func($this->cases[$validation], $value);
                }
            }
        }

        //this function Creates the main Cases for validation
        /*
            To add mo cases
            just do call addCase function using $this
            Paramater 1 = Case name
            Paramater 2 = Function on how to validate this case
        */
        function createMainCases(){
            // required Case
            $this->addCase('required',function($value){
				if($value !== ""){
					return 'Passed';
				}else{
					return 'No value';
				}
            });
            // no Special Character Case
            $this->addCase('noSpcChr',function($value){
				if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)){
					return 'Special characters is not allowed';
				}else {
                    return 'Passed';
                }
            });
            // is a valid Email
            $this->addCase('email',function($value){
                if(!empty($value)){
                    if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        return "Passed";
                    } else {
                        return "This $value email address is not a valid.";
                    }
                }else{
                    return "No value";
                }

            });
            // measure string strenght usually used for password
            $this->addCase('strength',function($value){
                if(!empty($value)){
                    if ( strlen( $value ) == 0 )
                    {
                        return 1;
                    }
                    $strength = 0;
                    /*** get the length of the value ***/
                    $length = strlen($value);

                    /*** check if value is not all lower case ***/
                    if(strtolower($value) != $value)
                    {
                        $strength += 1;
                    }

                    /*** check if value is not all upper case ***/
                    if(strtoupper($value) == $value)
                    {
                        $strength += 1;
                    }

                    /*** check string length is 8 -15 chars ***/
                    if($length >= 8 && $length <= 15)
                    {
                        $strength += 1;
                    }

                    /*** check if lenth is 16 - 35 chars ***/
                    if($length >= 16 && $length <=35)
                    {
                        $strength += 2;
                    }

                    /*** check if length greater than 35 chars ***/
                    if($length > 35)
                    {
                        $strength += 3;
                    }

                    /*** get the numbers in the password ***/
                    preg_match_all('/[0-9]/', $value, $numbers);
                    $strength += count($numbers[0]);

                    /*** check for special chars ***/
                    preg_match_all('/[|!@#$%&*\/=?,;.:\-_+~^\\\]/', $value, $specialchars);
                    $strength += sizeof($specialchars[0]);

                    /*** get the number of unique chars ***/
                    $chars = str_split($value);
                    $num_unique_chars = sizeof( array_unique($chars) );
                    $strength += $num_unique_chars * 2;

                    /*** strength is a number 1-10; ***/
                    $strength = $strength > 99 ? 99 : $strength;
                    $strength = floor($strength / 10 + 5);

                    if($strength > 5){
                        return "Passed";
                    }else{
                        return "Weak Password";
                    }
                }else{
                    return 'No value';
                }


            });
            // check if input is on maximum charaters
            $this->addCase('max',function($value,$number){
                if(!empty($value)){
                    if($value !== ""){
                        if(strlen($value) <= $number){
                            return 'Passed';
                        }else{
                            return 'Too many Character, must only be atleast '.$number;
                        }
                    }
                }else{
                    return 'No value';
                }

            });
            // check if input is below minimun charaters
            $this->addCase('min',function($value,$number){
                if(!empty($value)){
                    if($value !== ""){
                        if(strlen($value) >= $number){
                            return 'Passed';
                        }else{
                            return 'must contain more than '.$number.' characters';
                        }
                    }
                }
                else{
                    return 'No value';
                }
            });
            // check if input is the same on the other input usually used for comparing password confirmation
            $this->addCase('sameWith',function($value,$value2){
                if(!empty($value) && !empty($value2)){
                    if ($value === $value2) {
                        return 'Passed';
                    }else {
                        return $Value2.' Mismatch';
                    }
                }
                else{
                    return 'No value';
                }
            });
            // check if Value has space
            $this->addCase('noSpace',function($value){
                if(!empty($value)){
                    if(preg_match('/\s/',$value)) {
                        return 'should not contain spaces!';
                    }else {
                        return 'Passed';
                    }
                }else{
                    return 'No value';
                }

            });
        }
    }

?>
