<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Accepted</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
    </head>

    <body style="background-color: white" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
      <center>
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;"> ACCEPTED ORDERS
      </p>
  
   
  <div class="container" >  
  <div class="table-responsive">

  <table class="table">
  <thead>
    <tr id="tr">
      <th scope="col" scope="col"><input type='checkbox' id='checkAll' > All </th>
      <th scope="col" ></th>
      <th scope="col"></th>
      
    </tr>
  </thead> 
  <tbody>
<?php
 $queryy = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
      product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,merchant.business_name,merchant.merchant_id,
      orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay
      FROM orderlist 
      RIGHT JOIN product ON orderlist.product_id = product.product_id 
      RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
      RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
      WHERE orderlist.status = 'accepted' && orderlist.merchant_id = '".$_SESSION['merchant_id']."' 
      ") or die(mysqli_error());
      while($fetch = $queryy->fetch_array()){
?>
  <form action="action.php" method="POST" enctype="multipart/form-data" > 
         <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">


      <tr id="tr2">
       <td class="align-middle"> <input type="checkbox" name="check[]" value="<?php echo $fetch['order_id']?>"></td> 
      <td > <img src = "../photo/<?php echo $fetch['image']?>" style="width:200px;height:200px;" /> </td>
      <td class="align-middle">
        <div>
                      
                      <p style="font-size:14px;margin-top:10px;">Address: <?php echo $fetch['address']?>
                      <?php echo $fetch['barangay']?> Nasugbu,Batangas<p>
                      <p style="font-size:14px;margin-top:-18px;">Product Name: <?php echo $fetch['product_name']?><p>
                      <p style="font-size:14px;margin-top:-18px;">Price:  &#8369;<?php echo $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Quantity: <?php echo $fetch['quantity']?><p>
                     <p style="font-size:14px;margin-top:-18px;">Total: &#8369;<?php echo $fetch['quantity']* $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Status:  <?php echo  strtoupper($fetch['status'])?><p>
                      <p style="font-size:14px;margin-top:-18px;">Reference #: AS <?php echo date("mdY-", strtotime($fetch['date']))?><?php echo $fetch['order_id']?> <p>
                     <a onclick="window.location='accepted_order_details.php?order_id=<?php echo $fetch['order_id']?>'" class="myButton" style="color:#fff;">More Details</a>
                    </div>

                      <p style="font-size:14px;">Select Driver<p>
                     <div class="select-container" style="margin-top:-10px">
                          <select class="form-select form-select-sm" name="deliveryman" aria-label="Default select example" id="sel">
                          <?php
                                $query = $conn->query("SELECT * FROM deliveryman 
                                WHERE status = 'available' && deliveryman.merchant_id = '".$fetch['merchant_id']."' ") 
                                or die(mysqli_error());

                               $count = mysqli_num_rows($query); 

                               if ($count > 0) {
                                  while($fetch = $query->fetch_array()){
                              ?>
                                  <option value="<?php echo $fetch['deliveryman_id']?>" name="name"><?php echo ($fetch['name'])?>
                                    
                                  </option>
                              <?php
                                }

                               }else{
                                echo '<option value="" name="name">No Deliveryman Available</option>';
                               }

                               
                              ?>
                          </select>
          </div>
      </td>
     
            <td class="align-middle"> 
       
      </td>  

    </tr>




<?php
       }
    ?>
  <button name="DISPATCH" class="myButton">Dispatch</button>   
</form>
          </tbody>
</table>

</div>
</div> 



<script type="text/javascript">
            $(document).ready(function(){
                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="check[]"]').prop('checked',true);
                    }else{
                        $('input[name="check[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });
                // Checkbox click
                $('input[name="check[]"]').click(function(){
                    var total_checkboxes = $('input[name="check[]"]').length;
                    var total_checkboxes_checked = $('input[name="check[]"]:checked').length;
 
                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>
 




<!--------- SECTION Start-------
<section >
  <div class="container py-5">
    <div class="row">

 
 <?php
      $queryy = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
      product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
      orderlist.date, customer.firstname, customer.lastname, customer.customer_id
      FROM orderlist 
      RIGHT JOIN product ON orderlist.product_id = product.product_id 
      RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
      WHERE orderlist.status = 'accepted' && orderlist.merchant_id = '".$_SESSION['merchant_id']."' 
      ") or die(mysqli_error());
      while($fetch = $queryy->fetch_array()){

        
?>
<form action="action.php" method="POST" enctype="multipart/form-data" > 
          <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">

    
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
           <div class="d-flex flex-row comment-user">
              <img class="rounded" src = "../img/user.png" width="30" height="30" style="margin-left:20px; margin-top: 10px">
                <h5 style="font-weight: 550;margin-top: 15px; margin-left:2px" >
                   &nbsp<?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?>
               </h5>     
            </div>     
          <img src = "../photo/<?php echo $fetch['image']?>" style="width: 200px;height: 200px; margin-bottom: 5px;" />          
            
             <div>
                <table>
                  <tr> 
                  <td valign="top" style="padding-left:20px;"> 
                    <div style=" margin-top:-200px; margin-left: 150px;">
                  
                      <p style="font-size:14px;margin-top:10px;">Product Name: <?php echo $fetch['product_name']?><p>
                      <p style="font-size:14px;margin-top:-18px;">Price:  &#8369;<?php echo $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Quantity: <?php echo $fetch['quantity']?><p>
                     <p style="font-size:14px;margin-top:-18px;">Total: &#8369;<?php echo $fetch['quantity']* $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Status:  <?php echo  strtoupper($fetch['status'])?><p>
                      <p style="font-size:14px;margin-top:-18px;">Reference #: AS <?php echo date("mdY-", strtotime($fetch['date']))?><?php echo $fetch['order_id']?> <p>
                     <a onclick="window.location='accepted_order_details.php?order_id=<?php echo $fetch['order_id']?>'" class="myButton" style="color:#fff;margin:5px;">More Details</a>
                    </div>

                 </td>
                </tr> 
              </table>
                   <div class="select-container">
                          <select class="form-select form-select-sm" name="deliveryman" aria-label="Default select example" id="sel">
                          <?php
                                $query = $conn->query("SELECT * FROM deliveryman 
                                WHERE deliveryman.merchant_id = '".$fetch['merchant_id']."'") 
                                or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                              ?>
                            
                                  <option value="<?php echo $fetch['deliveryman_id']?>" name="name"><?php echo ($fetch['name'])?></option>
                              <?php
                                }
                              ?>
                          </select>
          </div>

          </div>
        </div><br>
      </div>
  
   </>
<?php
    }
  ?> 


        </div>
         <button type="submit" name="submitDispatch" class="btn btn-primary">Dispatched</button>
       </form>
      </div>
</section>
------- SECTION END-------->

    

    </body>
</html>

<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
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
/*h5 {
  width: 150px;
  color:#000;
  padding:20px 0px;
}*/
.myButton:active {
  position:relative;
  top:1px;
}
</style>



<style>

  td{
    //font-size: 10px;
    white-space: nowrap;
  }
  th {
    //font-size: 10px;
    white-space: nowrap;
  }
.select-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
  .list {
    display: flex; 
    width: 100%;
    border:2px solid #000;
  }
  label {
    font-size: 12px;
  }




</style>