<?php
include '../connection.php';

	if(ISSET ($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = $conn->query("SELECT * FROM `merchant` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		
		if($row > 0){
			session_start();
			$_SESSION['merchant_id'] = $fetch['merchant_id'];
			header('location:home.php');
		}else{

		echo ("<script>
			alert('Invalid username or password');
			document.location.href = 'index.php';
			</script>");
			

		}
	}
?>