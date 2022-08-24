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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>

      <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-4 mt-4"
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">RATING AND REVIEWS
      </p>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!-- http://www.jquery2dotnet.com/ -->
 <center>
  <div class="container" style="margin-top: 30px">
    <div class="row">
      <?php
       $query = $conn->query("SELECT product.product_id,product.image,product.product_name,
        product.price,product.product_type, merchant.merchant_id, merchant.business_name
          FROM merchant RIGHT JOIN product ON merchant.merchant_id = product.merchant_id WHERE  product_id = '".$_REQUEST['product_id']."'") or die(mysqli_error());

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

      ?>

        <div class="col-xs-12 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-xs-12 col-md-6 text-center">
                        <h1 class="rating-num">
                             <?php if($average==0) {
                                  echo '<h2>No Rating</h2>';
                                    } else{
                                        echo round($average,2);
                                            } ?></h1>
                        <div class="rating">
        
                              <?php if($average==0) {
              
              } else{
               
                
                      if($average == 5){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                      }else if($average <5  && $average >4 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;font-size: 18px;"></i>';
                      }else if($average == 4 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                      }else if($average <4  && $average >3 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';       
                      }else if($average == 3 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                      }else if($average <3  && $average >2 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';       
                      }else if($average == 2 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                      }else if($average <2  && $average >1 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star-half-alt" style="color:yellow;"></i>';                    
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';       
                      }else if($average == 1 ){
                        echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                        echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                      }


                } ?>

                        </div>
                        <div>
                            <span class="glyphicon glyphicon-user"></span><?php echo $counter?> total    
                        </div>

                    </div>

                     <?php
                          /*=============================== QUERIES FOR TOTAL NUMBER PER STAR ========================================*/
                         $q_5 = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.rating = '5' && product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_5 = $q_5->fetch_array();

                         $q_4 = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.rating = '4' && product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_4 = $q_4->fetch_array();  

                         $q_3 = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.rating = '3' && product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_3 = $q_3->fetch_array();  

                         $q_2 = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.rating = '2' && product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_2 = $q_2->fetch_array();  

                         $q_1 = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.rating = '1' && product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_1 = $q_1->fetch_array();

                         $q_total = $conn->query("SELECT COUNT(*) as total FROM `product_rating` WHERE product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());
                         $f_total = $q_total->fetch_array();

                          /*=============================== QUERY FOR PROGRESS BAR ========================================*/
                          $fiveStarRating = $f_5['total'];
                          $fourStarRating = $f_4['total'];
                          $threeStarRating = $f_3['total'];
                          $twoStarRating = $f_2['total'];
                          $oneStarRating = $f_1['total'];

                          $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
                          $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';  
                          
                          $fourStarRatingPercent = round(($fourStarRating/5)*100);
                          $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
                          
                          $threeStarRatingPercent = round(($threeStarRating/5)*100);
                          $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
                          
                          $twoStarRatingPercent = round(($twoStarRating/5)*100);
                          $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
                          
                          $oneStarRatingPercent = round(($oneStarRating/5)*100);
                          $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';      
                     ?>

                    <div class="col-xs-12 col-md-6">
                        <div class="row rating-desc">
                            <div class="col-xs-3 col-md-3 text-right" style="margin-left:-25px">
                               <i class="fa fa-star" style="color:yellow;"></i>  5
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress ">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5"
                                        aria-valuemin="0" aria-valuemax="5" style="background-color:#0fd297;
                                        width: <?php echo $fiveStarRatingPercent; ?> ">       
                                    </div>
                                </div>
                            <!--<div class="pull-right" style="margin-top:-20px;margin-right:-15px"> <?php echo $f_5['total']?></div>-->
                            </div>
                            <!-- end 5 -->
                            <div class="col-xs-3 col-md-3 text-right" style="margin-left:-25px">
                                <i class="fa fa-star" style="color:yellow;"></i> 4
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4"
                                        aria-valuemin="0" aria-valuemax="4" style="background-color: #c1ff62;
                                        width: <?php echo $fourStarRatingPercent; ?> ">     
                                    </div>
                                </div>
                            <!--<div class="pull-right" style="margin-top:-20px;margin-right:-15px"> <?php echo $f_4['total']?></div>-->
                            </div>
                            <!-- end 4 -->
                            <div class="col-xs-3 col-md-3 text-right" style="margin-left:-25px">
                               <i class="fa fa-star" style="color:yellow;"></i> 3
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3"
                                        aria-valuemin="0" aria-valuemax="3" style="background-color: #ffff00;
                                        width: <?php echo $threeStarRatingPercent; ?> ">
                                    </div>
                                </div>
                            <!--<div class="pull-right" style="margin-top:-20px;margin-right:-15px"> <?php echo $f_3['total']?></div>-->
                            </div>
                            <!-- end 3 -->
                            <div class="col-xs-3 col-md-3 text-right" style="margin-left:-25px">
                               <i class="fa fa-star" style="color:yellow;"></i> 2
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2"
                                        aria-valuemin="0" aria-valuemax="2" style="background-color: #f5c11f;
                                        width: <?php echo $twoStarRatingPercent; ?>">
                                    </div>
                                </div>
                            <!--<div class="pull-right" style="margin-top:-20px;margin-right:-15px"> <?php echo $f_2['total']?></div>-->
                            </div>
                            <!-- end 2 -->
                            <div class="col-xs-3 col-md-3 text-right" style="margin-left:-25px">
                                <i class="fa fa-star" style="color:yellow;"></i> 1
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1"
                                        aria-valuemin="0" aria-valuemax="1" style="background-color: #ff9f49;
                                        width: <?php echo $oneStarRatingPercent; ?>">
                                    </div>
                                </div>
                              <!--<div class="pull-right" style="margin-top:-20px;margin-right:-15px"> <?php echo $f_1['total']?></div>-->
                            </div>
                            <!-- end 1 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
 <?php
       }
    ?>

    </div>
</div>
</center>


<div class="container mt-5" style="margin-top:-20px">
    <div class="d-flex justify-content-center row">
        <div class="col-md-6">
            <div class="p-3 bg-white rounded">
                <h6 >Reviews[<?php echo $counter?>]</h6>


      <?php
       $query = $conn->query("SELECT product.product_id,product.image,product.product_name,product.product_type,
      product.price, product.merchant_id, product_rating.rate_id, product_rating.comment, product_rating.date,product_rating.rating,
      customer.firstname,customer.lastname, customer.customer_id 
      FROM product_rating
      RIGHT JOIN product ON product_rating.product_id = product.product_id 
      RIGHT JOIN customer ON product_rating.customer_id = customer.customer_id
      WHERE product_rating.product_id = '".$_REQUEST['product_id']."' ") or die(mysqli_error());

              while($fetch = $query->fetch_array()){
              
      ?>

                <div class="review mt-4" style="margin-bottom: 10px">
                    <div class="d-flex flex-row comment-user"><img class="rounded" src = "../img/user.png" width="40">
                        <div class="ml-2">
                            <div class="d-flex flex-row align-items-center">
                                <span class="name font-weight-bold" style="margin-left: 7px; margin-top: 13px">
                                <?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?>
                                 </span>                             
                            </div>                            
                        </div>
                    </div>
                    <div class="mt-2" >
                        <div class="rating">
                              <?php                          
                                    $rating= $fetch['rating'] ;
                                  if($rating == 5){
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                  }else if($rating == 4 ){
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                  }else if($rating == 3 ){
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                  }else if($rating == 2 ){
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                  }else if($rating == 1 ){
                                    echo '<i class="fa fa-star" style="color:yellow;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                    echo '<i class="fa fa-star" style="color:#cbced1;font-size: 18px;"></i>';
                                  }
                               ?>
                                <span class="dot"></span><span class="date" style="margin-left: 7px"> <?php echo $fetch['date'] ?> </span>
                            </div>
                        <p class="comment-text"><?php echo $fetch['comment'] ?> </p>
                    </div>
                </div>
     <?php
       }
    ?>               
            </div>
        </div>
    </div>
</div>




    </body>
</html>

<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.glyphicon { margin-right:5px;}
.rating .glyphicon {font-size: 22px;}
.rating-num { margin-top:0px;font-size: 54px; }
.progress { margin-bottom: 5px;}
.progress-bar { text-align: left; }
.rating-desc .col-md-3 {padding-right: 0px;}
.sr-only { margin-left: 5px;overflow: visible;clip: auto; }


</style>