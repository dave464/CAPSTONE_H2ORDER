<?php
require 'validate.php';
require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>      
      <!-- Navbar-->
      <?php include 'navbar.php' ?>



  <br>    <div class="vh-200" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-12">
        <div class="card text-black" style="border:0px">
          <div class="card-body p-md-1">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1" >



                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46;  font-size: 50px">
                READY TO GET <span style="color: #379EFF; font-size: 50px">HYDRATED?</span>
              </p> 

                  <p class="text-center h6  mb-3 mx-1 mx-md-4 mt-4">
                    <i class="fas fa-play fa-lg me-3 fa-fw" style="color: #379EFF;  margin-left:2px "></i>
                    To get started, simply locate your preferred merchant and place your order today.
                  </p>

                    <center><a href="list_of_merchants.php" class="btn btn-primary btn-lg ">
            <i class="fas fa-cart-plus"></i> Order Now</a> </center>

                <!--<div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px; margin-left: 30px">
                    <i class="fas fa-check-circle fa-lg me-3 fa-fw" style="color: #379EFF "></i>
                    <span  style="color: #081F46; font-weight: 600">Laboratory tested</span>
                  </div>

                 <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px;  margin-left: 30px">
                    <i class="fas fa-check-circle fa-lg me-3 fa-fw" style="color: #379EFF "></i>
                    <span  style="color: #081F46; font-weight: 600">Great composition</span>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px;  margin-left: 30px">
                    <i class="fas fa-check-circle fa-lg me-3 fa-fw" style="color: #379EFF "></i>
                    <span  style="color: #081F46; font-weight: 600">Nano filtration</span>
                  </div>-->

                  <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px;  margin-left: 30px">                
                     <img src="../img/microscope.png" style="height: 40px; width: 40px">
                    <span  style="color: #081F46; font-weight: 600; margin-left: 30px">Laboratory tested</span>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px;  margin-left: 30px">
                       <img src="../img/flask.png" style="height: 40px; width: 40px">
                    <span  style="color: #081F46; font-weight: 600;  margin-left: 30px">Great composition</span>
                  </div>
               
                   <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 60px;  margin-left: 30px">
                       <img src="../img/filter.png" style="height: 40px; width: 40px">
                    <span  style="color: #081F46; font-weight: 600;  margin-left: 30px">Nano filtration</span>
                  </div>
               


              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/tubig.jpg" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    
   <br><br><br>

     <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
           WATER <span style="color: #379EFF;">COMPOSITION</span>
    </p>  
        
        <p class="text-center h6  mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; letter-spacing: 1px; font-size:14px ">
           WHAT'S INSIDE?
        </p> 
            <br><br>

<div class="container">
  <main class="grid">
    <article style="border:0px; box-shadow: 0px 0px">
        <p class="text-end h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
           Calcium Ca2+
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: right; padding: 0px 20px 50px 100px">
             <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
           About 99% of the calcium in our bodies is in our bones and teeth.
         </p>

        <p class="text-end h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
             Sodium Na+
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: right; padding: 0px 20px 50px 100px">
              <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
            It's an important component for proper muscle and nerve function.
        </p>

         <p class="text-end h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
             Potassium
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: right; padding: 0px 20px 50px 100px">
              <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
            Muscles and myocardium activities, neuromuscular excitability, acid-base balance, water retention and osmotic pressure.
        </p>

    </article>
    <article style="border:0px; box-shadow: 0px 0px">
       <center> 
          <img src="../img/water-glass.png" 
              style=" display: inline-block;
                      animation-name: example;
                      animation-duration: 2s;
                      animation-iteration-count: infinite; " >
       </center>
    </article>
    <article style="border:0px; box-shadow: 0px 0px;">
         <p class="text-start h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
             Magnesium Mg2+
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: left; padding: 0px 100px 50px 20px">
              <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
            Magnesium is a nutrient that the body needs to stay healthy.
        </p>

         <p class="text-start h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
             Sulfate SO4(2-)
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: left; padding: 0px 100px 50px 20px">
              <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
             Sulfate is among the most important macronutrients in cells.
        </p>

         <p class="text-start h6 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
             Bicarbonate
        </p> 
           <p style=" margin-top: -10px; font-size: 14px; text-align: left; padding: 0px 100px 100px 20px">
              <i class="fas fa-play fa-sm me-2 fa-fw" style="color: #379EFF;  "></i>
            Bicarbonate is an antacid used to relieve heartburn and acid indigestion.
        </p>
    </article>
 
  </main>
</div><br><br>            

   <center>

       <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4" style="color: #081F46; ">
           WATER IS <span style="color: #379EFF;">NOTHING BUT LIFE</span>
    </p>  
       </center><br>
 

