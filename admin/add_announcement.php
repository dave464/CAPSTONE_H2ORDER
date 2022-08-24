<?php
include "connect.php";
	if(ISSET($_POST['announcement'])){
		$admin_id = $_POST['admin_id'];
		$message= $_POST['message'];
				
			$conn->query("INSERT INTO `announcement` (admin_id,message) VALUES('$admin_id','$message')") or die(mysqli_error());
			echo
			"<script>
			alert('Message Send Successfully');
			document.location.href = 'announcement.php';
			</script>"
			;
		
	}
?>