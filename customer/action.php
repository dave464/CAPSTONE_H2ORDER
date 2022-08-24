<?php
require 'validate.php';
require '../connection.php';
	if(ISSET($_POST['submitRemove'])){
		$product_id= $_POST['product_id'];
		$cart_id = $_POST['cart_id'];

        $conn->query("DELETE FROM `cart` WHERE `product_id`= $product_id  && `customer_id` = '".$_SESSION['customer_id']."'") or die(mysqli_error());
        echo ("<script>
        alert('Removed to cart');
        document.location.href = 'cart.php';
        </script>");

	}

    if(ISSET($_POST['submitPurchase'])){
		$product_id= $_POST['product_id'];
		$customer_id = $_POST['customer_id'];
        $merchant_id = $_POST['merchant_id'];
        $quantity = $_POST['quantity'];
        $total = $_POST['total'];
        $type = $_POST['type'];
        $receipt = $_POST['receipt'];
         $timezone = date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s', time());

        // echo ("<script>
        // alert('$product_id');
        // </script>");


        if($_FILES) {
        $image = addslashes(file_get_contents($_FILES['photos']['tmp_name']));
		$photo_name = addslashes($_FILES['photos']['name']);
		$photo_size = getimagesize($_FILES['photos']['tmp_name']);
		move_uploaded_file($_FILES['photos']['tmp_name'],"../photo/" . $_FILES['photos']['name']);

        $conn->query("INSERT INTO `orderlist`(customer_id, product_id, merchant_id, status, quantity, total,type, photo,receipt,date) 
        VALUES('$customer_id','$product_id','$merchant_id','pending','$quantity','$total','$type','$photo_name','$receipt','$datetime' )") 
        or die(mysqli_error());

        } else {
            $conn->query("INSERT INTO `orderlist`(customer_id, product_id, merchant_id, status, quantity, total,type,date) 
            VALUES('$customer_id','$product_id','$merchant_id','pending','$quantity','$total','$type','$datetime')") 
            or die(mysqli_error());
        }

        $conn->query("DELETE FROM `cart` WHERE `product_id`= $product_id  && `customer_id` = '".$_SESSION['customer_id']."'") or die(mysqli_error());
        echo ("<script>
        alert('Successfully Purchased');
        document.location.href = 'purchase.php';
        </script>");

	}


    /*===== PRODUCT RATE ===== */

    if(ISSET($_POST['submitRate'])){
          
        $order_id= $_POST['order_id'];
        $product_id= $_POST['product_id'];
         $customer_id = $_POST['customer_id'];
         $merchant_id = $_POST['merchant_id'];
         $rating = $_POST['rating'];
         $comment = $_POST['comment'];
         $w_facemask = $_POST['w_facemask'];
         $c_uniform = $_POST['c_uniform'];
         $on_time = $_POST['on_time'];
         

         $conn->query("INSERT INTO `product_rating` (customer_id, product_id, merchant_id,rating,comment,w_facemask,c_uniform,on_time) VALUES ('$customer_id','$product_id','$merchant_id','$rating','$comment','$w_facemask','$c_uniform','$on_time')") or die(mysqli_error());


        $conn->query("UPDATE `orderlist` SET `status` = 'rated' WHERE `order_id`= $order_id  && `customer_id` = '".$_SESSION['customer_id']."'" ) or die(mysqli_error());


         echo ("<script>
         alert('You Have Successfully Rate This Product');
         document.location.href = 'received_orders.php';
         </script>");
 
     }




    if(ISSET($_POST['submitReceipt'])){
          
        $order_id= $_POST['order_id'];
        $product_id= $_POST['product_id'];
         $customer_id = $_POST['customer_id'];
         $merchant_id = $_POST['merchant_id'];
      
         

        $receipt = addslashes(file_get_contents($_FILES['receipt']['tmp_name']));
        $photo_name = addslashes($_FILES['receipt']['name']);
        $photo_size = getimagesize($_FILES['receipt']['tmp_name']);
        move_uploaded_file($_FILES['receipt']['tmp_name'],"../receipt/" . $_FILES['receipt']['name']);  

        $conn->query("UPDATE `orderlist` SET `receipt` = '$photo_name' WHERE `order_id`= $order_id  && `customer_id` = '".$_SESSION['customer_id']."'" ) or die(mysqli_error());


         echo ("<script>
         alert('Payment Updated Successfully');
         document.location.href = 'purchase.php';
         </script>");
 
     }



    

?>