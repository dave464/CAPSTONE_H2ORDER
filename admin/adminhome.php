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
    <title>Home</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Google chart Link -->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript" src="../seller/Chart.min.js"></script>
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
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
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
<?php 
    $q_wstation = $conn->query("SELECT COUNT(merchant_id) as total FROM `merchant` WHERE status ='approved' ") or die(mysqli_error());
    $f_wstation = $q_wstation->fetch_array(); 

    $q_pending = $conn->query("SELECT COUNT(merchant_id) as total FROM `merchant` WHERE status ='pending' ") or die(mysqli_error());
    $f_pending = $q_pending->fetch_array(); 


 $q_pass = $conn->query("SELECT COUNT(merchant.merchant_id) as total, inspection.inspection_id, merchant.business_name,
                                                          inspection.date,inspection.status 
                                                 FROM merchant
                                                 RIGHT JOIN inspection
                                                 ON merchant.merchant_id = inspection.merchant_id 
                                                 WHERE inspection.date > DATE_SUB(CURDATE(), INTERVAL 6 MONTH)") or die(mysqli_error());
    $f_pass = $q_pass->fetch_array(); 
 ?>

                   <div class="col-xl-3 col-sm-4 col-4 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                              <div class="align-self-center">
                                <i class="fas fa-store text-info fa-4x"></i>
                              </div>
                              <div class="text-end">
                                <h1> <?php echo $f_wstation['total']?></h1>
                                <p class="mb-0">Water Refilling Station</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                     <div class="col-xl-3 col-sm-4 col-4 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                              <div class="align-self-center">
                                <i class="fas fa-spinner fa-spin text-info fa-4x"></i>
                              </div>
                              <div class="text-end">
                                <h1> <?php echo $f_pending['total']?>
                                    
                                </h1>
                                <p class="mb-0">Waiting for Approval</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-3 col-sm-4 col-4 mb-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between px-md-1">
                              <div class="align-self-center">
                                <i class="fas fa-user-check  text-info fa-4x"></i>
                              </div>
                              <div class="text-end">
                                <h1> <?php echo $f_pass['total']?>
                                    
                                </h1>
                                <p class="mb-0">Certified by Alpha Lab</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                               
       
       <canvas id="bar-chart" width="800" height="450"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->

<?php

$brgy = mysqli_query($conn," SELECT barangay, merchant_id FROM merchant        
                WHERE status = 'approved'   
                GROUP BY barangay
                ORDER BY length(barangay) ,barangay   ");

$c_brgy = mysqli_query($conn," SELECT COUNT(barangay) ,barangay, merchant_id FROM merchant
                WHERE status = 'approved'         
                GROUP BY barangay
                ORDER BY  length(barangay) ,barangay ");

?>

       <script type="text/javascript">
           new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [<?php while ($fetch3 = mysqli_fetch_array($brgy)) {
                    echo '"' . $fetch3['barangay'] . '",';
            } ?> ],
      datasets: [
        {
          label: "Total Water Refilling Station",
          backgroundColor: ['#0382ff','#50a8ff','#77bbff','#9fcfff','#13c3ef','#38ccf1','#6fdaf5','#a6e8f9',
                   '#00b300','#008000','#009a00','#00b300','#a2d142','#aad552','#b1d961','#b9dc71',
                   '#ffff00','#ffff4e','#ffff62','#ffff76','#ff9507','#ff9d1b','#ffa62e','#ffae42',
                   '#ffac14','#ffb327','#ffba3b','#ffc14e','#ff5314','#ff6227','#ff703b','#ff7e4e',
                   '#d80000','#ff1414','#ff2727','#ff3b3b','#820e57','#991066','#b01376','#c71585',
                   '#800080','#9a009a','#b300b3','#cd00cd','#8a2be2','#9641e5','#a257e8','#bb84ee'],
          data: [<?php while ($fetch4 = mysqli_fetch_array($c_brgy)) {
                    echo '"' .$fetch4['COUNT(barangay)'] . '" ,';
            } ?>]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Total Water Refilling Station in Nasugbu,Batangas'
      },
      scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
      }
    }
});
       </script>        

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2022 H2ORDER </a>
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/plugins/d3/d3.min.js"></script>
    <script src="assets/plugins/c3-master/c3.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script src="js/custom.js"></script>

   
</body>

</html>