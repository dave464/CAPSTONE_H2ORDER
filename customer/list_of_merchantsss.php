<?php
require 'validate.php';
require '../connection.php';
?>


<?php


function distance($latitudeFrom, $longitudeFrom,
                  $latitudeTo, $longitudeTo) {

   $long1 = deg2rad($longitudeFrom);
    $long2 = deg2rad($longitudeTo);
    $lat1 = deg2rad($latitudeFrom);
    $lat2 = deg2rad($latitudeTo);
      
    //Haversine Formula
    $dlong = $long2 - $long1;
    $dlati = $lat2 - $lat1;
      
    $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
      
    $res = 2 * asin(sqrt($val));
      
    $radius = 3958.756;
      
    return ($res*$radius);
}



?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>List of merchants</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
      <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
     
    </head>


<body>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>      
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       



<div  >


 <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-4 mt-4"  style="color:#004aad;text-shadow: 1px 1px #03a9f4;">FIND THE BEST WATER REFILLING STATION NEAR YOU</p>

<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="search"> 
              <i class="fa fa-search"></i>
               <input type="text" class="form-control"  id="searchbar"  onkeyup="search_store()" placeholder="Search" >
                <button class="btn btn-primary" >Search</button>  
            </div>
        </div>
    </div>
    <br>

        <div class="d-flex justify-content-start mb-3">         
           <a href="map.php" style="text-decoration:none; ">
             <i class="fas fa-map-marked-alt fa-lg me-3 fa-fw" ></i>
              <h5 class="BN" style="color:#000;margin:5px;margin-left:35px;margin-top: -22px;  font-size: 18px">
              View on map</h5>
          </a>

         <a href="filter_product.php" style="text-decoration:none; ">
              <img src="../img/gall.png" style="margin-left: 20px; width: 35px; height: 35px; margin-top: -10px;" >
           <h5 class="BN" style="color:#000;margin:5px;margin-left:55px;margin-top: -22px;  font-size: 18px">
           View products</h5>
           </a>  
       </div>
</div>
   



       <!-- <div class="store" >

        <center><img src="../photo/<?php echo $fetch['image']?>" style="width:70%;height:200px;cursor: pointer;"  onclick="window.location='product.php?merchant_id=<?php echo $fetch['merchant_id']?>'" data-bs-toggle="tooltip" data-bs-placement="right" title="Click here to discover <?php echo $fetch['business_name']?>'s product"></center><br>
         

       <i class="fas fa-store fa-lg me-3 fa-fw" ></i>
          <h5 class="BN" style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['business_name']?></h5>
      
  <i class="fas fa-map-marker fa-lg me-3 fa-fw" style="color: red;"></i>
          <h5 class="AD" style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['address']?></h5>
       
          <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
          <h5 style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['contact_number']?></h5>
        

        </div>-->



<!--------- SECTION Start-------->
<section >
  <div class="container py-5">


    <div class="row">

 <?php
   $query = $conn->query("SELECT * FROM `merchant` WHERE status ='approved' ORDER BY business_name asc ") or die(mysqli_error());

   $queryy = $conn->query("SELECT *from customer WHERE `customer_id` = '".$_SESSION['customer_id']."' ") or die(mysqli_error());

        while ($fetch2= $queryy->fetch_array()) {
          $lt=$fetch2['c_latitude'];
          $lg=$fetch2['c_longitude'];
        }

    while($fetch = $query->fetch_array()){
    $closes=distance($lt, $lg,$fetch['latitude'], $fetch['longitude']);


 ?>  
    
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          
             <div class="store" >

        <center><img src="../photo/<?php echo $fetch['image']?>" style="width:70%;height:200px;cursor: pointer;"  onclick="window.location='product.php?merchant_id=<?php echo $fetch['merchant_id']?>'" data-bs-toggle="tooltip" data-bs-placement="right" title="Click here to discover <?php echo $fetch['business_name']?>'s product"></center><br>
         

       <i class="fas fa-store fa-lg me-3 fa-fw" ></i>
          <h5 class="BN" style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['business_name']?></h5>
      
  <i class="fas fa-map-marker fa-lg me-3 fa-fw" style="color: red;"></i>
          <h5 class="AD" style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['address']?> <?php echo $fetch['barangay']?> Nasugbu,Batangas </h5>
       
          <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
          <h5 style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
          <?php echo $fetch['contact_number']?></h5>
        
         <?php echo "Approximately ".round($closes,2)." miles away on you";?><br>



        </div>



        </div><br>
      </div>
  
   
<?php
    }
  ?> 

        </div>
      </div>

</section>
<!--------- SECTION END-------->






</div>



<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// JavaScript code
function search_store() {
  let input = document.getElementById('searchbar').value
  input=input.toLowerCase();
  let x = document.getElementsByClassName('col-md-12');
  
  for (i = 0; i < x.length; i++) {
    if (!x[i].innerHTML.toLowerCase().includes(input)) {
      x[i].style.display="none";
    }
    else {
      x[i].style.display="list-item";       
    }
  }
}

</script>




    </body>
</html>



<style type="text/css">
  
/*.store {
  max-width: 380px;
  min-height: 300px;
  margin: 50px auto;
  padding: 40px 30px 30px 30px;
  background-color: white;
  border-radius: 15px;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
  border-color: gray;
  border: 1px solid rgba(0,0,0,.125);
}*/


.col-md-12{
  display: list-item;  
    list-style-type: none;



}

.card{
   padding: 40px 30px 30px 30px;
  background-color: white;
  border-radius: 15px;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
  border-color: gray;
  border: 1px solid rgba(0,0,0,.125);

}



.store  .btn:hover {
  background-color: #039be5;
}

.store  a {
  text-decoration: none;
  font-size: 0.8rem;
  color: #03a9f4;
}

.store  a:hover {
  color: #039be5;
}

/*
@media (max-width: 380px) {
  .store   {
    margin: 30px 20px;
    padding: 40px 15px 15px 15px;
  }
}*/



.search {
    position: relative;
    box-shadow: 0 0 40px rgba(51, 51, 51, .1)

}

.search input {
    height: 40px;
    text-indent: 25px;
    border: 2px solid #d6d4d4;
}

.search input:focus {
    box-shadow: none;
    border: 2px solid blue;
}

.search .fa-search {
    position: absolute;
    top: 10px;
    left: 16px
}

.search button {
    position: absolute;
    top: -14px;
    right: 2px;
    height: 39px;
    width: 110px;
    background: #004aad;
}



.store{
   display: list-item;  
    list-style-type: none;
}  

  } 

</style>