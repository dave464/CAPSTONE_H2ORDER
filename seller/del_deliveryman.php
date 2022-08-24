<?php
require '../connection.php';
	
	$conn->query("DELETE FROM `deliveryman` WHERE `deliveryman_id`= '$_REQUEST[deliveryman_id]' ") or die(mysqli_error());
	echo ("<script>
	alert('Delete Successfully');
	document.location.href = 'deliveryman.php';
	</script>");

//------------- DELETE DELIVERY MAN ----------//

?>