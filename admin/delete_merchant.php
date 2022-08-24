<?php
	 require_once 'connect.php';
	 $conn->query("DELETE FROM `merchant` WHERE `merchant_id` = '$_REQUEST[merchant_id]'") or die(mysqli_error());
	echo ("<script>
	alert('Delete Successfully');
	document.location.href = 'pending_merchant_list.php';
	</script>");