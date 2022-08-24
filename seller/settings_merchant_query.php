<?php
require '../connection.php';
	if(ISSET($_POST['editProfile'])){

		$username= $_POST['username'];
		$business_name= $_POST['business_name'];
		$owner = $_POST['owner'];
		$address = $_POST['address'];
		$barangay=$_POST['barangay'];
		$email = $_POST['email'];
		$contact_number= $_POST['contact_number'];
		

	$conn->query("UPDATE `merchant` SET `username` = '$username', `business_name` = '$business_name', `owner` = '$owner', `address` = '$address', `barangay` = '$barangay', `email` = '$email', `contact_number` = '$contact_number'
     WHERE `merchant_id` = '".$_REQUEST['merchant_id']."'") or die(mysqli_error());
		
		echo ("<script>
			alert('Your Personal Information has been Update successfully');
			document.location.href = 'settings.php';
			</script>");
	}



/*=========== Update Pin Location =========== */
	if(ISSET($_POST['Uplocation'])){

		$lat= $_POST['lat'];
		$long= $_POST['long'];
		
		

	$conn->query("UPDATE `merchant` SET `latitude` = '$lat', `longitude` = '$long'
     WHERE `merchant_id` = '".$_REQUEST['merchant_id']."'") or die(mysqli_error());
		
		echo ("<script>
			alert('Your Pin Location has been Update successfully');
			document.location.href = 'settings.php';
			</script>");
	}



?>