<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Deliveryman</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body style="background-color: white"  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
        
      <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">DELIVERYMAN REGISTRATION
      </p>


      <div class="vh-200" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
               
                <?php  
                    $query = $conn->query("SELECT deliveryman.deliveryman_id, deliveryman.name, deliveryman.contact_number,
                    deliveryman.plate_number, deliveryman.username, deliveryman.password, merchant.merchant_id
                    FROM merchant RIGHT JOIN deliveryman ON merchant.merchant_id = deliveryman.merchant_id WHERE  deliveryman.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());
                   $fetch = $query->fetch_array();             
                ?>

                <form class="mx-1 mx-md-4" action="add_query_deliveryman.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" value="<?php echo $_SESSION['merchant_id']?>" name="merchant_id">

                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['name'])) { ?>
                      <input type="text" name="name" id="form3Example3c" class="form-control" placeholder="Fullname" value="<?php echo $_GET['name']; ?>" required = "required"/>
                      <?php }else{ ?>
                     <input type="text" name="name" id="form3Example1c" class="form-control" placeholder="Fullname" required = "required" >
                      <?php }?>
                    </div>
                  </div>

                
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <?php if (isset($_GET['contact_number'])) { ?>
                      <input type="type" name="contact_number" id="form3Example4cd" class="form-control" placeholder="Contact Number" value="<?php echo $_GET['contact_number']; ?>" pattern="^[0-9]+$" maxlength="11" minlength="11" title="Please Enter on Number only"  required = "required" />
                       <?php }else{ ?>
                      <input type="type" name="contact_number" id="form3Example1c" class="form-control" placeholder="Contact Number"
                      pattern="^[0-9]+$" maxlength="11" minlength="11" title="Please Enter on Number only" required = "required">
                      <?php }?>    
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <?php if (isset($_GET['plate_number'])) { ?>
                      <input type="text" name="plate_number" id="form3Example3c" class="form-control" placeholder="Plate Number" value="<?php echo $_GET['plate_number']; ?>" required = "required"/>
                        <?php }else{ ?>
                      <input type="text" name="plate_number" id="form3Example1c" class="form-control" placeholder="Plate Number" required = "required">
                      <?php }?>  
                    </div>
                  </div>


                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['username'])) { ?>
                      <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Username" value="<?php echo $_GET['username']; ?>" required = "required"/> 
                       <?php }else{ ?>
                      <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Username" required = "required">
                      <?php }?>
                    </div>
                  </div>


                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" id="form3Example4c" class="form-control" 
                      placeholder="Password" required = "required"/>
                    </div>
                  </div>
                  
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="c_password" id="form3Example4c" class="form-control" 
                      placeholder="Confirm Password" required = "required"/>
                    </div>
                </div>

                   <div class="form-outline flex-fill mb-0">
                      <input type="hidden" name="status" value="available" id="form3Example4c" class="form-control" />
                    </div>
                
                    <div class="form-outline flex-fill mb-0">
                      <input type="hidden" name="vaccination_status" value="Unvaccinated" id="form3Example4c" class="form-control" />
                    </div>
             
                    <div class="form-outline flex-fill mb-0">
                      <input type="hidden" value="vcard.jpeg" name="photo" id="form3Example4c" class="form-control"/>
                    </div>
              
         <input type="hidden" name="d_latitude" id="d_latitude" class="form-control" placeholder="latitude" />            
         <input type="hidden" name="d_longitude" id="d_longitude" class="form-control" placeholder="longitude" />

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/watDel.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




    </body>
</html>


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

   document.getElementById("d_latitude").value = position.coords.latitude;
    document.getElementById("d_longitude").value = position.coords.longitude;
}
getLocation();
 </script>