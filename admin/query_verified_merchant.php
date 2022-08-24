<?php
	require_once 'connect.php';
	
		

		$conn->query("UPDATE `merchant` SET `status` = 'approved' WHERE `merchant_id` = '$_REQUEST[merchant_id]'") or die(mysqli_error());
		echo
		"<script>
		alert('Approved');
		document.location.href = 'pending_merchant_list.php';
		</script>"
		;
		