
<?php
	include('validator.php');
	include('Database.php');

	class form {

		protected $validation;
		public $fields = [];
		public $validation_errors = [];
		public $wasSubmitted = false;

		// payload is the input fields of an object
		// payload2 is the value of the fields
		function __construct($payload){
			// sets keys to the fields
			$this->fields = $payload;

			// Instantiate Validator
			$this->validation = new validator;

			// this is important to create the Main Cases for validation without this validation won't work
			$this->validation->createMainCases();
		}
		public function set_submitted($Submitted){
			$this->wasSubmitted = $Submitted;
		}

		public function get_field($field){
			if(array_key_exists($field,$this->fields)){
				return $this->fields[$field];
			}else{
				return false;
			}
		}
		public function set_a_field($field, $newValue){
			if(array_key_exists($field,$this->fields)){
				$this->fields[$field] = $newValue;
			}else{
				return false;
			}
		}

		// returns the fields of the form with the value
		function get_fields() {
			return $this->fields;
		}
		// check if the name of the field exist in the JSON
		private function is_field($name) {
			$exist = false;
			foreach ($this->fields as $key => $value) {
				if ($name === $key) {
					$exist = true;
					return $exist;
				}
			}
			if(!$exist){
				return $exist;
			}
		}

		private function after_validate($payload){
			foreach ($payload as $key => $value) {
				foreach ($value as $key2 => $value2) {
					if($value2 == "Passed"){
						unset($payload[$key][$key2]);
					}
				}
			}
			$this->validation_errors = $payload;
		}

		/*
		 validate form
		 payload is how the form-input should be validated
		 sample payload \/

			[
				'firstname' => ['require','+max-20'],
				'lastname'  => ['require','+max-20'],
				'age'		=> ['require','legal']
			]
				" + " --> in the max is important, this is a way to tell the program that you are passing a validation
						  with a dynamic value

				" - " --> don't forget this, this is a way to tell the program that the next strings are the dynamic
				          value that you passed in the validation
		*/
		public function validate($payload) {
			// push an array to $Result if there are errors
			# true = No error;
			# false = Has error;
			$Result = true;
			/*
				iterate in the array
					key   = field
					value = list on how to validate the field (also an array)
			*/
			foreach ($payload as $key => $value) {
				/*
					iterate in the array
						key2   = index
						value2 = how to validate field
				*/
				foreach ($value as $key2 => $value2) {
					// if it is max or min validation or anything that has a dynamic value in it
					if(substr($value2, 0,1) == "+")
					{
						/*
							extract the validation from what and how much
							example-1 validation +max-20
							returns ['max' => 20]
							example-2 validation +samewith-pass
						 	returns ['samewith' => pass]
						*/
						$output = $this->validation->dynamic_extract($value2);

						foreach ($output as $key3 => $value4) {
							// key3 is the validation name like max/min/samewith
							// $this->fields[$key] is the value of the field
							// value4 is the number/string to be measured or compared to the value of the field

							// if value4 is a numeric value
							if(is_numeric($value4)){
								$payload[$key][$key2] = $this->validation->psuedoSwitch($key3, [$this->fields[$key],$value4]);
								// if($payload[$key][$key2] === "Passed"){
								// 	$Result = true;
								// }

							}
							// if value4 is not numeric just like 'pass'
							else if($this->is_field($value4)){
								$payload[$key][$key2] = $this->validation->psuedoSwitch($key3, [$this->fields[$key],$this->fields[$value4]]);
							}
							// if value4 is has 2 values
							else if(strpos($value4,'>')){
								$payload[$key][$key2] = $this->validation->psuedoSwitch($key3, [$this->fields[$key],$value4]);
							}
						}
					}
					else {
						$payload[$key][$key2] = $this->validation->psuedoSwitch($value2, $this->fields[$key]);
					}
				}
			}

			$this->after_validate($payload);
		}
		// end of validation

		// Submit Form to database
		public function submit($table){
			if ($this->has_no_errors()) {
				$db = new Database();
				return $result = $db->Insert($table,$this->fields);
			}else{
				return false;
			}
		}

		// Update Existing Product in Database
		public function update($table,$col,$new,$old){
			if ($this->has_no_errors()) {
				$db = new Database();
				return $result = $db->updateOne($table,$col,$new,$old);
			}else{
				return false;
			}
		}

		private function has_no_errors(){
			foreach ($this->validation_errors as $key => $value) {
				if(!empty($value)){
					return false;
				}
			}
			return true;
		}

		public function encrypt($p,$key){
			// create cipher key by what everything is inside the form
			$first  = hash('sha256',$key);
			// Hash the first Hashed (maybe this would increase security, But i do not know, just doing this for what I think is good)
			$key 		= hash('ripemd320',$first);
			$last   = substr($key,6);
			return $last;
		}
	}

?>
