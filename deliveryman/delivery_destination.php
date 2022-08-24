<?php 
require 'validate.php';
require_once '../connection.php';

if(ISSET($_POST['Uplocation'])){

        $d_latitude= $_POST['d_latitude'];
        $d_longitude = $_POST['d_longitude'];
        $timezone = date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s', time());

$conn->query("UPDATE `deliveryman` SET `d_latitude` = '$d_latitude', `d_longitude` = '$d_longitude'
   WHERE `deliveryman_id` = '".$_REQUEST['deliveryman_id']."'") or die(mysqli_error());

$conn->query("UPDATE `deliveryman` SET `last_update` = '$datetime'
   WHERE `deliveryman_id` = '".$_REQUEST['deliveryman_id']."'") or die(mysqli_error());

          /*  $query = $conn->query("SELECT *
            FROM `orderlist`
             WHERE order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            $fetch = $query->fetch_array();  
 echo ("<script>
        alert('Your current position has been updated');
        document.location.href = 'try.php?order_id= ".$fetch['order_id']."';
        </script>");*/

        echo ("<script>
         alert('Your current position has been updated'); 
window.history.back()
</script>");
  }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delivery Destination</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <link rel="stylesheet" href="../dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="index.css" />
    
</head>
<body >
   <div id="map" class="map">
        
   </div>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
     <script src="../dist/leaflet-routing-machine.js"></script>
    <script src="Control.Geocoder.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>


 <?php
         
            $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
            product.price, product.merchant_id,orderlist.status, orderlist.order_id,orderlist.quantity,
            orderlist.total, orderlist.type, orderlist.photo,orderlist.date, merchant.business_name,merchant.merchant_id
            ,customer.firstname, customer.lastname, customer.address, customer.contact_number,customer.customer_id,customer.c_latitude,customer.c_longitude ,deliveryman.deliveryman_id,deliveryman.d_latitude,deliveryman.d_longitude
            FROM `orderlist`
            RIGHT JOIN product ON orderlist.product_id = product.product_id
            RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
            RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
            RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
             WHERE orderlist.order_id = '".$_REQUEST['order_id']."'") or die(mysqli_error());
            while($fetch = $query->fetch_array()){  
        
          ?>  

            <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">
 <input type="hidden" value="<?php echo $fetch['deliveryman_id']?>" name="deliveryman_id">

   <div class="formBlock" >
     <form   action="delivery_destination.php?deliveryman_id=<?php echo $fetch['deliveryman_id']?>" method="POST" >           
         <input type="hidden" name="d_latitude" id="d_latitude" class="form-control" placeholder="latitude" />            
         <input type="hidden" name="d_longitude" id="d_longitude" class="form-control" placeholder="longitude" />
         <button id="CL-btn" style="width: 100%" type="submit" name="Uplocation" style="font-size:5p" >Update Location</button>
     </form>
  </div>
   

     <input type="hidden" name="c_latitude" class="input"  value="<?php echo $fetch['c_latitude']?>" id="c_latitude" ><br>
     <input type="hidden" name="c_longitude" class="input"  value="<?php echo $fetch['c_longitude']?>" id="c_longitude" ><br>


<?php
  }
?>


</body>
</html>

<script type="text/javascript">
      var button = document.getElementById('CL-btn');
      setInterval(function(){
        button.click();
      },6000000);

  </script>

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>


 <script type="text/javascript">
var map = L.map('map');
const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tileLayer = L.tileLayer(tileUrl,{
 maxZoom: 21 ,
 attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors\''
});
tileLayer.addTo(map);



//current deliveryman location//
var lc =L.control.locate({
    radius:300,
    color:'steelblue',
    strings: {
        title: "Show me where I am"
    },
    locateOptions: {
               maxZoom: 60
}
}).addTo(map);

lc.start();
//


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  //x.innerHTML = "Latitude: " + position.coords.latitude + 

   document.getElementById("d_latitude").value = position.coords.latitude;
    document.getElementById("d_longitude").value = position.coords.longitude;

    let latti =  position.coords.latitude;
    let longi = position.coords.longitude;

    let latti2= document.getElementById("c_latitude").value;
    let longi2= document.getElementById("c_longitude").value;

    
    var control = L.Routing.control({
    waypoints: [
        L.latLng(latti,longi),
        L.latLng(latti2, longi2)
    ],
    
    routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    altLineOptions: {
        styles: [
            {color: 'black', opacity: 0.15, weight: 9},
            {color: 'white', opacity: 0.8, weight: 6},
            {color: 'blue', opacity: 0.5, weight: 2}
        ]
    },

createMarker: function (i, waypoint, n) {


let urlIcon;

if(i==0){
    urlIcon=('marker.webp');

}
else if((i+1)==n){
    urlIcon=('end.png');

}
else{
    urlIcon=('foot.png');

}

            const marker = L.marker(waypoint.latLng, {
              
              bounceOnAdd: false,
              bounceOnAddOptions: {
                duration: 1000,
                height: 800,
                function() {
                  (bindPopup(myPopup).openOn(map))
                }
              },
              icon: L.icon({
                iconUrl: urlIcon,
                iconSize: [35, 35]
              })
            });
            return marker;
          

}


}).addTo(map);

L.Routing.errorControl(control).addTo(map);
}

getLocation();

</script>

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

/*.leaflet-right .leaflet-control {
   
    margin-top: 100px;
}*/


</style>