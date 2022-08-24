<?php 

require_once '../connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <!-- <body style="background-image:url('../img/bg.jpg');background-size:100% 100%;background-repeat:no-repeat;background-attachment:fixed"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
   

<body>

<div class="vh-200" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Customer Sign up</p>

                <form class="mx-1 mx-md-4" action="customer_signup-check.php" method="POST" enctype="multipart/form-data">

                
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['username'])) { ?>
                      <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="Username" value="<?php echo $_GET['username']; ?>" required = "required"/>
                         <?php }else{ ?>
                     <input type="text" name="username" id="form3Example1c" class="form-control"
                      placeholder="Username"  required = "required">
                      <?php }?>
                    </div>
                  </div>


                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" id="form3Example4c" class="form-control" placeholder="Password" required = "required"
                      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>

                    </div>
                  </div>

                 <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="c_password" id="form3Example4c" class="form-control" placeholder="Confirm Password" required = "required"
                      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>

                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <?php if (isset($_GET['email'])) { ?>
                      <input type="email" name="email" id="form3Example3c" class="form-control" placeholder="Email"  value="<?php echo $_GET['email']; ?>" required = "required"/>
                       <?php }else{ ?>
                      <input type="email" name="email" id="form3Example1c" class="form-control"
                      placeholder="Email">
                      <?php }?>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['firstname'])) { ?>
                      <input type="text" name="firstname" id="form3Example3c" class="form-control" placeholder="First Name" pattern="^[a-zA-Z][a-zA-Z- ]+$" title="Please Enter on Alphabets only"  value="<?php echo $_GET['firstname']; ?>" required = "required"
                      />
                         <?php }else{ ?>
                      <input type="text" name="firstname" id="form3Example1c" class="form-control"
                      placeholder="First Name" pattern="^[a-zA-Z][a-zA-Z- ]+$" title="Please Enter on Alphabets only"  required = "required"  />
                      <?php }?>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['lastname'])) { ?>
                      <input type="text" name="lastname" id="form3Example3c" class="form-control" placeholder="Last Name" pattern="^[a-zA-Z][a-zA-Z- ]+$" title="Please Enter on Alphabets only" value="<?php echo $_GET['lastname']; ?>" required="required"
                      />
                       <?php }else{ ?>
                      <input type="text" name="lastname" id="form3Example1c" class="form-control"
                      placeholder="Last Name" pattern="^[a-zA-Z][a-zA-Z- ]+$" title="Please Enter on Alphabets only" required="required"  />
                      <?php }?>
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-map-marker fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <?php if (isset($_GET['address'])) { ?>
                      <input type="text" name="address" id="form3Example3c" class="form-control" 
                          placeholder="Street/Sitio/Subd (Optional)"
                         value="<?php echo $_GET['address']; ?>" />
                       <?php }else{ ?>
                      <input type="text" name="address" id="form3Example1c" class="form-control" placeholder="Street/Sitio/Subd (Optional)">
                      <?php }?>
                    </div>
                  </div>

                   <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-home fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      
                      <select class = "form-select" required = required name = "barangay">
                        <option value = "">Select Barangay</option>
                        <option value = "Brgy.Aga">Brgy.Aga</option>
                        <option value = "Brgy.Balaytigue">Brgy.Balaytigue</option>
                        <option value = "Brgy.Balok-Balok">Brgy.Balok-Balok</option>
                        <option value = "Brgy.Banilad">Brgy.Banilad</option>
                        <option value = "Brgy.1">Brgy.1</option>
                        <option value = "Brgy.2">Brgy.2</option>
                        <option value = "Brgy.3">Brgy.3</option>
                        <option value = "Brgy.4">Brgy.4</option>
                        <option value = "Brgy.5">Brgy.5</option>
                        <option value = "Brgy.6">Brgy.6</option>
                        <option value = "Brgy.7">Brgy.7</option>
                        <option value = "Brgy.8">Brgy.8</option>
                        <option value = "Brgy.9">Brgy.9</option>
                        <option value = "Brgy.10">Brgy.10</option>
                        <option value = "Brgy.11">Brgy.11</option>
                        <option value = "Brgy.12">Brgy.12</option>
                        <option value = "Brgy.Bilaran">Brgy.Bilaran</option>
                        <option value = "Brgy.Bucana">Brgy.Bucana</option>
                        <option value = "Brgy.Bulihan">Brgy.Bulihan</option>
                        <option value = "Brgy.Bunducan">Brgy.Bunducan</option>
                        <option value = "Brgy.Butucan">Brgy.Butucan</option>
                        <option value = "Brgy.Calayo">Brgy.Calayo</option>
                        <option value = "Brgy.Catandaan">Brgy.Catandaan</option>
                        <option value = "Brgy.Kaylaway">Brgy.Kaylaway</option>
                        <option value = "Brgy.Kayrilaw">Brgy.Kayrilaw</option>
                        <option value = "Brgy.Cogunan">Brgy.Cogunan</option>
                        <option value = "Brgy.Dayap">Brgy.Dayap</option>
                        <option value = "Brgy.Latag">Brgy.Latag</option>
                        <option value = "Brgy.Lumbangan">Brgy.Lumbangan</option>
                        <option value = "Brgy.Malapad Na Bato">Brgy.Malapad Na Bato</option>
                        <option value = "Brgy.Mataas Na Pulo">Brgy.Mataas Na Pulo</option>
                        <option value = "Brgy.Maugat">Brgy.Maugat</option>
                        <option value = "Brgy.Munting Indang">Brgy.Munting Indang</option>
                        <option value = "Brgy.Natipuan">Brgy.Natipuan</option>
                        <option value = "Brgy.Pantalan">Brgy.Pantalan</option>
                        <option value = "Brgy.Papaya">Brgy.Papaya</option>
                        <option value = "Brgy.Putat">Brgy.Putat</option>
                        <option value = "Brgy.Reparo">Brgy.Reparo</option>
                        <option value = "Brgy.Tumalim">Brgy.Tumalim</option>
                        <option value = "Brgy.Utod">Brgy.Utod</option>
                        <option value = "Brgy.Wawa">Brgy.Wawa</option>
                      </select>

                    </div>
                  </div>


                   <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-university fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text"  id="form3Example1c" class="form-control" value="Nasugbu,Batangas" disabled>
                    </div>
                  </div>
                

                
                    <div class="form-outline flex-fill mb-0">                  
                      <input type="hidden" name="c_latitude" id="c_latitude" class="form-control" placeholder="latitude" required = "required"/>
                    </div>
               

                    <div class="form-outline flex-fill mb-0">                  
                      <input type="hidden" name="c_longitude" id="c_longitude" class="form-control" placeholder="longitude" required = "required"/>
                    </div>
                  
                  
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <?php if (isset($_GET['contact_number'])) { ?>
                      <input type="text" name="contact_number" id="form3Example4cd" class="form-control" pattern="^[0-9]+$" maxlength="11" minlength="11" value="<?php echo $_GET['contact_number']; ?>" required = "required"/>
                       <?php }else{ ?>
                      <input type="text" name="contact_number" id="form3Example1c" class="form-control"
                      placeholder="Contact Number" pattern="^[0-9]+$" maxlength="11" minlength="11"  required = "required"/>
                      <?php }?>
                    </div>
                  </div>

