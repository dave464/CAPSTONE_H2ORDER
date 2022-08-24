<?php
	 require_once 'connect.php';
	 $conn->query("DELETE FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
	
	 echo ("<script>
	alert('Delete Successfully');
	document.location.href = 'account.php';
	</script>");