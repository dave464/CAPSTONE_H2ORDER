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
    <body style="background-color: white" >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <?php include 'navbar.php' ?>
      <center> 
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">Delivery Details
      </p>
       

      <div class="container">
        <?php
            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id,product.volume,orderlist.status, orderlist.order_id,orderlist.quantity,
            orderlist.total, orderlist.type, orderlist.photo,orderlist.receipt, orderlist.receipt_status,orderlist.date, 
            merchant.business_name,merchant.merchant_id,customer.firstname, customer.lastname, customer.address, 
            customer.contact_number,customer.customer_id,customer.barangay
            FROM `orderlist`
            RIGHT JOIN product ON orderlist.product_id = product.product_id
            RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
             WHERE orderlist.order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  
          ?>  
          <form action="action.php" method="POST" enctype="multipart/form-data" > 

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">

       <div class="col-md-12 col-lg-5 mb-5 mb-lg-0">
        <div class="card">
          <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
          <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
          <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0" style="font-weight: 550">
              Reference #: AS <?php echo date("mdY-", strtotime($fetch['date']))?><?php echo $fetch['order_id']?> 
            </p>
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
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Volume: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['volume']?></p>        
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
             
              <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;"></p>
               <a href="delivery_destination.php?order_id=<?php echo $fetch['order_id']?>"><input type="button" name="show" style="background-color:red; border:none;border-radius: 6px;
            box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff; color:white; height: 25px; width:100px;"
              value="show map"></a>     
             </div>

           
              <br>
               <!------------- PAYMENT DETAILS ---------------->
               <div class="d-flex justify-content-center mb-3">
              <h4 class="mb-0" style="font-weight: 550">PAYMENT DETAILS</h4>
              </div>
             <hr>
            <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight: 550">Price: </p>
              <p class="card-text">&#8369;<?php echo $fetch['price']?>.00</p>        
             </div>
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Quantity: </p>
              <p class="card-text" style="margin-top:-10px;"><?php echo $fetch['quantity']?></p>     </div> 
             <div class="d-flex justify-content-between">
              <p class="card-text" style="font-weight:550;margin-top:-10px;">Total:</p>
              <p class="card-text"style="margin-top:-10px;">&#8369;<?php echo $fetch['quantity']* $fetch['price']?>.00</p>       
             </div>
             
              <div class="d-flex justify-content-between">
                 <p class="card-text" style="font-weight:550;margin-top:-10px;">Type:</p>      
                <p class="card-text" style="margin-top:-10px;"><?php echo  strtoupper($fetch['type'])?></p>    
             </div>
              <?php 
                if($fetch['type'] == 'gcash' && $fetch['receipt_status'] == 'complete') {      
            ?>
            <div style=" border:5px solid green ;margin-top: 10px"> 
                          <img src="../photo/<?php echo $fetch['photo'] ?>"  style="width:100%;height:400px"
                          onclick="window.location='../photo/<?php echo $fetch['photo']?>'" />
                    
                    <div class = "form-group">
                        <div id = "preview" style = "width:100%; height :400px; ">
                            <img src = "../receipt/<?php echo $fetch['receipt']?>" id = "lbl" width = "100%" height = "100%"
                            onclick="window.location='../receipt/<?php echo $fetch['receipt']?>'" />
                       </div>     
                    </div>
                        </div>
            <?php
              } elseif ($fetch['type'] == 'gcash'  && $fetch['receipt_status'] == 'Complete'){
                  echo '<div style=" border:5px solid green ;margin-top: 10px">  
                          <img src="../photo/'.$fetch['photo'].'" onclick="window.location=\' ../photo/'.$fetch['photo'].' \' " style="width:100%;height:400px">
                        </div>';  
               
                }
            ?>   
            <br> <br>
          
              

         <button type="submit" name="submitDeliver" class="btn btn-primary" style="width:200px;">
         Set as Delivered</button>  

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



<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
  $(document).ready(function(){
    $pic = $('<img id = "image" width = "100%" height = "100%"/>');
    $lbl = $('<center id = "lbl">[Photo]</center>');
    $("#photo").change(function(){
      $("#lbl").remove();
      var files = !!this.files ? this.files : [];
      if(!files.length || !window.FileReader){
        $("#image").remove();
        $lbl.appendTo("#preview");
      }
      if(/^image/.test(files[0].type)){
        var reader = new FileReader();
        reader.readAsDataURL(files[0]);
        reader.onloadend = function(){
          $pic.appendTo("#preview");
          $("#image").attr("src", this.result);
        }
      }
    });
  });
</script>