<!--- Terms of Agreement -->
  <input type="checkbox" name="checkbox" value="check" id="agree"  value="1"  onclick="terms_changed(this)"/>
  I have read and agree to the 
<!-- Button to Open the Modal -->
<a href="login.php" data-bs-toggle="modal" data-bs-target="#myModal">
  terms and conditions
</a><br><br>

<!--By clicking Register, you agree to our
<a href="login.php" data-bs-toggle="modal" data-bs-target="#myModal">
  Terms and Private Policy 
</a><br><br>-->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
          <h4 class="modal-title">Terms and Conditions &nbsp<i class="fa fa-pencil-square-o" style="font-size: 1em;"></i></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
      <h5>End User Terms & Conditions </h5>
            <p style="font-size:14px;margin-top:15px">Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using <a href="https://h2order.infinityfreeapp.com/">https://h2order.infinityfreeapp.com/</a> and the H2order mobile application ("Service"). You ("Customer") agree to be bound by the terms and conditions listed below. If you don't agree to all of the rules in this agreement, you can't use the Website or any of the services. </p>

         <h5 style="margin-top:20px">Private Policy</h5>
            <p  style="font-size:14px;margin-top:15px">
              The H2order ("we," "us," or "our") is committed to protecting the privacy of all of its users and maintaining the confidentiality of their personal information.
            </p>
             <p  style="font-size:14px;">
              We must adhere to the policy that is set forth below in order to provide you with information on how we collect and process your personal data through your use of our Website and the H2order mobile app (collectively referred to as the "Service").
            </p>
            <p  style="font-size:14px;">
              Please take the time to read this Policy, as well as any other privacy policies or notices regarding fair processing that we may provide to you, so that you can gain an understanding of how and why we handle the data that we have collected about you.
            </p>

          <h5 style="margin-top:20px">1. User Account</h5>
             <p  style="font-size:14px;margin-top:15px">
              &#10148; You must create an account to use the Services. We will collect and process your personal information, such as your name, electronic mail (e-mail) address,  mobile phone number and location when you register to set up an account. You must provide us with an accurate, complete, and latest information and agree to provide us with any proof of identity that we may reasonably request. We will collect, use, disclose and process your personal information in accordance with our Privacy Policy.
            </p>

          <h5 style="margin-top:20px">2. Hygiene and Refills</h5>
             <p  style="font-size:14px;margin-top:15px">
              &#10148; The H2order is not responsible for the health effects of refilling at their business, and they can't or won't be held responsible for the possible or alleged spread of illness outside of the normal rules and guidelines that affect their business, such as hygiene regulations and health and safety laws.
            </p>
            <p  style="font-size:14px;">
              &#10148; The User will keep their reusable bottle as hygienic as possible to avoid any chances of infection or illnesses.
            </p>

          <h5 style="margin-top:20px">3. Product Information & Orders</h5>
             <p  style="font-size:14px;margin-top:15px">
              &#10148; Product defects observed prior to dispatch.
            </p>
            <p  style="font-size:14px;">
              &#10148; We reserve the right to change the pricing of any product at any time without assigning any reason and without any prior notice.
            </p>
            <p  style="font-size:14px;">
              &#10148; You confirm that the product(s) ordered by you are purchased for your personal purpose and not for re-sale.
            </p>
        
          <h5 style="margin-top:20px">4. Ratings and Reviews</h5>
             <p  style="font-size:14px;margin-top:15px">
              &#10148; Ratings and Reviews shown on the app and website are only provided for the information of users only, and existing ratings and reviews are based on information given by customer. We do not verify the rating given and are therefore not responsible for the accuracy of the existing rating, nor do the ratings constitute any endorsement (or otherwise) by us. In no event shall Traveloka be responsible or liable for any claims, losses or liability with respect to the ratings shown on the app and website.
            </p>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"> <!--id=submit_button disabled-->
                    <button type="submit" name="submit" class="btn btn-primary btn-lg"  id=submit_button disabled>Register</button>
                  </div>
                  <div class="text-center fs-6"> <h5 href="#">Already have an account?</h5><a href="index.php">Log in</a> </div>
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/register.webp" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                 


<script>
function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;
    }
}
</script>


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

   document.getElementById("c_latitude").value = position.coords.latitude;
    document.getElementById("c_longitude").value = position.coords.longitude;
}
getLocation();
 </script>