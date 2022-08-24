<?php
require 'validate.php';
require '../connection.php';

$loadFun="";
if(isset($_SESSION['lat']) && isset($_SESSION['lon'])){
  $lat=$_SESSION['lat'];
  $lon=$_SESSION['lon'];
  
  $res=mysqli_query($conn,"SELECT
    merchant_id, business_name, address, contact_number,barangay, image, (
      3959 * acos (
      cos ( radians($lat) )
      * cos( radians(latitude) )
      * cos( radians(longitude ) - radians($lon) )
      + sin ( radians($lat) )
      * sin( radians(latitude) )
    )
) AS distance
FROM merchant
HAVING distance < 20
ORDER BY distance 
LIMIT 6 ");
}else{
  $res=mysqli_query($conn,"SELECT * FROM `merchant` ");
  $loadFun="onload='getLocation()'";
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
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
    </head>


<body <?php echo $loadFun?> >
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>      
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
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
          window.location.href='list_of_merchantss.php'
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


<div  >


 <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-4 mt-4"  style="color:#004aad;text-shadow: 1px 1px #03a9f4;">NEAREST WATER REFILLING STATION</p>

<div class="container">
   
    <br>

        <div class="d-flex justify-content-start mb-3">         
           <a href="map.php" style="text-decoration:none; ">
             <i class="fas fa-map-marked-alt fa-lg me-3 fa-fw" ></i>
              <h5 class="BN" style="color:#000;margin:5px;margin-left:35px;margin-top: -22px;  font-size: 18px">
              View on map</h5>
          </a>

         <a href="FilterProduct.php" style="text-decoration:none; ">
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

 <?php while($fetch=mysqli_fetch_assoc($res)){?>
    
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

           <i class=" fas fa-route fa-lg me-3 fa-fw" ></i>
          <h5 class="BN" style="color:#000;margin:5px;margin-left:35px;margin-top: -21px; font-size: 15px">
           
           <?php 

              $x=$fetch['distance']*1.609344;
              $y=1000;

             if ( $fetch['distance'] > 1 ) {
                echo round('  '.$fetch['distance'].' ) ',2);
                echo " KM";

             }elseif ($fetch['distance'] < 1) {
                echo  round($x * $y,2);
                echo " M";
             }
         
         ?>
           
         </h5>               
      
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