<?php
require '../connection.php';
	if(ISSET($_POST['submit'])){

		$username= $_POST['username'];
		$password= $_POST['password'];
		$c_password= $_POST['c_password'];
		$firstname= $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$barangay = $_POST['barangay'];
		$email = $_POST['email'];
		$contact_number= $_POST['contact_number'];
		$c_latitude = $_POST['c_latitude'];
		$c_longitude = $_POST['c_longitude'];
		
		$user_data = 'username='. $username. '&firstname='. $firstname. '&lastname='. $lastname. '&address='. $address. '&email='. $email. '&contact_number='. $contact_number;

	if($password !== $c_password){
	    echo ("<script>
			alert('The confirmation password  does not match');
			document.location.href = 'customer_sign.php?error=The confirmation password  does not match&$user_data';
			</script>");
	}

	else{

		$sql = "SELECT * FROM customer WHERE username='$username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
	         echo ("<script>
			alert('The username is taken try another');
			document.location.href = 'customer_sign.php?error=The username is taken try another&$user_data';
			</script>");
		}else{

		$conn->query("INSERT INTO `customer`(username, password, firstname, lastname, address, barangay, email,contact_number,c_latitude,c_longitude) VALUES('$username','$password','$firstname','$lastname','$address', '$barangay', '$email','$contact_number','$c_latitude','$c_longitude')") or die(mysqli_error());
		
		echo ("<script>
			alert('Your account has been created successfully');
			document.location.href = 'index.php';
			</script>");
		}
	}
}
?>