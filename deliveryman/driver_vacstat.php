<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delivery Man Vacination Status</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>

    <body style="background-color: white">
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
 
?>
  <form action="action.php" method="POST" enctype="multipart/form-data" >  
  <div >  
      <input type="hidden"  name="product_id">
      
    <tr id="tr2">
      <!-- <th class="align-middle" scope="row">1</th> -->
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
      <td class="align-middle"></td>
     

    </tr>
    </div>
  </form>
<?php
       
    ?>
      </tbody>
</table>

</div>

</div>

    </body>
</html>


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
  background:linear-gradient(to bottom,  #2196F3 5%, #0d6edf 100%);
  border-radius:6px;
  display:inline-block;
  cursor:pointer;
  color:#fff;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  border-color: #0d6edf;
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