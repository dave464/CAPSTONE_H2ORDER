<?php 
	session_start();
	if(!ISSET($_SESSION['deliveryman_id'])){
		header("location:index.php");
	}