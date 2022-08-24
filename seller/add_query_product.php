<?php
require '../connection.php';
	if(ISSET($_POST['submit'])){
		$merchant_id= $_POST['merchant_id'];
		$product_name = $_POST['product_name'];
		$product_type = $_POST['product_type'];
		$volume = $_POST['volume'];
		$price = $_POST['price'];
		$description= $_POST['description'];
		

		$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("INSERT INTO `product` (merchant_id,product_name,product_type,volume,description,price,image) VALUES('$merchant_id','$product_name','$product_type','$volume','$description','$price','$photo_name')") or die(mysqli_error());
		echo ("<script>
		alert('Product Added Successfully');
		document.location.href = 'product_list.php';
		</script>");
	}

	
	if(ISSET($_POST['Update'])){
		
		$product_name = $_POST['product_name'];
		$product_type = $_POST['product_type'];
		$volume = $_POST['volume'];
		$price = $_POST['price'];
		$description= $_POST['description'];
		

		$conn->query("UPDATE `product` SET `product_name` = '$product_name', `product_type` = '$product_type', `volume` = '$volume', `price` = '$price', `description` = '$description'
     	WHERE `product_id` = '".$_REQUEST['product_id']."'") or die(mysqli_error());

		echo ("<script>
		alert('Product Updated Successfully');
		document.location.href = 'product_list.php';
		</script>");
	}
?>