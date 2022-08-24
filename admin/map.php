<!DOCTYPE html>
<?php
    require_once 'validate.php';
    require 'name.php';
?>

<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Table</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
           <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/map.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand ms-4" href="adminhome.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo.png" style="height: 60px; margin-top: 15px; margin-left:-20px" alt="homepage" class="dark-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/H3.png" style="width: 150px; margin-left: -10px;margin-top:-10px" alt="homepage" class="dark-logo" />

                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-lg-none d-md-block ">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white "
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto mt-md-0 ">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <li class="nav-item search-box">
                            <a class="nav-link text-muted" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                    </ul>

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src = "photo/<?php echo $fetch['photo']?>" alt="user" class="profile-pic me-2">
                                <?php echo $fetch['name']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                  <?php include 'navbar.php' ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <div class="sidebar-footer">
                <div class="row">
                    <div class="col-4 link-wrap">
                        <!-- item-->
                        <a href="logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                       
                    </div>
                    <div class="col-4 link-wrap" style="margin-left:-50px; margin-top: 3px">
                          Logout                    
                    </div>                   
                </div>
            </div>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Map</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Map</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <?php 
                    $sql = "SELECT * FROM `merchant` WHERE status = 'approved' ORDER BY business_name asc ";

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
                                        "link"=>['Buy Now'],
                                        "merchant_id"=>$row['merchant_id']            
                                    ];

                    $saveJson["geometry"]=[
                                         "type"=> "Point",
                                        "coordinates" => [$row['longitude'],$row['latitude']  ],
                                     ];

                     $storeList[]= $saveJson;

                    }
                     
                    ?>

               
<!---MAP--->
    <main>
        <div id="mySidepanel" class="store-list">
           
            <div class="heading">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                <i class="fas fa-times fa-lg me-3 fa-fw" style="color: black; float: right;font-size: 20px;" ></i> </a>
                <h4 style=" letter-spacing: 1.3px; margin-left:10px;font-weight: 550">Waterstation</h4>
            </div>

                  <input id="searchbar" onkeyup="search_animal()" type="search"
                name="search" placeholder="Search" style="margin-left: 16px; width:230px; height: 28px"> 

                  <button type="button" class="btn btn-sm btn-primary" style="margin-left: -4.5px;">
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
 





            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2022 H2ORDER</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>


     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 


    <style>
    body {
      font-family: "poppins", sans-serif;
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


    <script>
    function openNav() {
      document.getElementById("mySidepanel").style.width = "40%";
    }

    function closeNav() {
      document.getElementById("mySidepanel").style.width = "0";
    }
    </script>




    <script type="text/javascript"> 

    //geojson
    var storeList = <?php echo json_encode($storeList,JSON_PRETTY_PRINT) ?>;

    //Map
    var myMap = L.map('map').setView([14.0734578,120.6322736], 12);

    /*===================================================
                          Tile Layers              
    ===================================================*/

    // Google Map Layer
    const googleUrl='http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}';
    const googleMap= '&copy; <a https://www.google.com/maps/copyright">OpenStreetMap</a> contributors\'';
    googleStreets = L.tileLayer(googleUrl,{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'],
       attribution: '&copy; <a href="http://www.google.com/maps/copyright">GoogleMap</a>'
     });
     googleStreets.addTo(myMap);

     
     // Satelite Layer
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
       maxZoom: 20,
       subdomains:['mt0','mt1','mt2','mt3'],
       attribution: '&copy; <a href="http://www.google.com/maps/copyright">GoogleMap</a>'
     });
    googleSat.addTo(myMap);


    const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

    const tileLayer = L.tileLayer(tileUrl,{
     maxZoom: 20 ,
     attribution:'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors\''
    });
    tileLayer.addTo(myMap);


    /*===================================================
                          LAYER CONTROL               
    ===================================================*/

    var baseLayers = {
      "OpenStreetMap": tileLayer ,
      "Satellite":googleSat, 
       "Google Map":googleStreets , 
      
    };

    L.control.layers(baseLayers).addTo(myMap);


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
              
            </div>

        </div>  
      `;
    }
    function onEachFeature(feature, layer) {
        layer.bindPopup(makePopupContent(feature), { closeButton: false, offset: L.point(0, -8) });
    }

    //Shop Marker//
    var myIcon = L.icon({
        iconUrl: 'assets/images/markerrr.png',
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
        myMap.flyTo([lat, lng], 20, {
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