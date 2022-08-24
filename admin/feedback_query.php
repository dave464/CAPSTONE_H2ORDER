<?php
	require_once 'connect.php';
	if(ISSET($_POST['back']) ){
		$critea_1 = $_POST['critea_1'];
	
		
		$conn->query("UPDATE `feedback` SET `critea_1` = '$critea_1' WHERE `feedback_id` = '$_REQUEST[feedback_id]'") or die(mysqli_error());
		echo
		"<script>
		
		document.location.href = 'feedback.php';
		</script>"
		;
	}	