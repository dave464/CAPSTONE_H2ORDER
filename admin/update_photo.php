<?php
	require_once 'connect.php';
		 if(ISSET($_POST['UpdatePhoto'])){

     $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo_name = addslashes($_FILES['photo']['name']);
        $photo_size = getimagesize($_FILES['photo']['tmp_name']);
        move_uploaded_file($_FILES['photo']['tmp_name'],"photo/" . $_FILES['photo']['name']);  

$conn->query("UPDATE `admin` SET `photo` = '$photo_name'
             WHERE `admin_id` = '".$_REQUEST['admin_id']."'") or die(mysqli_error());
  
  echo ("<script>
    alert('Photo has been updated successfully');
    document.location.href = 'profile.php';
    </script>");
  


	}	