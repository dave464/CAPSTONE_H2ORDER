<?php 


include "connect.php";
	if(ISSET($_POST['add_account']) && isset($_POST['name'])){
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		 }

		

		$name =validate( $_POST['name']);
		$username = validate($_POST['username']);
		$password =validate( $_POST['password']);
		$re_pass= validate($_POST['re_password']);
		 

		$user_data = 'name='. $name. '&username='. $username;

		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		
		
			if($password !== $re_pass){
				header("Location:add_account.php?error=The confirmation password  does not match&$user_data");
				exit();
			}
		else{
			$conn->query("INSERT INTO `admin` (name, username, password, photo) VALUES('$name', '$username', '$password', '$photo_name')") or die(mysqli_error());
			echo
			"<script>
			alert('Data Added Successfully');
			document.location.href = 'account.php';
			</script>"
			;
		}
	}
?>