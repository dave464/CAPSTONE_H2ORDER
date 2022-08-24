<?php
require 'validate.php';
require '../connection.php';
	if(ISSET($_POST['submit'])){


		$customer_id= $_POST['customer_id'];
		$product_id = $_POST['product_id'];
		$number_of_items = $_POST['number_of_items'];

        if($number_of_items) {
            $result = $conn->query("SELECT `cart_id` FROM `cart` WHERE `product_id` = '$product_id' && `customer_id` = '".$_SESSION['customer_id']."'") or die(mysqli_error());
            $count = mysqli_num_rows($result);

            
            if($count == 0) {
                $conn->query("INSERT INTO `cart`(customer_id, product_id, number_of_items) VALUES('$customer_id','$product_id','$number_of_items')") or die(mysqli_error());
                echo ("<script>
                alert('Added to cart');
                document.location.href = 'cart.php';
                </script>");
            }
            if($count > 0) {
                $conn->query("UPDATE `cart` SET `number_of_items` = $number_of_items WHERE `product_id`= $product_id  && `customer_id` = '".$_SESSION['customer_id']."'" ) or die(mysqli_error());
                echo ("<script>
                 alert('Added to cart');
                document.location.href = 'cart.php';
                </script>");
            }

}
echo ("<script>
window.history.back()
</script>");


	}
?>