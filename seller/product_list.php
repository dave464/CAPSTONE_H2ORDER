<?php
require 'validate.php';
include '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
      
    <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">PRODUCT LIST
      </p>

<!--------- SECTION Start-------->
<section >
  <div class="container py-5">
    <div class="row">


      <?php
       $query = $conn->query("SELECT product.product_id,product.image,product.product_name,
        product.price,product.product_type, merchant.merchant_id, merchant.business_name, product.volume
          FROM merchant RIGHT JOIN product ON merchant.merchant_id = product.merchant_id WHERE  product.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());

              while($fetch = $query->fetch_array()){
                  $std_num= 0;
                  $counter =0;
                $productId = $fetch['product_id'];
                $query2 = $conn->query("SELECT product_rating.rating
                FROM product_rating WHERE product_rating.product_id = $productId");

                while($fetch2 = $query2->fetch_array()){

                  $std_num += $fetch2['rating'];
                  $counter++;
                }
                if($std_num > 0) {
                  $average = $std_num / $counter;

                }
                else {
                  $average = 0;
                }
                
                $merchantId = $fetch['merchant_id'];
                $query3 = $conn->query("SELECT inspection.inspection_id, inspection.date, 
                                               inspection.date,inspection.status,inspection.merchant_id
                                                 FROM inspection                                                
                                                  WHERE inspection.merchant_id = $merchantId ");
 
                 while($fetch3 = $query3->fetch_array()){
                   $bad=$merchantId;
                   $dav=$fetch3['status'];
                   
                 }
      ?>

            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0"><?php echo $fetch['business_name']?>'s Offer</p>
            <a href="#!">
              <div class="mask">
                <div class="d-flex justify-content-start align-items-end h-100">
                  <?php 
                        if ($fetch['merchant_id']==$bad && $dav=='Passed') {
                                  echo '<img src="../img/badge.png " style="height:93px; width:93px;
                                        float:right; margin-right: -18px"/>';
                              }else{
                                echo '';
                              }
                        ?>
                </div>
              </div>
              <div class="hover-overlay">
                <div
                  class="mask"
                  style="background-color: rgba(251, 251, 251, 0.15);"
                ></div>
              </div>
            </a>
          </div>

          <img src = "../photo/<?php echo $fetch['image']?>" 
          onclick="window.location='product_view.php?product_id=<?php echo $fetch['product_id']?>'"
           class="card-img-top"/>

          <div class="card-body">

            <div class="d-flex justify-content-between">
              <p class="small"><?php echo $fetch['product_type']?></p>

            </div>


            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0"><?php echo $fetch['product_name']?>  <?php echo $fetch['volume']?></h5>
              <h5 class="text-dark mb-0">&#8369; <?php echo $fetch['price']?>.00</h5>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0">Rating:  <p class="text-dark mb-0">
                <?php if($average==0) {
                echo 'No Rating';
              } else{
                echo round($average,2);
                echo ' out of 5.00 &nbsp';
                
                      if($average == 5){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                      }else if($average <5  && $average >4 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;"></i>';
                      }else if($average == 4 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                      }else if($average <4  && $average >3 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';       
                      }else if($average == 3 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                      }else if($average <3  && $average >2 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';       
                      }else if($average == 2 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                      }else if($average <2  && $average >1 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;"></i>';                    
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';       
                      }else if($average == 1 ){
                        echo '<i class="fa fa-star" style="color:yellow;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;"></i>';
                      }


                } ?></p> 
              </p>
              

        </div>

        <a onclick="window.location='review.php?product_id=<?php echo $fetch['product_id']?>'"   
          style="width: 65%; margin-top: 50px; float: left;"
          class="btn btn-primary">Ratings and Reviews</a>

          <a onclick="window.location='update_product.php?product_id=<?php echo $fetch['product_id']?>'"   
          style="  float: right;width:50px; margin-right: 60px; margin-top:50px"
          class="btn btn-warning"><i class="fas fa-edit" style="color:white"></i></a>

          <a href="delete_product.php?product_id=<?php echo $fetch['product_id']?>"
           onclick = "confirmationDelete(this); return false;"   
          style="  float: right;width:50px; margin-top:-59px"
          class="btn btn-danger"><i class="fas fa-trash"></i></a>


          </div>
        </div>
      </div>

 <?php
       }
    ?>


        </div>
      </div>
    </div>
  </div>
</section>
<!--------- SECTION END-------->

  

    </body>
</html>

<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}
</style>

<script type = "text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to delete this product?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>