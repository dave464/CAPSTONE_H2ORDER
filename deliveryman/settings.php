<?php
require 'validate.php';
require '../connection.php';

if (count($_POST) > 0) {
  $np= $_POST['np'];
  $result = mysqli_query($conn, "SELECT *from deliveryman WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'");
  $row = mysqli_fetch_array($result);
  if ($_POST["op"] == $row["password"]) {
      $conn->query("UPDATE `deliveryman` SET `password` = '$np' WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'" ) or die(mysqli_error());
                  echo ("<script>
                    alert('Your password has been changed successfully');
                    </script>");
  } else
          echo ("<script>
                alert('Current Password is not correct');
                </script>");
      //$message = "Current Password is not correct";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Settings</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        
    </head>


    <body style="background-color: white" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">EDIT PROFILE
      </p>
       

      <?php
            $query = $conn->query("SELECT * FROM `deliveryman` WHERE `deliveryman_id` = '$_SESSION[deliveryman_id]'") or die(mysqli_error());
            $fetch = $query->fetch_array();
          ?>  


  
<div class="vh-200" style="" >
  <div class="container h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Personal Information</p>

                <form class="mx-1 mx-md-4" action="action.php?deliveryman_id=<?php echo $fetch['deliveryman_id']?>" method="POST" enctype="multipart/form-data">

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Username</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="username" value="<?php echo $fetch['username']?>" id="form3Example1c" class="form-control" placeholder="Username" />
  
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Full Name</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="name" value="<?php echo $fetch['name']?>" id="form3Example3c" class="form-control" placeholder="Business Name"/>

                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Plate Number</label>
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="plate_number" value="<?php echo $fetch['plate_number']?>" id="form3Example3c" class="form-control" placeholder="Address"/>
          
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

                <img src="../img/watacc.png" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

<div class="vh-200" >
  <div class="container h-200">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Vaccination Status</p>

                <form class="mx-1 mx-md-4" action="action.php?deliveryman_id=<?php echo $fetch['deliveryman_id']?>" method="POST" enctype="multipart/form-data">

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Current Status</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-syringe fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select class = "form-select" required = required name = "vaccination_status">
                        <option value = "">Choose an option</option>
                        <option value = "Unvaccinated" 
                          <?php if($fetch['vaccination_status'] == "Unvaccinated"){echo "selected";}?>>Unvaccinated
                        </option>
                        <option value = "Partially Vaccinated" 
                          <?php if($fetch['vaccination_status'] == "Partially Vaccinated"){echo "selected";}?>>Partially Vaccinated
                        </option>
                        <option value = "Fully Vaccinated" 
                          <?php if($fetch['vaccination_status'] == "Fully Vaccinated"){echo "selected";}?>>Fully Vaccinated
                        </option>
                        <option value = "Boosted"
                           <?php if($fetch['vaccination_status'] == "Boosted"){echo "selected";}?>>Boosted
                        </option>
                      </select>

  
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2" style="margin-top: 15px">
                     <i class="fas fa-cloud-upload-alt fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"> Upload your vaccination card here</a>
                    </div>
                  </div>

                
                  <br>
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button style="width:250px; " type="submit" name="editVacstat" class="btn btn-primary btn-lg">Save Changes</button>
                  </div>
                  </form>


              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/vacci.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
          <form class="mx-1 mx-md-4" action="action.php?deliveryman_id=<?php echo $fetch['deliveryman_id']?>"
                 method="POST" enctype="multipart/form-data">
      <!-- Modal Header -->
      <div class="modal-header">
        <i class="fas fa-cloud-upload-alt fa-lg me-3 fa-fw"></i>
        <h4 class="modal-title">Upload Files</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     
        <input type="file" class="form-control" id="customFile" name="photo" />

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" name="editVcard" class="btn btn-primary btn-sm" 
            style="padding:5px; width: 80px;margin-left:372px">Save
        </button>
      </div>
          </form>
    </div>
  </div>
</div>



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