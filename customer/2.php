<?php 
require 'validate.php';
require_once '../connection.php';



  
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery Destination</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    <link rel="stylesheet" href="../deliveryman/index.css" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=1CWxNVqNiLCgLCpsMq2tobfcQbiMGrRG"></script>
        <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=1CWxNVqNiLCgLCpsMq2tobfcQbiMGrRG"></script>
</head>
<body style='border:0; margin: 0'>
       <div id="map" class="map">
          
       </div>

    


 <?php
         


            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id,orderlist.status, orderlist.order_id,orderlist.quantity,
            orderlist.total, orderlist.type, orderlist.photo,orderlist.date, merchant.business_name,merchant.merchant_id
            ,customer.firstname, customer.lastname, customer.address, customer.contact_number,customer.customer_id,customer.c_latitude,customer.c_longitude ,deliveryman.d_longitude ,deliveryman.d_latitude,deliveryman.deliveryman_id,
            
             (
      3959  * acos (
      cos ( radians(customer.c_latitude) )
      * cos( radians(deliveryman.d_latitude) )
      * cos( radians(deliveryman.d_longitude) - radians(customer.c_longitude) )
      + sin ( radians(customer.c_latitude) )
      * sin( radians(deliveryman.d_latitude) )
    )
) AS distance


            FROM `orderlist`
            RIGHT JOIN product ON orderlist.product_id = product.product_id
            RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
             RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
             WHERE orderlist.order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  

             $del_lati=$fetch['d_latitude']; 
             $del_long=$fetch['d_longitude']; 
          ?>  

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">
             <input type="hidden" value="<?php echo $fetch['deliveryman_id']?>" name="deliveryman_id">


<input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
          <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
          <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">

<div class="formBlock">
    <form id="form">
           <input type="hidden" name="c_latitude" class="input"  value="<?php echo $fetch['c_latitude']?>" id="c_latitude" ><br>
     <input type="hidden" name="c_longitude" class="input"  value="<?php echo $fetch['c_longitude']?>" id="c_longitude" ><br>

        <input type="hidden" name="d_latitude" class="input"  value="<?php echo $fetch['d_latitude']?>" id="d_latitude" ><br>
     <input type="hidden" name="d_longitude" class="input"  value="<?php echo $fetch['d_longitude']?>" id="d_longitude" ><br>

     <input type="type"  class="input"  value=" <?php 

     include 'ReverseLatlong.php';


print_r (LatLongAddres(''.$fetch['d_latitude'].'',''.$fetch['d_longitude'].''));

     ?>" id="AD" ><br>

<input type="type" name="distance" class="input"  value="<?php 

              $x=$fetch['distance']*1.609344;
              $y=1000;

             if ( $fetch['distance'] > 1 ) {
                echo round('  '.$fetch['distance'].' ) ',2);
                echo " KM";

             }elseif ($fetch['distance'] < 1) {
                echo  round($x * $y,2);
                echo " M";
             }
         
         ?>" id="DIS" ><br>
    

    </form>
</div>




        </div>
 




           <?php
        }
        ?>

    


    
<script type="text/javascript">


    let lattii = document.getElementById("d_latitude").value; 
    let longii = document.getElementById("d_longitude").value;

 var map = L.map('map', {
    layers: MQ.mapLayer(),
    center: [lattii,longii],
    zoom: 18
});
const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tileLayer = L.tileLayer(tileUrl,{
 maxZoom: 21 ,
 attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors\''
});
tileLayer.addTo(map);


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  //x.innerHTML = "Latitude: " + position.coords.latitude + 


    let latti = document.getElementById("d_latitude").value; 
    let longi = document.getElementById("d_longitude").value;
    let clatti = document.getElementById("c_latitude").value; 
    let clongi = document.getElementById("c_longitude").value;
    let ADD=document.getElementById("AD").value;
    let Dis=document.getElementById("DIS").value;


    var g1 = L.icon({
    iconUrl: '../img/marker.png',
    iconSize: [30, 30], // size of the icon
     });

    L.marker([latti,longi],{icon: g1}).addTo(map)
    .bindPopup(' <center> <img src = "../img/marker.png" style="width: 100px;height: 110px; margin-bottom: 5px;" /> </center>   '
     + '<br>'+'<b>Location:</b>'+ ADD + '<br>'+ '<b>Distance:</b> '+ Dis ).openPopup();
    

    var g2 = L.icon({
    iconUrl: 'end.png',
    iconSize: [25, 25], // size of the icon
      });

    L.marker([clatti,clongi],{icon: g2}).addTo(map)

   }

getLocation();

</script>

<!--
<style type="text/css">
  .formBlock {
    max-width: 200px;
    background-color: #FFF;
    border: 1px solid #ddd;
    position: absolute;
    top: 40em;
    left:5px;
    padding: 8px;
    z-index: 999;
    box-shadow: 0 1px 5px rgba(0,0,0,0.65);
    border-radius: 5px;
    width: 100%;
}


.input { 
    width: 100%;
    border: 1px solid #ddd;
    font-size: 15px;
    border-radius: 3px;
}

#form {
    padding: 0;
    margin: 0;
}
input:nth-child(1) {
    margin-bottom: 10px;
}
-->

</body>
</html>