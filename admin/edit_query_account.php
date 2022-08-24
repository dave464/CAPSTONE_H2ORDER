<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_account']) ){
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);

		$conn->query("UPDATE `admin` SET `name` = '$name', `username` = '$username', `password` = '$password', `photo` = '$photo_name' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
		echo
		"<script>
		alert('Data Updated Successfully');
		document.location.href = 'account.php';
		</script>"
		;
	}	