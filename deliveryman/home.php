<?php
require 'validate.php';
require '../connection.php';



$loadFun="";
if(isset($_SESSION['lat']) && isset($_SESSION['lon'])){
  $lat=$_SESSION['lat'];
  $lon=$_SESSION['lon'];
  
  $res=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,
  deliveryman.name, deliveryman.deliveryman_id as delname ,
   (
      3959 * acos (
      cos ( radians($lat) )
      * cos( radians(customer.c_latitude) )
      * cos( radians(customer.c_longitude ) - radians($lon) )
      + sin ( radians($lat) )
      * sin( radians(customer.c_latitude) )
    )
) AS distance
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' 
 
ORDER BY distance  ");



}else{
  $res=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,
  deliveryman.name, deliveryman.deliveryman_id as delname 
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' ");
  $loadFun="onload='getLocation()'";
}




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delivery List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">

                 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body style="background-color: white"  <?php echo $loadFun?>  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
      <center>
       <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">DELIVERY LIST
      </p>
<!--  <div class="container" > 
  <div class="table-responsive">

<table class="table">
<thead>
  <tr id="tr">
    
    <th class="col" scope="col">PRODUCT NAME</th>
    <th scope="col">DELIVERY MAN</th>
    <th scope="col">PRICE</th>
    <th scope="col">QUANTITY</th>
    <th scope="col">TOTAL TO PAY</th>
    <th scope="col">STATUS</th>
    <th scope="col">TYPE</th>
    <th scope="col">DATE</th>
    <th scope="col"></th>
  </tr>
</thead> 
<tbody>   
<?php
  $delquery = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id, deliveryman.name, deliveryman.deliveryman_id as delname FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' 
  ") or die(mysqli_error());
  while($fetch = $delquery->fetch_array()){
?>
    <form action="action.php" method="POST" enctype="multipart/form-data" >
    <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
      <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
      <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
      <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
      <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
      <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">
     

      <tr id="tr2">
    
      <td class="align-middle"><?php echo strtoupper($fetch['product_name'])?></td>
      <td class="align-middle"><?php echo strtoupper($fetch['name'])?></td>
      <td class="align-middle"> &#8369;<?php echo $fetch['price']?>.00</td>
      <td class="align-middle"><?php echo $fetch['quantity']?></td>
      <td class="align-middle">&#8369; <?php echo $fetch['quantity'] * $fetch['price']?>.00</td>
      <td class="align-middle"><?php echo strtoupper($fetch['status'])?></td>
      <td class="align-middle"><?php echo strtoupper($fetch['type'])?></td>
      <td class="align-middle"><?php echo $fetch['date']?></td>

      <td class="align-middle">
          <button type="submit" name="submitDeliver"  class="myButton" style="color:#000;margin:5px;">Set as Delivered</button>
      </td>

    </tr>
    </form>
<?php
       }
    ?>
              </tbody>
</table>

</div>

</div>  -->

     
 <script>
    function error(err){
      //alert(err.message);
    }
    function success(pos){
      var lat=pos.coords.latitude;
      var lon=pos.coords.longitude;
      jQuery.ajax({
        url:'#',
        data:'lat='+lat+'&lon='+lon,
        type:'post',
        success:function(result){
          window.location.href='home.php'
        }
        
      });
    }
    function getLocation(){
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(success,error);
      }else{
        
      }
    }
    </script>

<?php

if(isset($_POST['lat']) && isset($_POST['lon'])){
  $_SESSION['lat']=$_POST['lat'];
  $_SESSION['lon']=$_POST['lon'];
}
?>


<!--------- SECTION Start-------->
<section >
  <div class="container py-5">
    <div class="row">


 <?php 


$no=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,
  deliveryman.name, deliveryman.deliveryman_id as delname
  
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' 
 
 ");
$count = mysqli_num_rows($no);

if ($count > 0) {

 while($fetch=mysqli_fetch_assoc($res)){

 

  ?>

    
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
                     <p style="font-size:14px;margin-top:-18px;">Total:  &#8369;<?php echo $fetch['quantity']* $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Reference #: AS <?php echo date("mdY-", strtotime($fetch['date']))?><?php echo $fetch['order_id']?> <p>
                      <p style="font-size:14px;margin-top:-18px;">Distance: 
                          <?php 

                            $x=$fetch['distance']*1.609344;
                            $y=1000;

                           if ( $x > 1 ) {
                              echo round($x,2);
                              echo " KM";

                           }elseif ($x < 1) {
                              echo  round($x * $y,2);
                              echo " M";
                           }
                       
                       ?>

                        <p>
                     <p style="font-size:14px;margin-top:-18px;">Address: <?php echo $fetch['address']?>
                      <?php echo $fetch['barangay']?> Nasugbu,Batangas <p>   
                     <a onclick="window.location='delivery_details.php?order_id=<?php echo $fetch['order_id']?>'" class="myButton" style="color:#fff;margin:5px;">More Details</a>
                    </div>
                 </td>
                </tr> 
              </table>

          </div>
        </div><br>
      </div>
  
   
<?php
    }


     } else{
      $conn->query("UPDATE `deliveryman` SET `status` = 'available' WHERE `deliveryman_id`= '".$_SESSION['deliveryman_id']."' " ) or die(mysqli_error());
            
     }
  ?> 

        </div>
      </div>
</section>
<!--------- SECTION END-------->





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




    </body>
</html>



<!--
<style>
  * {
        color: black;
  }
  .container {

    /* display: flex;
    flex-direction: column; */
    background-color:#FFF;
    /* border:12px solid #FFF;
    min-height: 500px;
    width:80%;margin:5px;
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
.myButton {
  box-shadow:inset 0px 1px 0px 0px #fff6af;
  background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
  background-color:#ffec64;
  border-radius:6px;
  border:1px solid #ffaa22;
  display:inline-block;
  cursor:pointer;
  color:#333333;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffee66;
}
.myButton:hover {
  background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
  background-color:#ffab23;
}
h5 {
  width: 150px;
  color:#000;
  padding:20px 0px;
}
.myButton:active {
  position:relative;
  top:1px;
}
</style>