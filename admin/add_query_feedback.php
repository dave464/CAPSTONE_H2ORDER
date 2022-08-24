<?php
include "connect.php";
	if(ISSET($_POST['add_feedback'])){
		$merchant_id = $_POST['merchant_id'];
		$admin_id = $_POST['admin_id'];
		$date = $_POST['date'];
		$criteria1 = $_POST['criteria1'];
		$criteria2 = $_POST['criteria2'];
		$criteria3 = $_POST['criteria3'];
		$criteria4 = $_POST['criteria4'];
		$criteria5 = $_POST['criteria5'];
		$criteria6 = $_POST['criteria6'];
		
		
			$conn->query("INSERT INTO `feedback` (merchant_id,admin_id, date,criteria1,criteria2,criteria3,criteria4,criteria5,criteria6) VALUES( '$merchant_id','$admin_id','$date','$criteria1','$criteria2','$criteria3','$criteria4','$criteria5','$criteria6')") or die(mysqli_error());
			echo
			"<script>
			alert('Data Added Successfully');
			document.location.href = 'feedback.php';
			</script>"
			;
		
	}


	
?>