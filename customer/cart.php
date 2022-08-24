<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>

    <body   >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <center>
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">CART
      </p>

  <div class="container" >
  <div class="table-responsive">

  <table class="table">
  <thead>
    <tr id="tr">
      <!-- <th  scope="col">#</th> -->
      <th class="col" scope="col">Product Name</th>
      <th scope="col">Seller</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <!-- <th id="seltype" scope="col">Payment Type</th> -->
      <!-- <th scope="col">Gcash Payment</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
<?php
  $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, cart.cart_id,cart.number_of_items,cart.product_id, merchant.business_name FROM cart
  RIGHT JOIN product ON cart.product_id = product.product_id
  RIGHT JOIN merchant ON product.merchant_id = merchant.merchant_id
  WHERE product.product_id = cart.product_id && cart.customer_id = '".$_SESSION['customer_id']."'
  ")
  or die(mysqli_error());
  while($fetch = $query->fetch_array()){
?>
  <form action="action.php" method="POST" enctype="multipart/form-data" >  
  <div >  
      <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
      <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
      <input type="hidden" value="<?php echo $fetch['cart_id']?>" name="cart_id">
      <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
      <input type="hidden" value="<?php echo $fetch['number_of_items']?>" name="quantity">
      <input type="hidden" value="<?php echo $fetch['number_of_items'] * $fetch['price']?>" name="total">
    <tr id="tr2">
      <!-- <th class="align-middle" scope="row">1</th> -->
      <td class="align-middle"><?php echo strtoupper($fetch['product_name'])?></td>
      <td class="align-middle"><?php echo strtoupper($fetch['business_name'])?></td>
      <td class="align-middle"> &#8369;<?php echo $fetch['price']?></td>
      <td class="align-middle"><?php echo $fetch['number_of_items']?></td>
      <td class="align-middle">&#8369; <?php echo $fetch['number_of_items'] * $fetch['price']?></td>
      <!-- <td class="align-middle" id="tdsel">
        <select  class="form-select form-select-sm" name="type" aria-label="Default select example" id="sel">
          <option value="cod" >COD</option>
          <option value="gcash" >Gcash</option>
        </select>
      </td> -->
      <!-- <td class="align-middle"><input type="file" name="photoss" class="file" required></td> -->
      <td class="align-middle">
          <!-- <button type="submit" name="submitPurchase"  class="myButton" style="color:#000;margin:5px;">Purchase</button> -->
          <a onclick="window.location='payment.php?cart_id=<?php echo $fetch['cart_id']?>'" class="myButton" style="color:#fff;margin:5px;">
            Checkout
          </a>
          <button type="submit" name="submitRemove"  class="myButton" style="color:#fff;margin:5px;">
            <i class="fas fa-trash-alt fa-sm fa-fw"></i>
          </button>
      </td>

    </tr>
    </div>
  </form>
<?php
       }
    ?>
      </tbody>
</table>

</div>

</div>

    </body>
</html>

<script>

// function insertAfter(referenceNode, newNode) {
//     referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
// }
// function removeElementsByClass(className){
//     const elements = document.getElementsByClassName(className);
//     while(elements.length > 0){
//         elements[0].parentNode.removeChild(elements[0]);
//     }
// }

// function selected() {
//   let select = document.getElementById('sel');
//   let tdtd = document.getElementById('tdsel');
//   let thSel = document.getElementById('seltype');
//   let tr = document.getElementById('tr');
//   let tr2 = document.getElementById('tr2');
// console.log(tr2);
//   const random = 'zYzd1f'

//   if(select.value === 'gcash') {
//     const th = document.createElement("th");

//     th.setAttribute('class',random);
//     th.innerText = "Gcash Payment";
//     insertAfter(thSel, th);

//     const td = document.createElement("td");
//     const input = document.createElement("input");
//     input.type="file";
//     input.setAttribute('name', 'photos')
//     input.required = true;

//     td.setAttribute('class',random);
//     insertAfter(tdtd, td);
//     td.appendChild(input)

//   }
//   else {  
//     removeElementsByClass(random)
//   }
// }
</script>

<style>
  .container {
    /* display: flex;
    flex-direction: column; */
    background-color:#FFF;
    /* border:12px solid #FFF;
    min-height: 500px; */
    /* width:80%;margin:5px;
    padding-bottom:10px; */

  }
  td{
    //font-size: 10px;
    white-space: nowrap;
  }
  th {
    //font-size: 10px;
    white-space: nowrap;
  }
  .list {
    display: flex;
    width: 100%;
    border:2px solid #000;
  }
  .myButton {
  box-shadow:inset 0px 1px 0px 0px #fff6af;
  background:linear-gradient(to bottom,	 #2196F3 5%, #0d6edf 100%);
  border-radius:6px;
  display:inline-block;
  cursor:pointer;
  color:#fff;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  border-color:	#0d6edf;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
}
.myButton:hover {
  background-color: $blue-500;
  background:linear-gradient(to bottom, #0d6edf 5%, #2196F3 100%);
}

h5 {
  width: 150px;
  color:#000;
  padding:20px 0px;
}

</style>