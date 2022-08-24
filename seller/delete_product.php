<?php
	 require_once '../connection.php';
	 $conn->query("DELETE FROM `product` WHERE `product_id` = '$_REQUEST[product_id]'") or die(mysqli_error());
	echo ("<script>
	alert('Delete Successfully');
	document.location.href = 'product_list.php';
	</script>");