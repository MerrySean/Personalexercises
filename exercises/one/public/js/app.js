
var fname,lname,gender,email,uname,pass,cpass,g_male,g_fmale

fname = document.getElementsByName('fname')
lname = document.getElementsByName('lname')
email = document.getElementsByName('email')
uname = document.getElementsByName('uname')
pass = document.getElementsByName('pass')
cpass = document.getElementsByName('cpass')

// // gender var
 g_male = document.getElementById('g_male')
 g_fmale = document.getElementById('g_fmale')

var result = 
{
    "fname" : "",
    "lname" : "",
    "email" : "",
    "uname" : "",
    "pass" : "",
    "cpass" : "",
}

function submitform(){
	validate()
	var validationoutput = []
	if (result.fname !== "No Error") {
		validationoutput.push("Username")
	}
	if (result.lname !== "No Error"){
		validationoutput.push("Lastname")
	}
	if (result.email !== "No Error"){
		validationoutput.push("Email Address")
	}
	if (result.uname !== "No Error"){
		validationoutput.push("Username")
	}
	if (result.pass !== "No Error"){
		validationoutput.push("Password")
	}
	if (result.cpass !== "No Error"){
		validationoutput.push("Confirm Password")
	}

	if (validationoutput.length > 0) {
		var sumpay="";
		validationoutput.forEach(function(element){
			sumpay += element + " ,";	
		})
		alert("please input " + sumpay)
	}else{
		if (pass[0].value === cpass[0].value) {
			if (g_male.checked) {
				alert("Good Day Mr. " + fname[0].value + " " + lname[0].value + "! Your Username is: " + uname[0].value + "\nYour E-mail Address is: " + email[0].value +".\nKindly Check your email for some updates. Thank You!");
			}else if (g_fmale.checked) {
				alert("Good Day Ms. " + fname[0].value + " " + lname[0].value + "! Your Username is: " + uname[0].value + "\nYour E-mail Address is: " + email[0].value +".\nKindly Check your email for some updates. Thank You!");
			}
			else{
				alert("please enter your gender")
			}
		}
		else{
			alert("Password Mismatch")
		}
	}
}

function validate() {
    
    // check if firstname has value
    if( fname[0].value !== ""){
    	result.fname = "No Error"
    }else{
    	result.fname = ["has no value"]
    }
    // check if lastname has value
    if (lname[0].value !== ""){
        result.lname = "No Error"
    }else{
    	result.lname = ["has no value"]
    }
    // check if email has value and is email format
    if (email[0].value !== "") {
    	result.email = "No Error"
    }else{
    	result.email = ["has no value"]
    }
    // Check Username
    if (uname[0].value !== "") {
    	result.uname = "No Error"
    }else{
    	result.uname = ["has no value"]
    }
    // Check Password
    if (pass[0].value !== "") {
    	result.pass = "No Error"
    }else{
    	result.pass = ["has no value"]
    }
    if (cpass[0].value !== "") {
    	result.cpass = "No Error"
    }else{
    	result.cpass = ["has no value"]
    }

}

/*

{
    "fname" : ""
    "lname" : ""
    "email" : ""
    "uname" : ""
    "pass" : ""
    "cpass" : ""
}

*/ 
