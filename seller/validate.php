<?php 
	session_start();
	if(!ISSET($_SESSION['merchant_id'])){
		header("location:index.php");
	}