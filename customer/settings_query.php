<?php
require '../connection.php';
	if(ISSET($_POST['editProfile'])){

		$username= $_POST['username'];
		$firstname= $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$barangay=$_POST['barangay'];
		$email = $_POST['email'];
		$contact_number= $_POST['contact_number'];
		

	$conn->query("UPDATE `customer` SET `username` = '$username', `firstname` = '$firstname', `lastname` = '$lastname', `address` = '$address', `barangay` = '$barangay', `email` = '$email', `contact_number` = '$contact_number'
     WHERE `customer_id` = '".$_REQUEST['customer_id']."'") or die(mysqli_error());
		
		echo ("<script>
			alert('Your Personal Information has been Update successfully');
			document.location.href = 'settings.php';
			</script>");
	}


/*=========== Update Pin Location =========== */
	if(ISSET($_POST['Uplocation'])){

		$lat= $_POST['lat'];
		$long= $_POST['long'];
		
		

	$conn->query("UPDATE `customer` SET `c_latitude` = '$lat', `c_longitude` = '$long'
     WHERE `customer_id` = '".$_REQUEST['customer_id']."'") or die(mysqli_error());
		
		echo ("<script>
			alert('Your Pin Location has been Update successfully');
			document.location.href = 'settings.php';
			</script>");
	}
?>