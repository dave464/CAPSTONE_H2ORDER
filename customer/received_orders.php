<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Purchase</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="main.css"> -->
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <!-- <link rel = "icon" href = "images/logo.png" type = "image/png"> -->
    </head>

    <body  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
      <center>
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">PURCHASE
      </p>
       </center>
 <!-- <div class="container" > 
  <div class="table-responsive">

<table class="table">
<thead>
  <tr id="tr">
   
    <th class="col" scope="col">PRODUCT NAME</th>
    <th scope="col">SELLER</th>
    <th scope="col">PRICE</th>
    <th scope="col">QUANTITY</th>
    <th scope="col">TOTAL TO PAY</th>
    <th scope="col">STATUS</th>
    <th scope="col">DATE</th>
  </tr>
</thead> 
<tbody>   
<?php
  $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.date, merchant.business_name FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
  WHERE orderlist.customer_id = '".$_SESSION['customer_id']."'
  ") 
  or die(mysqli_error());
  while($fetch = $query->fetch_array()){
?>

      <tr id="tr2">
      
      <td class="align-middle"><?php echo strtoupper($fetch['product_name'])?></td>
      <td class="align-middle"><?php echo strtoupper($fetch['business_name'])?></td>
      <td class="align-middle"> &#8369;<?php echo $fetch['price']?>.00</td>
      <td class="align-middle"><?php echo $fetch['quantity']?></td>
      <td class="align-middle">&#8369; <?php echo $fetch['quantity'] * $fetch['price']?>.00</td>
      <td class="align-middle"><?php echo strtoupper($fetch['status'])?></td>
      <td class="align-middle"><?php echo $fetch['date']?></td>
    </tr>

<?php
       }
    ?>
     </tbody>
</table>

</div>

</div> -->



<!--------- SECTION Start-------->
<section >
  <div class="container py-5">

   
   <?php
        $q_p = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'pending' && orderlist.customer_id = '".$_SESSION['customer_id']."' ") or die(mysqli_error());
        $f_p = $q_p->fetch_array();

        $q_s = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'accepted' && orderlist.customer_id = '".$_SESSION['customer_id']."'") or die(mysqli_error());
        $f_s = $q_s->fetch_array();

        $q_d = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'dispatched' && orderlist.customer_id = '".$_SESSION['customer_id']."'") or die(mysqli_error());
        $f_d = $q_d->fetch_array();


          $q_r = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'delivered' && orderlist.customer_id = '".$_SESSION['customer_id']."'") or die(mysqli_error());
        $f_r = $q_r->fetch_array();

      ?>


    <div class="row">


 <?php
      $queryy = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
      product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
      orderlist.date, customer.firstname, customer.lastname, customer.customer_id, merchant.business_name,merchant.merchant_id
      FROM orderlist 
      RIGHT JOIN product ON orderlist.product_id = product.product_id 
      RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
      RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
      WHERE orderlist.status = 'rated'  && orderlist.customer_id = '".$_SESSION['customer_id']."'
         || orderlist.status = 'delivered' && orderlist.customer_id = '".$_SESSION['customer_id']."'
      ORDER BY orderlist.date DESC
  ") or die(mysqli_error());
      while($fetch = $queryy->fetch_array()){

?>

    
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
           <h5 style="font-weight: 550;margin-top: 15px; margin-left: 15px" >
            <i class="fas fa-store" style=""></i>
              &nbsp<?php echo $fetch['business_name']?>
            </h5>
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

                    <?php if ($fetch['status']=='delivered') {
                      echo ' <a href="received_order_details.php?order_id='.$fetch['order_id'].' " class="myButton" style="color:white;margin:5px;">More Details</a>';

                       echo '<a href=rate_product.php?order_id='.$fetch['order_id'].' " class="myButton" style="color:white;margin:5px;">Rate Product</a>' ;

                    }else if ($fetch['status']=='rated'){
                           echo ' <a href="received_order_details.php?order_id= '.$fetch['order_id'].' " class="myButton" style="color:white;margin:5px;">More Details</a>';

                            echo '<a href=product_view.php?product_id='.$fetch['product_id'].' " class="myButton" style="color:white;margin:5px;">Order Again</a>' ;

                    }

                    
                     ?>

                    </div>
                 </td>
                </tr> 
              </table>

          </div>
        </div><br>
      </div>
  
   
<?php
    }
  ?> 

        </div>
      </div>

      <nav class="nav">
    
    <!---================== Total pending orders ================-->
