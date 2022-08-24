<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_account']) ){
		$name = $_POST['name'];
		$username = $_POST['username'];
		
		
		

		$conn->query("UPDATE `admin` SET `name` = '$name', `username` = '$username' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
		echo
		"<script>
		alert('Data Updated Successfully');
		document.location.href = 'profile.php';
		</script>"
		;
	}	