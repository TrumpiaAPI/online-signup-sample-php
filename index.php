<!-- This file is part of Sign-up Page Sample.

    The Sign-up Page Sample is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    The Sign-up Page Sample is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with The Sign-up Page Sample.  If not, see <http://www.gnu.org/licenses/>.  --> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<!-- Bootstrap Framework -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
	
	<title>Sign-up Page</title>

</head>
<body>
	<?php
		include "subscription.php";
	    
		// Define variables for name and error messages.
		$fNameErr = $lNameErr = $mNumberErr = "";
		$firstName = $lastName = $mobileNumber = "";
		
		//  Data validation with PHP. Check the data after a form submit(POST)
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			// First name data validation will check if it is empty and only allow alpha characters.
			if (!empty($_POST["firstName"])){
				$firstName = sanitizeInput($_POST["firstName"]);
				// Only allow letters in the name field
				if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
					$fNameErr = "Only letters allowed."; 
				}
			}
			
			// Last name data validation will check if it is empty and only allow alpha characters.
			if (!empty($_POST["lastName"])){
				$lastName = sanitizeInput($_POST["lastName"]);
				// Only allow letters in the name field
				if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
					$lNameErr = "Only letters allowed."; 
				}
			}
			
			// Mobile number data validation will check if it is a 10 digit number. No symbols such as "-", "(", ")", etc.
			if (empty($_POST["mobileNumber"])){
				$mNumberErr = "Mobile Number is required";
			} else {
				$mobileNumber = sanitizeInput($_POST["mobileNumber"]);
				
				if (!preg_match("/^\d{10}$/",$mobileNumber)) {
				$mNumberErr = "Please enter 10 digit mobile number"; 
				}
			}
			
			// Check if the mobile number field has data. If so, push the information to the main() function.
			if(!(is_null($mobileNumber) || empty($mobileNumber))) {
				main($firstName, $lastName, $mobileNumber);
			}
		}

		// Strip data of special characters and tags
		function sanitizeInput($data) {
			$data = stripslashes(strip_tags(trim($data)));
			return $data;
		}

		?>

<div class="container">
		<center>
			<h2>Example Sign-up Page</h2>		
			<p>Welcome to the sample sign-up page! Enter your information below to enter the coupon texting list!</p>
		</center>
	<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <div class="form-group">
	    <label for="firstName" class="col-sm-2 control-label">First Name</label><span class="error"><?php echo $fNameErr;?></span>
	    <div class="col-sm-10">
	      <input type="text" name="firstName" class="form-control" id="firstName" pattern="^[a-zA-Z]\S{1,30}" placeholder="First Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="lastName" class="col-sm-2 control-label">Last Name</label><span class="error"><?php echo $lNameErr;?></span>
	    <div class="col-sm-10">
	      <input type="text" name="lastName" class="form-control" id="lastName" pattern="^[a-zA-Z]+\S{1,30}" placeholder="Last Name">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="mobileNumber" class="col-sm-2 control-label">Mobile Number</label><span class="error"><?php echo $mNumberErr;?></span>
	    <div class="col-sm-10">
	      <input type="text" name="mobileNumber" class="form-control" id="mobileNumber" pattern="^\d{10}$" placeholder="5554443333" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <div class="checkbox">
	        <label>
	          <input type="checkbox" name="terms" required> I agree to the terms and conditions.
	        </label>
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
	    </div>
	 </div>
	 <center><b>Summary Terms & Conditions:</b> You may receive up to 4 message(s) per month for text alerts from Company Name.
Message and data rates may apply. Text STOP to opt out. For help, Text HELP.</center>
	</form>
</div>

</body>
</html>
