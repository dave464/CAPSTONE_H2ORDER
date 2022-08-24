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
    <body style="background-color: white"  >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <?php include 'navbar.php' ?>
      <center> 
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">Transaction Details
      </p>
       <!-- <div class="container">
        <?php
            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id, merchant.business_name,merchant.merchant_id
            ,customer.firstname, customer.lastname, customer.address, customer.contact_number,customer.customer_id,
            transactions.quantity, transactions.total, transactions.date, transactions.transaction_id,
            deliveryman.name, deliveryman.plate_number, deliveryman.contact_number
             FROM `transactions`
            RIGHT JOIN product ON transactions.product_id = product.product_id
            RIGHT JOIN merchant ON transactions.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON transactions.customer_id = customer.customer_id
            RIGHT JOIN deliveryman ON transactions.deliveryman_id = deliveryman.deliveryman_id
             WHERE transactions.transaction_id = '".$_REQUEST['transaction_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  
          ?>  
          <form action="action.php" method="POST" enctype="multipart/form-data" > 

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">


      <div class="card" style="width: 30rem; max-width: 100%">
            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">

        <div class="card-body">
            <h5 class="card-title fw-bold">PRODUCT DETAILS</h5>
            <p class="card-text">Product: <?php echo strtoupper($fetch['product_name'])?> </p>
            <p class="card-text">Seller: <?php echo strtoupper($fetch['business_name'])?> </p>
            <p class="card-text">Date Ordered: <?php echo $fetch['date']?> </p>



            <h5 class="card-title fw-bold">CUSTOMER DETAILS</h5>
            <p class="card-text">Name: <?php echo strtoupper($fetch['firstname'])?> </p>
            <p class="card-text">Address: <?php echo $fetch['address']?></p>
            <p class="card-text">Contact: <?php echo $fetch['contact_number']?></p>

            <h5 class="card-title fw-bold">Payment Details</h5>
            <p class="card-text">Unit Price: &#8369; <?php echo $fetch['price']?>.00</p>
            <p class="card-text">Quantity: <?php echo $fetch['quantity']?> pcs</p>
            <p class="card-text">Total: &#8369; <?php echo $fetch['total']?>.00</p>

            <h5 class="card-title fw-bold">Driver Details</h5>
            <p class="card-text">Name: <?php echo $fetch['name']?></p>
            <p class="card-text">Contact: <?php echo $fetch['contact_number']?></p>
            <p class="card-text">Plate #: <?php echo $fetch['plate_number']?></p>


        </div>
        </div>
        
            </form>
        <?php
        }
        ?>

 </div>-->

 <div class="container">
        <?php
             $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id, merchant.business_name,merchant.merchant_id
            ,customer.firstname, customer.lastname, customer.address, customer.contact_number,customer.customer_id,customer.barangay,
            transactions.quantity, transactions.total, transactions.date, transactions.transaction_id,
            deliveryman.name, deliveryman.plate_number, deliveryman.contact_number, deliveryman.vaccination_status
            FROM `transactions`
            RIGHT JOIN product ON transactions.product_id = product.product_id
            RIGHT JOIN merchant ON transactions.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON transactions.customer_id = customer.customer_id
            RIGHT JOIN deliveryman ON transactions.deliveryman_id = deliveryman.deliveryman_id
             WHERE transactions.transaction_id = '".$_REQUEST['transaction_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){   
          ?>  
          <form action="action.php" method="POST" enctype="multipart/form-data" > 

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            

       <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
        <div class="card">
                       <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
              <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">

            <div class="d-flex justify-content-between p-3">
         
            </div>
          
            <center><img src = "../photo/<?php echo $fetch['image']?>" style="width: 300px;
            height: 300px; margin-bottom: 5px;" class="card-img-top"/></center> 
          
           <div class="card-body">
             <!------------- PRODUCT DETAILS ---------------->
             <div class="d-flex justify-content-center mb-3">
              <h4 class="mb-0" style="font-weight:550">PRODUCT DETAILS</h4>
              </div>
             <hr>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight: 550">Product Name: </p>
              <p class="card-text"><?php echo $fetch['product_name']?></p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Product Type: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['product_type']?></p>        
             </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Seller: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['business_name']?></p>        
             </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Date Ordered:</p>
              <p class="card-text"style="margin-top:-10px;"><?php echo $fetch['date']?> </p>       
             </div>
                <br>
               <!------------- CUSTOMER DETAILS ---------------->
               <div class="d-flex justify-content-center mb-3">
              <h4 class="mb-0" style="font-weight: 550">CUSTOMER DETAILS</h4>
              </div>
             <hr>
            <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight: 550">Name: </p>
              <p class="card-text"><?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?></p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Address: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['address']?>
               <?php echo $fetch['barangay']?> Nasugbu,Batangas</p>        
             </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Contact:</p>
              <p class="card-text"style="margin-top:-10px;"><?php echo $fetch['contact_number']?> </p>       
             </div>
              <br>
               <!------------- PAYMENT DETAILS ---------------->
               <div class="d-flex justify-content-center mb-3">
              <h4 class="mb-0" style="font-weight: 550">PAYMENT DETAILS</h4>
              </div>
             <hr>
            <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight: 550">Price: </p>
              <p class="card-text">&#8369; <?php echo $fetch['price']?>.00</p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Quantity: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['quantity']?></p>     </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Total:</p>
              <p class="card-text"style="margin-top:-10px;">&#8369; <?php echo $fetch['quantity']* $fetch['price']?>.00</p>       
             </div>
              
            <br>
            <!------------- DELIVERYMAN DETAILS ---------------->
               <div class="d-flex justify-content-center mb-3">
              <h4 class="mb-0" style="font-weight: 550">DELIVERYMAN DETAILS</h4>
              </div>
              
             <hr>
            <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight: 550">Name: </p>
              <p class="card-text"><?php echo $fetch['name']?></p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Vaccination Status: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['vaccination_status']?></p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Plate Number: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['plate_number']?></p>        
             </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Contact:</p>
              <p class="card-text"style="margin-top:-10px;"><?php echo $fetch['contact_number']?> </p>       
             </div>
            
           

            
           
          </div>
        </div>
      </div>
        
            </form>
        <?php
        }
        ?>

      </div>


    </body>
</html>



<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}
</style>