<div class="container">
  <main class="grid">
    <article>
      <img src="../img/infographics 1.jpeg"  onclick="window.location='../img/infographics 1.jpeg'" 
      alt="Sample photo" style="cursor:pointer;">
     
    </article>
    <article>
      <img src="../img/infographics 2.jpg"  onclick="window.location='../img/infographics 2.jpg'" 
      alt="Sample photo" style="cursor:pointer;">
     
    </article>
    <article>
      <img src="../img/infographics 3.jpg"  onclick="window.location='../img/infographics 3.jpg'" 
      alt="Sample photo" style="cursor:pointer;">
      
    </article>
 
  </main>
</div><br>




<?php 

    $q_r = $conn->query("SELECT MAX(orderlist.date) as MAX_DATE , orderlist.date , customer.customer_id, customer.firstname
      FROM `orderlist`
      RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
      WHERE orderlist.status = 'delivered' && orderlist.customer_id = '".$_SESSION['customer_id']."' ||
            orderlist.status = 'rated' && orderlist.customer_id = '".$_SESSION['customer_id']."' ") or die(mysqli_error());
    $f_r = $q_r->fetch_array();
      

?>


<!-- The Modal -->
<div class="modal" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content" style="background-color:#B0E0E6; width: 100%; height: 500px " >

      <!-- Modal Header -->
      <div class="modal-header">
        <h3 class="modal-title">
             <b style="color: #081F46 ">Welcome Back, <?php echo $f_r['firstname']?></b> 
                       
          </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          <?php

                date_default_timezone_set('Asia/Manila');

                // 24-hour format of an hour without leading zeros (0 through 23)
                $Hour = date('G');

                  if ( $Hour >= 5 && $Hour <= 11 ) {
                      echo "Good Morning";
                  } else if ( $Hour >= 12 && $Hour <= 18 ) {
                      echo "Good Afternoon";
                  } else if ( $Hour >= 19 || $Hour <= 4 ) {
                      echo "Good Evening";
                  }
          ?>

        <?php 
          // Declare and define two dates
          $date1 = strtotime(date("Y-m-d", strtotime($f_r['MAX_DATE'])));
          $date2 = strtotime(date("Y-m-d"));
         
          echo "Ma'am/Sir, <br><br>"
              . ($date2 - $date1)/60/60/24;

          echo " days ago since your last <br>";
          echo " order do you want to order now?";
          ?>
        
        <img src="../img/bgModal.png" style="margin-left: 220px;margin-top:-50px;height: 70%; width: 55%">  
         <img src="../img/watbg.png" style="float:left; height: 35%; width: 40% ; margin-top: -200px  " > 
        <a href="list_of_merchants.php" class="btn btn-primary " style="float: left; margin-top: -50px">
            <i class="fas fa-cart-plus"></i> Order Now</a> 

        <img src="../img/wave.png" style="margin-left:-17px " width="490px" height="80px">    
      </div>

    </div>
  </div>
</div>


<?php 

    $q_r = $conn->query("SELECT MAX(date) as MAX_DATE , date FROM `orderlist`
      WHERE orderlist.status = 'delivered' && orderlist.customer_id = '".$_SESSION['customer_id']."' ||
            orderlist.status = 'rated' && orderlist.customer_id = '".$_SESSION['customer_id']."' ") or die(mysqli_error());
    $f_r = $q_r->fetch_array();
   
      $startdate = $f_r['MAX_DATE'] ;
      $expire = strtotime($startdate. ' + 2  days');
      $today = strtotime("today midnight");

      if($today >= $expire ){

         echo '  <script>
                  var modalObject = document.getElementById("myModal");

                  var spanObject = document.getElementsByClassName("btn-close")[0];

                  modalObject.style.display = "block";

                  spanObject.onclick = function(){
                     modalObject.style.display= "none";
                  }

                  window.onclick = function(event){
                     if (event.target == modalObject) {
                           modalObject.style.display = "none";
                     }
                  } 
                  </script>';
      }

?>




<style>
.article{
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


.btn {
  width: 200px;
  border-radius: 6px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  margin-top:30px;
  background:linear-gradient(to bottom,  #2196F3 5%, #0d6edf 100%);
}
.btn:hover {
  background:linear-gradient(to bottom, #0d6edf 5%, #2196F3 100%);
}


.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
}

.grid > article {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
}

.grid > article img {
  max-width: 100%;

}

.grid .text {
  padding: 20px;
}

@keyframes example {
    0%   {margin-top: 0px;}
    50%  {margin-top: 20px;}
    100% {margin-top: 0px;}
}


</style>


</body>
</html>
