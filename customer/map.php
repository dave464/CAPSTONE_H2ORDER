<?php
require 'validate.php';
require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
           <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/styles.css">


    <title>Store Locator</title>
</head>

<body>

 
<?php 
$sql = "SELECT * FROM `merchant` WHERE status ='approved' ORDER BY business_name asc ";

$server = "localhost";
$username = "root";
$password = "";
$db = "h2order";  
$conn = mysqli_connect($server, $username, $password, $db);

$result = mysqli_query($conn, $sql);

$storeList = array();

while($row = mysqli_fetch_assoc($result)) {
   
$saveJson=null;
$saveJson["type"]="Feature";
$saveJson["properties"]=[
                    "name"=> $row['business_name'],
                    "address"=>$row['address'],
                    "barangay"=>$row['barangay'],
                    "municipality"=>'Nasugbu,Batangas',
                    "phone"=>$row['contact_number'],
                    "image"=>$row['image'],
                    "opening"=>date('h:i A', strtotime($row['opening'])),
                    "closing"=>date('h:i A', strtotime($row['closing'])),
                    "link"=>['Order Now'],
                    "merchant_id"=>$row['merchant_id']            
                ];

$saveJson["geometry"]=[
                     "type"=> "Point",
                    "coordinates" => [$row['longitude'],$row['latitude']  ],
                 ];

 $storeList[]= $saveJson;

}
 
?>

  <?php
            $query = $conn->query("SELECT * FROM `customer`" ) or die(mysqli_error());
           
           while($fetch = $query->fetch_array()){
          ?>  
     <?php
       }
    ?>  
<!---MAP--->
    <main>
        <div id="mySidepanel" class="store-list">
           
            <div class="heading">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                <i class="fas fa-times fa-lg me-3 fa-fw" style="color: black; float: right;margin-top:10px;  font-size: 27px;" ></i> </a>
                <h2>Waterstation</h2>
            </div>
             <input id="searchbar" onkeyup="search_animal()" type="search"
                name="search" placeholder="Search" style="margin-left: 16px; width:70%; height: 28px;margin-top:5px"> 

                  <button type="button" class="btn btn-sm btn-primary"
                           style="margin-left: -4.5px; height:28px;width:30px;background-color:  ">
                    <i class="fas fa-search"></i>
                  </button>
            <ul class="list">
            </ul>
        </div>
        <div id="map">

          <div class="leaflet-top " >
             <i class="fas fa-store fa-lg me-3 fa-fw" style="color: black;text-shadow: 1px 1px white; margin-left:10px; margin-top: -10px; font-size: 27px;" ></i> 
          </div>
          
 <button class="openbtn" onclick="openNav()"> <i class="fas fa-store fa-lg me-3 fa-fw"
  style="color: white; font-size: 20px;" ></i> </button>  
        </div>
    </main>
 



<style>
body {
  font-family: "Lato", sans-serif;
}

.sidepanel  {
  width: 0;
  position: fixed;
  z-index: 1;
  height: 250px;
  top: 0;
  left: 0;
  background-color: #eee;
  overflow-x: hidden;

}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 27px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: white;
  color: white;
  padding: 60px 15px;
  border: none;
}

.openbtn:hover {
  background-color:#444;
}
</style>
</head>
<body>

<div id="mySidepanel" class="sidepanel">
 
</div>


<script>
function openNav() {
  document.getElementById("mySidepanel").style.width = "75%";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>






 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
 crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 


<script type="text/javascript"> 

//geojson
var storeList = <?php echo json_encode($storeList,JSON_PRETTY_PRINT) ?>;

//Map
var myMap = L.map('map').setView([14.0734578,120.6322736], 12);

/*===================================================
                      Tile Layers              
===================================================*/

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tileLayer = L.tileLayer(tileUrl,{
 maxZoom: 19 ,
 attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors\''
});
tileLayer.addTo(myMap);





//customer location//
L.control.locate({
    radius:300,
    color:'steelblue',
    strings: {
        title: "Show me where I am"
    },
    locateOptions: {
               maxZoom: 60
}
}).addTo(myMap);




//Generate merchant list//
function generateList() {
  const ul = document.querySelector('.list');
  storeList.forEach((shop) => {
    const li = document.createElement('li');
    const div = document.createElement('div');
    const a = document.createElement('a');
    const p = document.createElement('p');
    a.addEventListener('click', () => {
        flyToStore(shop);
    });
    div.classList.add('shop-item');
    a.innerText = shop.properties.name;
    a.href = '#';
    p.innerText = shop.properties.address +' '+ shop.properties.barangay +' '+ shop.properties.municipality;
    div.appendChild(a);
    div.appendChild(p);
    li.appendChild(div);
    ul.appendChild(li);
  });
}

generateList();


//Pop Shop Details//
function makePopupContent(shop) {
  return `
    <div>
      <div class="logo ">
        <center> <img style="width:100px;height:100px;" src="../photo/${shop.properties.image}"></center>
      </div>
            <center> <h4>${shop.properties.name}</h4> </center>
        <i class="fas fa-map-marker fa-lg me-3 fa-fw" style="color: red; margin-left:10px;" ></i>
          <p style="margin:5px;margin-left:15px;margin-top: -18px;">${shop.properties.address} ${shop.properties.barangay} ${shop.properties.municipality}</p>
        <i class="fas fa-phone fa-lg me-3 fa-fw" style="color: black; margin-left:10px;" ></i>
          <p  style="margin:5px;margin-left:15px;margin-top: -18px;">${shop.properties.phone}</p>
         <i class="fas fa-clock fa-lg me-3 fa-fw" style="color: black; margin-left:10px;" ></i>
          <p  style="margin:5px;margin-left:15px;margin-top: -18px;"> Open Hours ${shop.properties.opening} to ${shop.properties.closing}</p>
        <div class="phone-number">
          <a href = "product.php?merchant_id= ${shop.properties.merchant_id} " class="myButton" style="color:white;"> ${shop.properties.link}</a>
        </div>

    </div>  
  `;
}
function onEachFeature(feature, layer) {
    layer.bindPopup(makePopupContent(feature), { closeButton: false, offset: L.point(0, -8) });
}

//Shop Marker//
var myIcon = L.icon({
    iconUrl: '../img/markerrr.png',
    iconSize: [50, 50]
});

//mapping geoJSON//
const shopsLayer = L.geoJSON(storeList, {
    onEachFeature: onEachFeature,
    pointToLayer: function(feature, latlng) {
        return L.marker(latlng, { icon: myIcon });
    }
});
shopsLayer.addTo(myMap);

//animation//
function flyToStore(store) {
    const lat = store.geometry.coordinates[1];
    const lng = store.geometry.coordinates[0];
    myMap.flyTo([lat, lng], 18, {
        duration: 3
    });
    setTimeout(() => {
        L.popup({closeButton: false, offset: L.point(0, -8)})
        .setLatLng([lat, lng])
        .setContent(makePopupContent(store))
        .openOn(myMap);
    }, 3000);
}

</script>


  <script type="text/javascript">
        function search_animal() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('shop-item');
      
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


<style type="text/css">
.myButton {
  box-shadow: none;
  background-color: #03a9f4;
  color: #fff;
  border-radius: 25px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  letter-spacing: 1.3px;
  border-radius:6px;
  display:inline-block;
  cursor:pointer;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none; 

    }

    .leaflet-top  {
    margin-top: 20px;
}

.leaflet-top .leaflet-control {
    margin-top: 30px; 
}
</style>


</body>
</html>
