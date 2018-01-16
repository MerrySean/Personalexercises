
<?php
	include('validator.php');

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

		// returns the fields of the form with the value
		function get_fields() {
			return $this->fields;
		}
		// check if the name of the field exist in the JSON
		function is_field($name) {
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

		function after_validate($payload){
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
		function validate($payload) {
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
		function submit($table){
			include('Database.php');

			$db = new Database([
				'host' => 'mysql:host=127.0.0.1;port=3306;dbname=Personal;',
				'user' => 'root',
				'pass' => 'merrysean',
			]);
			return $result = $db->Insert($table,$this->fields);
		}
	}

?>
