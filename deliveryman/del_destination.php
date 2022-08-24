<?php 
require 'validate.php';
require_once '../connection.php';

 
        
if(ISSET($_POST['Uplocation'])){

        $d_latitude= $_POST['d_latitude'];
        $d_longitude = $_POST['d_longitude'];
       

$conn->query("UPDATE `orderlist` SET `d_latitude` = '$d_latitude', `d_longitude` = '$d_longitude'
   WHERE `order_id` = '".$_REQUEST['order_id']."'") or die(mysqli_error());



            $query = $conn->query("SELECT *
            FROM `orderlist`
             WHERE order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            $fetch = $query->fetch_array();  
 echo ("<script>
        document.location.href = 'del_destination.php?order_id= ".$fetch['order_id']."';
        </script>");
  }

  
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery Destination</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.css" />
    
</head>
<body style='border:0; margin: 0'>

 <?php
         


            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id,orderlist.status, orderlist.order_id,orderlist.quantity,
            orderlist.total, orderlist.type, orderlist.photo,orderlist.date, merchant.business_name,merchant.merchant_id
            ,customer.firstname, customer.lastname, customer.address, customer.contact_number,customer.customer_id,customer.c_latitude,customer.c_longitude 
            FROM `orderlist`
            RIGHT JOIN product ON orderlist.product_id = product.product_id
            RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
         
             WHERE orderlist.order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  
        
          ?>  

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">



<input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
          <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
          <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">

<div class="formBlock">
     <form   action="del_destination.php?order_id=<?php echo $fetch['order_id']?>" method="POST" >

                <input type="text" name="d_latitude" class="input" id="d_latitude" ><br>
                <input type="text" name="d_longitude" class="input" id="d_longitude" ><br>

                <button style="width: 100%" type="submit" name="Uplocation" >Update Location</button>
            </form>


    <form id="form">
            <input type="hidden" name="start" class="input" id="start" value="<?php echo $fetch['c_latitude']?>,<?php echo $fetch['c_longitude']?>" placeholder="Input your destination"/>
                <input type="hidden" name="end" class="input" id="destination" placeholder="Choose starting point" readonly/><br>
                <button style="width: 100%" type="submit" >Show Route</button>
            </form>

           
             </div>

        </div>
 




           <?php
        }
        ?>

    

 
<div id="map"></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/leaflet.js"></script>
  <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=1CWxNVqNiLCgLCpsMq2tobfcQbiMGrRG"></script>
  <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=1CWxNVqNiLCgLCpsMq2tobfcQbiMGrRG"></script>
    
<script type="text/javascript">
     function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  //x.innerHTML = "Latitude: " + position.coords.latitude + 

  document.getElementById("destination").value = position.coords.latitude+","+position.coords.longitude;
  document.getElementById("d_latitude").value= position.coords.latitude;
  document.getElementById("d_longitude").value= position.coords.longitude;
}
getLocation();
 </script>

    <script type="text/javascript">
    
// default map layer
let map = L.map('map', {
    layers: MQ.mapLayer(),
    center: [14.0734578,120.6322736],
    zoom: 15
});
 var inputF = document.getElementById("destination");   

    function runDirection(start, end) {
        
        // recreating new map layer after removal
        map = L.map('map', {
            layers: MQ.mapLayer(),
            center: [14.0734578,120.6322736],
            zoom: 15
        });
        
        var dir = MQ.routing.directions();

        dir.route({
            locations: [
                start,
                end
            ]
        });
    

        CustomRouteLayer = MQ.Routing.RouteLayer.extend({
            createStartMarker: (location) => {
                var custom_icon;
                var marker;

                custom_icon = L.icon({
                    iconUrl: '../img/end.png',
                    iconSize: [30, 30],
                    iconAnchor: [10, 29],
                    popupAnchor: [0, -29]
                });

                marker = L.marker(location.latLng, {icon: custom_icon}).addTo(map);

                return marker;
            },

            createEndMarker: (location) => {
                var custom_icon;
                var marker;

                custom_icon = L.icon({
                    iconUrl: '../img/marker.webp',
                    iconSize: [30, 30],
                    iconAnchor: [10, 29],
                    popupAnchor: [0, -29]
                });

                marker = L.marker(location.latLng, {icon: custom_icon}).addTo(map);

                return marker;
            }
        });
        
        map.addLayer(new CustomRouteLayer({
            directions: dir,
            fitBounds: true
        })); 
    }


// function that runs when form submitted
function submitForm(event) {
    event.preventDefault();

    // delete current map layer
    map.remove();

    // getting form data
    start = document.getElementById("start").value;
    end = document.getElementById("destination").value;

    // run directions function
    runDirection(start, end);
    getLocation();
    // reset form
    //document.getElementById("form").reset();
}

// asign the form to form variable
const form = document.getElementById('form');

// call the submitForm() function when submitting the form
form.addEventListener('submit', submitForm);

</script>


<style type="text/css">
  #map {
    height:100vh;
    width: 100%;
    position: relative;
}

.formBlock {
    max-width: 300px;
    background-color: #FFF;
    border: 1px solid #ddd;
    position: absolute;
    top: 10px;
    left: 10px;
    padding: 10px;
    z-index: 999;
    box-shadow: 0 1px 5px rgba(0,0,0,0.65);
    border-radius: 5px;
    width: 100%;
}

.leaflet-top .leaflet-control {
    margin-top: 180px;
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
</style>


</body>
</html>