<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    </head>

    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  
     
    <!-- Navbar-->
    <?php include 'navbar.php' ?>
   
    <?php
      $query = $conn->query("SELECT * FROM `product` WHERE `product_id` = '$_REQUEST[product_id]'") or die(mysqli_error());
      $fetch = $query->fetch_array();
    ?>
       
       <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
       style="color:#004aad;text-shadow: 1px 1px #03a9f4;"><?php echo $fetch['product_name']?> - &#8369; <?php echo $fetch['price']?>.00
       </p>   


<!--------- SECTION Start-------->
<center><section  style="margin-top:-30px;">
  <div class="container py-5">


    <?php  
      $query = $conn->query("SELECT product.product_id,product.image,product.product_name,
      product.price,product.product_type,product.volume, merchant.merchant_id, merchant.business_name
      FROM merchant RIGHT JOIN product ON merchant.merchant_id = product.merchant_id WHERE  product_id = '".$_REQUEST['product_id']."'") or die(mysqli_error());
    ?>

<form action="addcart.php" method="POST" enctype="multipart/form-data" >
   <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
   <input type="hidden" value="<?php echo $_SESSION['customer_id']?>" name="customer_id">
          
   
     <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          
          <img src = "../photo/<?php echo $fetch['image']?>" 
          onclick="window.location='product_view.php?product_id=<?php echo $fetch['product_id']?>'"
           class="card-img-top"/>
           
          <div class="card-body">
          
            <div class="d-flex justify-content-between">
              <p class="small"><?php echo $fetch['product_type']?> <?php echo $fetch['volume']?></p>
             
            </div>
                

            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0"><?php echo $fetch['product_name']?></h5>
              <h5 class="text-dark mb-0">&#8369; <?php echo $fetch['price']?>.00</h5>
            </div>

            <hr style="background-color: black">
           <!--  <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0">Rating: </p>
             <div class="ms-auto text-warning">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>-->

            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0">Description: <?php echo $fetch['description']?></h5>
              
            </div><br>

            <div class="d-flex justify-content-center align-items-center  mb-3">
              
            <!--<center><br>Enter Quantity:<br><span style="font-size:100%;color:#CCCC00;margin:20px">
            <input type="number" name="number_of_items" class="email" id="number" min="1" pattern="[1-9]*"
            style="text-align:center"></span></center>-->

            <input id="slider" name="number_of_items" type="range" value=0 
             min="0" max="25"  onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)">
            <label for="slider" id="rangeValue">0</label>
              
            </div>
            
            <center><button type="submit" name="submit" onclick="addcart();" class="btn btn-primary btn-lg ">
            <i class="fas fa-cart-plus"></i> Add to Cart</button><br>
          
          </div>
        </div>
      </div>
            
 
     
        </div>
      </div>
      </form>
  </div>
</section>
<!--------- SECTION END-------->    

   <script>
    function addcart() {
      var number = document.getElementById("slider").value;
      
      if(number=="") {
        alert("Please enter quantity first");
      }

      if(number<="0") {
        alert("Value be must greater than or equal to 1");
      }

      
    }
    


    </script>
    
 

     <script type="text/javascript">
          function rangeSlide(value) {
              document.getElementById('rangeValue').innerHTML = value;
          }
      </script>

    </body>
</html>



<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;

}

.btn {
  width: 200px;
  border-radius: 6px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  margin-top:30px;
  background:linear-gradient(to bottom,	 #2196F3 5%, #0d6edf 100%);
}
.btn:hover {
  background:linear-gradient(to bottom, #0d6edf 5%, #2196F3 100%);
}


input[type="range"] {
  -webkit-appearance: none;
  background: transparent;
  width: 90%;
  max-width: 400px;
  outline: none;
}
input[type="range"]:focus,
input[type="range"]:active,
input[type="range"]::-moz-focus-inner,
input[type="range"]::-moz-focus-outer {
  border: 0;
  outline: none;
}
input[type="range"]::-moz-range-thumb {
  border: none;
  height: 50px;
  width: 50px;
  background-color: transparent;
  background-image: url("../img/gall.png");
  background-position: 0 0;
  background-size: cover;
 
  cursor: pointer;
}
input[type="range"]::-moz-range-thumb:active {
  background-position: 100% 0px;
  
}
input[type="range"]::-moz-range-track {
  width: 100%;
  height: 20px;
  background: #eee;
  border-radius: 10px;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
  cursor: pointer;
}
input[type="range"]::-moz-range-progress {
  height: 20px;
  background: #4685d7;
  border-radius: 10px;
  cursor: pointer;
}
input[type="range"]::-webkit-slider-thumb {
  border: none;
  height: 60px;
  width: 60px;
  background-color: transparent;
  background-image: url("../img/gall.png");
  background-position: 0 0;
  background-size: cover;

  cursor: pointer;
  margin-top: -23px;
  -webkit-appearance: none;
}
input[type="range"]::-webkit-slider-thumb:active {
  background-position: 100% 0px;
 
}
input[type="range"]::-webkit-slider-runnable-track {
  width: 100%;
  height: 20px;
  background: #eee;
  border-radius: 10px;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
  cursor: pointer;
  -webkit-appearance: none;
}
label {
  background: #eee;
  border-radius: 50%;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.4);
  padding: 14px;
  margin-left: 10px;
  font-family: Roboto, 'Helvetica Neue', Arial;
  font-size: 20px;
  width: 60px;
  text-align: center;
  color: #2968bb;
  font-weight: bold;
  content: '';
}



</style>