<?php if ($f_p['total']!=0) {
         echo '<a href="purchase.php" class="nav__link " >    
               <span class="badge bg-danger" style="margin-left: 40px;">'.$f_p['total'].'</span>
              <i class="fa fa-history" style="font-size: 18px"></i>
          <span class="nav__text">Pending</span>
        </a>';
      }else{
          echo '<a href="purchase.php" class="nav__link " > 
                   <span class="badge" style="margin-left: 40px; color:white;background-color:white">0</span>  
              <i class="fa fa-history" style="font-size: 18px"></i>
          <span class="nav__text">Pending</span> </a>';

      } 
 ?>
<!---==================== Total shipping orders ==============-->
 <?php if ($f_s['total']!=0) {
         echo ' <a href="shipping_orders.php" class="nav__link ">
                  <span class="badge bg-danger" style="margin-left: 40px;">'.$f_s['total'].'</span>
                  <i class="fas fa-clipboard-check" style="font-size: 18px"></i>
                  <span class="nav__text">Accepted</span>
                </a>';
      }else{
          echo '<a href="shipping_orders.php" class="nav__link ">
                 <span class="badge" style="margin-left: 40px; color:white;background-color:white">0</span>  
                  <i class="fas fa-clipboard-check" style="font-size: 18px"></i>
                  <span class="nav__text">Accepted</span>
                </a>';

      } 
 ?>

<!---======================== Total dispatched orders ===========-->
 <?php if ($f_d['total']!=0) {
         echo ' <a href="dispatched_order.php" class="nav__link">
               <span class="badge bg-danger" style="margin-left: 40px;">'.$f_d['total'].'</span>
                <i class="fas fa-truck" style="font-size: 18px"></i>
                <span class="nav__text">Dispatched</span>
              </a>';
      }else{
          echo '<a href="dispatched_order.php" class="nav__link">
                 <span class="badge " style="margin-left: 40px;color:white;background-color:white">0</span> 
                <i class="fas fa-truck" style="font-size: 18px"></i>
                <span class="nav__text">Dispatched</span>
              </a>';

      } 
 ?>

<!---=========================== Total rate orders ==================-->
 <?php if ($f_r['total']!=0) {
         echo ' <a href="received_orders.php" class="nav__link  nav__link--active">
                <span class="badge bg-danger" style="margin-left: 40px;">'.$f_r['total'].'</span>
                <i class="fas fa-star" style="font-size: 18px"></i>
                <span class="nav__text">To rate</span>
              </a>';
      }else{
          echo ' <a href="received_orders.php" class="nav__link  nav__link--active">
                 <span class="badge" style="margin-left: 40px; color:white;background-color:white">0</span> 
                <i class="fas fa-star" style="font-size: 18px"></i>
                <span class="nav__text">To rate</span>
              </a>';

      } 
 ?>


  <!--<a href="purchase.php" class="nav__link " >
      <span class="badge bg-danger" style="margin-left: 40px;"><?php echo $f_p['total']?></span>
        <i class="fa fa-history" style="font-size: 18px"></i>
    <span class="nav__text">Pending</span>
  </a>
  <a href="shipping_orders.php" class="nav__link nav__link--active">
    <span class="badge bg-danger" style="margin-left: 40px;"><?php echo $f_s['total']?></span>
    <i class="fas fa-clipboard-check" style="font-size: 18px"></i>
    <span class="nav__text">Accepted</span>
  </a>
  <a href="dispatched_order.php" class="nav__link">
   <span class="badge bg-danger" style="margin-left: 40px;"><?php echo $f_d['total']?></span>
    <i class="fas fa-truck" style="font-size: 18px"></i>
    <span class="nav__text">Dispatched</span>
  </a>
  <a href="received_orders.php" class="nav__link">
    <span class="badge bg-danger" style="margin-left: 40px;"><?php echo $f_r['total']?></span>
    <i class="fas fa-star" style="font-size: 18px"></i>
    <span class="nav__text">To rate</span>
  </a>-->
</nav>

</section>
<!--------- SECTION END-------->


<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
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

.myButton:active {
  position:relative;
  top:1px;
}


.nav {
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 55px;
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
    background-color: #fff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
    min-width: 50px;
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 12px;
    color: black;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;

}

.nav__link:hover {
    background-color: #eeeeee;
}

.nav__link--active {
    color: #0d6edf;
}

.nav__icon {
    font-size: 18px;
}

.badge {
  font-size: 10px;
  border-radius: 50%;
  background: red;
  color: white;
}


</style>



    </body>
</html>


<!--
<style>
  .container   {
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
  .list {
    display: flex; 
    width: 100%;
    border:2px solid #000;
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