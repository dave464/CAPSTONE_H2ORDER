<?php
require 'validate.php';
require '../connection.php';
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Product</title>
        <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>
    <body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
      <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">ADD PRODUCT 
      </p>


  <?php  
   $query = $conn->query("SELECT product.product_id,product.image,product.product_name,
   product.price, merchant.merchant_id
    FROM merchant RIGHT JOIN product ON merchant.merchant_id = product.merchant_id WHERE  product.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());
   $fetch = $query->fetch_array();             
 ?>


         <div class="vh-200" >
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <form class="mx-1 mx-md-4" action="add_query_product.php" method="POST" enctype="multipart/form-data">
                
                <input type="hidden" value="<?php echo $_SESSION['merchant_id']?>" name="merchant_id">
                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Item Information</p>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Product Name</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-tint fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select name="product_name" class="form-select" required = "required"  >
                         <option value = "">Choose an option</option>
                         <option>Slim Container</option>
                         <option>Rounded Container</option>
                         <option>Plastic Bottle</option>
                      </select>  
                    </div>
                  </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Product Type</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-hand-holding-droplet fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select name="product_type" class="form-select" required = "required"  >
                         <option value = "">Choose an option</option>
                         <option>Alkaline Water</option>
                         <option>Distilled Water</option>
                         <option>Mineral Water</option>
                         <option>Purified Water</option>
                      </select>   
                    </div>
                </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Volume</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-hand-holding-droplet fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select name="volume" class="form-select" required = "required"  >
                         <option value = "">Choose an option</option>
                         <option>350 mL</option>
                         <option>500 mL</option>
                         <option>1 Liter</option>
                         <option>6 Liters</option>
                         <option>10 Liters</option>
                         <option>20 Liters</option>
                      </select>   
                    </div>
                </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Price</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-tags fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" name="price" id="form3Example3c" class="form-control" 
                      placeholder="₱" required = "required"/>
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Description</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <textarea required = "required"  name="description" class="form-control" style="height:100px;" placeholder="Description">
                    </textarea> 
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;"></label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-camera fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <input type="file" name="photo" class="email" required="required">
                    </div>
                  </div>
                  
                

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">ADD PRODUCT</button>
                  </div>
                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../img/addPro.jpg" class="img-fluid" alt="Sample image">

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