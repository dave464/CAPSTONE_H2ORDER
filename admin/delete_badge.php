<?php
	 require_once 'connect.php';
	 $conn->query("DELETE FROM `badge` WHERE `badge_id` = '$_REQUEST[badge_id]'") or die(mysqli_error());
	

	 echo ("<script>
	alert('Delete Successfully');
	document.location.href = 'badge.php';
	</script>");