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
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">UPDATE PRODUCT 
      </p>


  <?php  
   $query = $conn->query("SELECT *
    FROM product  WHERE  product_id = '".$_REQUEST['product_id']."'") or die(mysqli_error());
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

                <form class="mx-1 mx-md-4" action="add_query_product.php?product_id=<?php echo $fetch['product_id']?>" method="POST" enctype="multipart/form-data">
                
                
                <p class="text-left h4 fw-bold mb-3 mx-1 mx-md-4 mt-4">Item Information</p>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Product Name</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-tint fa-lg me-3 fa-fw"></i>
                      <input type="type" readonly name="product_name" id="form3Example3c" class="form-control" 
                      placeholder="product_name" required = "required" value="<?php echo $fetch['product_name'] ?>" />
                  </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Product Type</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-hand-holding-droplet fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="type" readonly name="product_type" id="form3Example3c" class="form-control" 
                      placeholder="product_type" required = "required" value="<?php echo $fetch['product_type'] ?>" />
                    </div>
                </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Volume</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-hand-holding-droplet fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <select name="volume" class="form-select" required = "required"  >
                         <option value = "">Choose an option</option>
                         
                         <option value = "350 mL" 
                          <?php if($fetch['volume'] == "350 mL"){echo "selected";}?>>350 mL
                        </option>
                        <option value = "500 mL" 
                          <?php if($fetch['volume'] == "500 mL"){echo "selected";}?>>500 mL
                        </option>
                        <option value = "1 Liter" 
                          <?php if($fetch['volume'] == "1 Liter"){echo "selected";}?>>1 Liter
                        </option>
                        <option value = "6 Liters" 
                          <?php if($fetch['volume'] == "6 Liters"){echo "selected";}?>>6 Liters
                        </option>
                        <option value = "10 Liters" 
                          <?php if($fetch['volume'] == "10 Liters"){echo "selected";}?>>10 Liters
                        </option>
                        <option value = "20 Liters" 
                          <?php if($fetch['volume'] == "20 Liters"){echo "selected";}?>>20 Liters
                        </option>
                      </select>   
                    </div>
                </div>

                <label class="labels" style=" font-size: 11px; margin-left:50px;">Price</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fa-solid fa-tags fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" name="price" id="form3Example3c" class="form-control" 
                      placeholder="₱" required = "required" value="<?php echo $fetch['price'] ?>" />
                    </div>
                  </div>

                  <label class="labels" style=" font-size: 11px; margin-left:50px;">Description</label>
                <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <textarea  name="description" wrap="hard" class="form-control"   >
                      <?php echo $fetch['description'] ?>
                    </textarea> 
                    </div>
                  </div>

                  
                

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="Update" style="width:200px" class="btn btn-primary btn-lg">UPDATE PRODUCT</button>
                  </div>
                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../photo/<?php echo $fetch['image']?>" style="height:500px;width:500px" class="img-fluid" alt="Sample image">

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