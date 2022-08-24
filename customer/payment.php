<?php 
require 'validate.php';
require_once '../connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <?php include 'navbar.php' ?>
      <center> 
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">PAYMENT
      </p>
        <div class="container">
        <?php
            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id, cart.cart_id,cart.number_of_items,cart.product_id, merchant.business_name  FROM `cart`
            RIGHT JOIN product ON cart.product_id = product.product_id
            RIGHT JOIN merchant ON product.merchant_id = merchant.merchant_id
             WHERE cart.cart_id = '".$_REQUEST['cart_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  
          ?>  
          <form action="action.php" method="POST" enctype="multipart/form-data" > 
      <div class="card" style="width: 30rem; max-width: 100%">
            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['cart_id']?>" name="cart_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['number_of_items']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['number_of_items'] * $fetch['price']?>" name="total">
            <input type="hidden" value="fff.png" name="receipt">
        <img src="../img/pay.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title fw-bold"><?php echo strtoupper($fetch['product_name'])?> </h5>
            <p class="card-text">Price: &#8369; <?php echo $fetch['price']?>.00</p>
            <p class="card-text">Quantity: <?php echo $fetch['number_of_items']?> pcs</p>
            <p class="card-text" id="tdsel">Payment: 
                <select onchange="selected()")  class="form-select form-select-sm" name="type" aria-label="Default select example" id="sel">
                    <option value="cod" >COD</option>
                    <option value="gcash" >Gcash</option>
                </select>
            </p>
            <button type="submit" name="submitPurchase" class="btn btn-primary">Purchase</button>
        </div>
        </div>
            </form>
        <?php
        }
        ?>

 </div>
    </body>
</html>
<script>

function selected() {
  let select = document.getElementById('sel');
  let tdtd = document.getElementById('tdsel');

  const random = 'zYzd1f'

  if(select.value === 'gcash') {

    const input = document.createElement("input");
    input.type="file";
    input.setAttribute('name', 'photos')
    input.setAttribute('id', random)
    input.required = true;
    tdtd.appendChild(input)

  }
  else {  
    let aa = document.getElementById(random);
    aa.remove()
  }
}
</script>

