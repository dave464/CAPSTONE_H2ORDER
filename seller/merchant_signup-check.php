<?php
require '../connection.php';
	if(ISSET($_POST['submit'])){

		$username= $_POST['username'];
		$password= $_POST['password'];
		$c_password= $_POST['c_password'];
		$business_name= $_POST['business_name'];
		$owner = $_POST['owner'];
		$address = $_POST['address'];
		$barangay = $_POST['barangay'];		
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$email = $_POST['email'];
		$contact_number= $_POST['contact_number'];
		$opening=  $_POST['opening'];
		$closing=  $_POST['closing'];

		$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);

		$user_data = 'username='. $username. '&business_name='. $business_name. '&owner='. $owner. '&address='. $address. '&email='. $email. '&contact_number='. $contact_number. '&opening='. $opening. '&closing='. $closing;

	if($password !== $c_password){
	    echo ("<script>
			alert('The confirmation password  does not match');
			document.location.href = 'merchant_signup.php?error=The confirmation password  does not match&$user_data';
			</script>");
	}

	else{

		$sql = "SELECT * FROM merchant WHERE username='$username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
	         echo ("<script>
			alert('The username is taken try another');
			document.location.href = 'merchant_signup.php?error=The username is taken try another&$user_data';
			</script>");
		}else{

		$conn->query("INSERT INTO `merchant`(username, password, business_name, owner, address,barangay, latitude, longitude, email, contact_number, image ,opening, closing, status) VALUES('$username','$password','$business_name','$owner','$address', '$barangay' ,'$latitude',
			'$longitude','$email','$contact_number','$photo_name','$opening','$closing','pending')") or die(mysqli_error());
		
		echo ("<script>
			alert('Your account has been created successfully');
			document.location.href = 'index.php';
			</script>");
		}
	}

	/*$conn->query("INSERT INTO `merchant`(username, password, business_name, owner, address, email,contact_number,image) VALUES('$username','$password','$business_name','$owner','$address','$email','$contact_number','$photo_name')") or die(mysqli_error());
		
		echo ("<script>
			alert('Your account has been created successfully');
			document.location.href = 'index.php';
			</script>"); */
}
?>