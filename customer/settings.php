<?php
require 'validate.php';
require '../connection.php';

if (count($_POST) > 0) {
  $np= $_POST['np'];
  $result = mysqli_query($conn, "SELECT *from customer WHERE `customer_id` = '".$_SESSION['customer_id']."'");
  $row = mysqli_fetch_array($result);
  if ($_POST["op"] == $row["password"]) {
      $conn->query("UPDATE `customer` SET `password` = '$np' WHERE `customer_id` = '".$_SESSION['customer_id']."'" ) or die(mysqli_error());
                  echo ("<script>
                    alert('Your password has been changed successfully');
                    </script>");
  } else
                 echo ("<script>
                    alert('Current Password is not correct');
                    </script>");
     // $message = "Current Password is not correct";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Settings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">

        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/esri-leaflet@2.5.0/dist/esri-leaflet.js"></script>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"></script>
 


<style>
#map { height: 460px; }
</style>
  
    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 


    <body >
        
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
  
      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">EDIT PROFILE
      </p>

      
      <?php
            $query = $conn->query("SELECT * FROM `customer` WHERE `customer_id` = '$_SESSION[customer_id]'") or die(mysqli_error());
            $fetch = $query->fetch_array();
          ?>  


  
<div class="vh-200" >
  <div class="container h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" >
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Personal Information</p>

                <form class="mx-1 mx-md-4" action="settings_query.php?customer_id=<?php echo $fetch['customer_id']?>" method="POST" enctype="multipart/form-data">

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Username</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="username" value="<?php echo $fetch['username']?>" id="form3Example1c" class="form-control" placeholder="Username" />
  
                    </div>
                  </div>

                    <label class="labels" style=" font-size: 11px; margin-left:50px;">Email</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" value="<?php echo $fetch['email']?>" id="form3Example3c" class="form-control" placeholder="Email"/>

                    </div>
                  </div>

                     <label class="labels" style=" font-size: 11px; margin-left:50px;">Firstname</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="firstname" value="<?php echo $fetch['firstname']?>" id="form3Example3c" class="form-control" placeholder="First Name"/>

                    </div>
                  </div>

                    <label class="labels" style=" font-size: 11px; margin-left:50px;">Lastname</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="lastname" value="<?php echo $fetch['lastname']?>" id="form3Example3c" class="form-control" placeholder="Last Name"/>

                    </div>
                  </div>

                    <label class="labels" style=" font-size: 11px; margin-left:50px;">Street/Sitio/Subd</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-map-marker fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="address" value="<?php echo $fetch['address']?>" id="form3Example3c" class="form-control" placeholder="Street/Sitio/Subd (Optional)"/>
          
                    </div>
                  </div>


                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Barangay</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-home fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                         <select class = "form-select" required = required name = "barangay">
                        <option value = "">Choose an option</option>
                        <option value = "Brgy.Aga" 
                          <?php if($fetch['barangay'] == "Brgy.Aga"){echo "selected";}?>>Brgy.Aga
                        </option>
                        <option value = "Brgy.Balaytigue" 
                          <?php if($fetch['barangay'] == "Brgy.Balaytigue"){echo "selected";}?>>Brgy.Balaytigue
                        </option>
                        <option value = "Brgy.Balok-Balok" 
                          <?php if($fetch['barangay'] == "Brgy.Balok-Balok"){echo "selected";}?>>Brgy.Balok-Balok
                        </option>
                       <option value = "Brgy.Banilad" 
                          <?php if($fetch['barangay'] == "Brgy.Banilad"){echo "selected";}?>>Brgy.Banilad
                        </option>
                       <option value = "Brgy.1" 
                          <?php if($fetch['barangay'] == "Brgy.1"){echo "selected";}?>>Brgy.1
                        </option>
                       <option value = "Brgy.2" 
                          <?php if($fetch['barangay'] == "Brgy.2"){echo "selected";}?>>Brgy.2
                        </option>
                       <option value = "Brgy.3" 
                          <?php if($fetch['barangay'] == "Brgy.3"){echo "selected";}?>>Brgy.3
                        </option>
                     <option value = "Brgy.4" 
                          <?php if($fetch['barangay'] == "Brgy.4"){echo "selected";}?>>Brgy.4
                        </option>
                       <option value = "Brgy.5" 
                          <?php if($fetch['barangay'] == "Brgy.5"){echo "selected";}?>>Brgy.5
                        </option>
                         <option value = "Brgy.6" 
                          <?php if($fetch['barangay'] == "Brgy.6"){echo "selected";}?>>Brgy.6
                        </option>
                         <option value = "Brgy.7" 
                          <?php if($fetch['barangay'] == "Brgy.7"){echo "selected";}?>>Brgy.7
                        </option>
                         <option value = "Brgy.8" 
                          <?php if($fetch['barangay'] == "Brgy.8"){echo "selected";}?>>Brgy.8
                        </option>
                         <option value = "Brgy.9" 
                          <?php if($fetch['barangay'] == "Brgy.9"){echo "selected";}?>>Brgy.9
                        </option>
                         <option value = "Brgy.10" 
                          <?php if($fetch['barangay'] == "Brgy.10"){echo "selected";}?>>Brgy.10
                        </option> 
                         <option value = "Brgy.11" 
                          <?php if($fetch['barangay'] == "Brgy.11"){echo "selected";}?>>Brgy.11
                        </option>
                         <option value = "Brgy.12" 
                          <?php if($fetch['barangay'] == "Brgy.12"){echo "selected";}?>>Brgy.12
                        </option>
                         <option value = "Brgy.Bilaran" 
                          <?php if($fetch['barangay'] == "Brgy.Bilaran"){echo "selected";}?>>Brgy.Bilaran
                        </option>
                         <option value = "Brgy.Bucana" 
                          <?php if($fetch['barangay'] == "Brgy.Bucana"){echo "selected";}?>>Brgy.Bucana
                        </option>
                         <option value = "Brgy.Bulihan" 
                          <?php if($fetch['barangay'] == "Brgy.Bulihan"){echo "selected";}?>>Brgy.Bulihan
                        </option>
                         <option value = "Brgy.Bunducan" 
                          <?php if($fetch['barangay'] == "Brgy.Bunducan"){echo "selected";}?>>Brgy.Bunducan
                        </option>
                         <option value = "Brgy.Butucan" 
                          <?php if($fetch['barangay'] == "Brgy.Butucan"){echo "selected";}?>>Brgy.Butucan
                        </option>
                         <option value = "Brgy.Calayo" 
                          <?php if($fetch['barangay'] == "Brgy.Calayo"){echo "selected";}?>>Brgy.Calayo
                        </option>
                         <option value = "Brgy.Catandaan" 
                          <?php if($fetch['barangay'] == "Brgy.Catandaan"){echo "selected";}?>>Brgy.Catandaan
                        </option>
                         <option value = "Brgy.Kaylaway" 
                          <?php if($fetch['barangay'] == "Brgy.Kaylaway"){echo "selected";}?>>Brgy.Kalaway
                        </option>
                         <option value = "Brgy.Kayrilaw" 
                          <?php if($fetch['barangay'] == "Brgy.Kayrilaw"){echo "selected";}?>>Brgy.Kayrilaw
                        </option>
                         <option value = "Brgy.Cogunan" 
                          <?php if($fetch['barangay'] == "Brgy.Cogunan"){echo "selected";}?>>Brgy.Cogunan
                        </option>
                         <option value = "Brgy.Dayap" 
                          <?php if($fetch['barangay'] == "Brgy.Dayap"){echo "selected";}?>>Brgy.Dayap
                        </option>
                         <option value = "Brgy.Latag" 
                          <?php if($fetch['barangay'] == "Brgy.Latag"){echo "selected";}?>>Brgy.Latag
                        </option>
                         <option value = "Brgy.Looc" 
                          <?php if($fetch['barangay'] == "Brgy.Looc"){echo "selected";}?>>Brgy.Looc
                        </option>
                         <option value = "Brgy.Lumbangan" 
                          <?php if($fetch['barangay'] == "Brgy.Lumbangan"){echo "selected";}?>>Brgy.Lumbangan
                        </option>
                         <option value = "Brgy.Malapad Na Bato" 
                          <?php if($fetch['barangay'] == "Brgy.Malapad Na Bato"){echo "selected";}?>>Brgy.Malapad Na Bato
                        </option>
                       <option value = "Brgy.Mataas Na Pulo" 
                          <?php if($fetch['barangay'] == "Brgy.Mataas Na Pulo"){echo "selected";}?>>Brgy.Mataas Na Pulo
                        </option>
                        <option value = "Brgy.Maugat" 
                          <?php if($fetch['barangay'] == "Brgy.Maugat"){echo "selected";}?>>Brgy.Maugat
                        </option>
                        <option value = "Brgy.Munting Indang" 
                          <?php if($fetch['barangay'] == "Brgy.Munting Indang"){echo "selected";}?>>Brgy.Munting Indang
                        </option>
                        <option value = "Brgy.Natipuan" 
                          <?php if($fetch['barangay'] == "Brgy.Natipuan"){echo "selected";}?>>Brgy.Natipuan
                        </option>
                        <option value = "Brgy.Pantalan" 
                          <?php if($fetch['barangay'] == "Brgy.Pantalan"){echo "selected";}?>>Brgy.Pantalan
                        </option>
                        <option value = "Brgy.Papaya" 
                          <?php if($fetch['barangay'] == "Brgy.Papaya"){echo "selected";}?>>Brgy.Papaya
                        </option>
                        <option value = "Brgy.Putat" 
                          <?php if($fetch['barangay'] == "Brgy.Putat"){echo "selected";}?>>Brgy.Putat
                        </option>
                        <option value = "Brgy.Reparo" 
                          <?php if($fetch['barangay'] == "Brgy.Reparo"){echo "selected";}?>>Brgy.Reparo
                        </option>
                        <option value = "Brgy.Talangan" 
                          <?php if($fetch['barangay'] == "Brgy.Talangan"){echo "selected";}?>>Brgy.Talangan
                        </option>
                        <option value = "Brgy.Tumalim" 
                          <?php if($fetch['barangay'] == "Brgy.Tumalim"){echo "selected";}?>>Brgy.Tumalim
                        </option>
                        <option value = "Brgy.Utod" 
                          <?php if($fetch['barangay'] == "Brgy.Utod"){echo "selected";}?>>Brgy.Utod
                        </option>
                        <option value = "Brgy.Wawa" 
                          <?php if($fetch['barangay'] == "Brgy.Wawa"){echo "selected";}?>>Brgy.Wawa
                        </option>
                      </select>
          
                    </div>
                  </div>


                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Municipality</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-university fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="municipality" value="Nasugbu,Batangas" id="form3Example3c" class="form-control" disabled />
          
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Phone</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="contact_number" value="<?php echo $fetch['contact_number']?>" id="form3Example4cd" class="form-control" placeholder="Phone" />
      
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button style="width:250px;" type="submit" name="editProfile" class="btn btn-primary btn-lg">Save Changes</button>
                  </div>
                  </form>
<hr style="color:black;">
<p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Change Password</p>

            <form name="frmChange" class="mx-1 mx-md-4" method="POST" onSubmit="return validatePassword()" enctype="multipart/form-data">
            <div class="message" style="color: red;"><?php if(isset($message)) { echo $message; } ?></div>
                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Current Password</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password" name="op" class="form-control" placeholder="Current Password"/>
                      <span id="currentPassword"  id="op" class="required"></span>
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">New Password</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password" name="np"  class="form-control" placeholder="New Password"/>
                      <span id="currentPassword" id="np" class="required"></span>
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Confirm Password</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input required type="password"  id="c_np" class="form-control" placeholder="Confirm Password"/>
                      <span id="currentPassword" name="c_np" class="required"></span>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button style="width:250px;" type="submit" name="submit" class="btn btn-primary btn-lg">Update Password</button>
                  </div>
                </form>

              </div>

              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/accset.webp" class="img-fluid" alt="Sample image">

              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                 


              
<div class="vh-200" >
  <div class="container h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" >
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Pin Location</p>
                  <form class="mx-1 mx-md-4" action="settings_query.php?customer_id=<?php echo $fetch['customer_id']?>" method="POST" enctype="multipart/form-data">

                       <label class="labels" style=" font-size: 11px; margin-left:50px;">Latitude</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-map-marked-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="lat" value="<?php echo $fetch['c_latitude']?>" id="latitude" class="form-control" placeholder="latitude" readonly/>
                    </div>
                  </div>

                       <label class="labels" style=" font-size: 11px; margin-left:50px;">Longitude</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-map-marked-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="long" value="<?php echo $fetch['c_longitude']?>" id="longitude" class="form-control" placeholder="longitude" readonly/>
                    </div>
                  </div>

                <!--   <div class="form-group">
                      <label for="latitude">Latitude:</label>
                       &nbsp&nbsp&nbsp<input id="latitude" type="text" name="lat" value="<?php echo $fetch['c_latitude']?>" readonly="" required="" />
                   </div>

                    <div class="form-outline flex-fill mb-0" style="margin-top: 10px">
                      <label for="longitude">Longitude:</label>
                      <input id="longitude" type="text" name="long" class="form-group" value="<?php echo $fetch['c_longitude']?>" readonly="" required="" />
                    </div> -->

                    <div class="form-group">  
                      <input id="address" type="hidden" name="address" readonly="" required="" />
                    </div>

                   <div  style="margin-top: 20px; margin-left:0px">
                          <button style="width:270px;" type="submit" name="Uplocation" class="btn btn-primary btn-sm">Update Location</button>
                    </div>
                  </form>

              </div>

              <div class="col-md-10 col-lg-6 col-xl-7  order-1 order-lg-2">
                 <div id="map" class="img-fluid" ></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   <br>         
  


    </body>
</html>

<script>
  function validatePassword() {
  var currentPassword,newPassword,confirmPassword,output = true;

  currentPassword = document.frmChange.op;
  newPassword = document.frmChange.np;
  confirmPassword = document.frmChange.c_np;

  if(!currentPassword.value) {
  currentPassword.focus();
  document.getElementById("op").innerHTML = "required";
  output = false;
  }
  else if(!newPassword.value) {
  newPassword.focus();
  document.getElementById("np").innerHTML = "required";
  output = false;
  }
  else if(!confirmPassword.value) {
  confirmPassword.focus();
  document.getElementById("c_np").innerHTML = "required";
  output = false;
  }
  if(newPassword.value != confirmPassword.value) {
  newPassword.value="";
  confirmPassword.value="";
  newPassword.focus();
  document.getElementById("c_np").innerHTML = "not same";
  output = false;
  alert('The confirmation password does not match');
  } 	
  return output;
  }
</script>


<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}
</style>



<script>
var rememberLat = document.getElementById('latitude').value;
var rememberLong = document.getElementById('longitude').value;
var add=document.getElementById('address').value;

if( !rememberLat || !rememberLong ) {
 rememberLat = 14.07325895738352;
 rememberLong = 120.6353384256363;
}

var map = L.map('map').setView([14.07325895738352,120.6353384256363],13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);



  var searchControl = L.esri.Geocoding.geosearch({
    position: 'topright',
    placeholder: 'Enter an address or place e.g. 1 York St',
    useMapBounds: false,
    providers: [L.esri.Geocoding.arcgisOnlineProvider({
      
      nearby: {
        lat: 14.07325895738352,
        lng: 120.6353384256363
      }
    })]
  }).addTo(map);

  var results = L.layerGroup().addTo(map);

  searchControl.on('results', function (data) {
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
    }
  });


var gcs = L.esri.Geocoding.geocodeService();
map.on('click', (e)=>{
gcs.reverse().latlng(e.latlng).run((err, res)=>{
if(err) return;
//alert(res.address.Match_addr);
document.getElementById('address').value = res.address.Match_addr;
//L.marker(res.latlng).bindPopup(res.address.Match_addr).openPopup();
});
});

var myIcon = L.icon({
iconUrl: '../img/red.png',
iconSize: [20, 29],

});


var marker = L.marker([rememberLat, rememberLong],{
draggable: true,
icon: myIcon
}).addTo(map);

marker.on('dragend', function (e) {
  updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
});

map.on('click', function (e) {
marker.setLatLng(e.latlng);
  updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
});

function updateLatLng(lat,lng,reverse) {
if(reverse) {
  marker.setLatLng([lat,lng]);
  map.panTo([lat,lng]);
} else {
  document.getElementById('latitude').value = marker.getLatLng().lat;
  document.getElementById('longitude').value = marker.getLatLng().lng;
map.panTo([lat,lng]);
}
}
</script>
