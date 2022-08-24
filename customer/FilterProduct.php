<?php
//importing connection file 
require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product filter</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

    <!-- Googele fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Lexend+Deca&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom stylsheet -->
    <link rel="stylesheet" href="../css/style2.css">


     <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>  
</head>

<body>
<?php include 'navbar.php' ?>
    <!--    Simple navigation  -->
    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">PRODUCT LIST
      </p>
    <main>
        <div class="main-container">
            <div class="container-element filter-section">
                


    <div class="filters"> <button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span class="px-1 fa fa-filter"></span></button> </div>
    <div id="mobile-filter">
<!---====================== MOBILE VIEW ============================= -->
        
       
        <div class="py-3">
            <h5 class="font-weight-bold">Product Type</h5>
             <?php 
                $sql="SELECT DISTINCT product_type FROM product ORDER BY product_type";
                $result= $conn->query($sql);
                while ($row=$result->fetch_assoc() ) {
                
             ?>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1"> 
                        <label class="tick">
                             <?php
                            $select_sql = "SELECT DISTINCT product_type, COUNT(product_type) as total FROM product GROUP
                            BY product_type ORDER BY product_type";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['product_type']; ?>" id="product_type"><span>
                                            <?= $row['product_type']; ?> (<?= $row['total']; ?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
        </div>
        <div class="py-3" style="margin-top:-20px">
            <h5 class="font-weight-bold">Product Name</h5>
             <?php 
                $sql="SELECT DISTINCT product_type FROM product ORDER BY product_type";
                $result= $conn->query($sql);
                while ($row=$result->fetch_assoc() ) {
                
             ?>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1"> 
                        <label class="tick">
                              <?php
                            $select_sql = "SELECT DISTINCT product_name, COUNT(product_name) as Total FROM product
                            GROUP BY product_name ORDER BY product_name";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['product_name']; ?>" id="product_name"><span>
                                            <?= $row['product_name']; ?>  (<?= $row['Total'];?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
        </div>
          <div class="py-3"  style="margin-top:-20px">
            <h5 class="font-weight-bold">Volume</h5>
             <?php 
                $sql="SELECT DISTINCT product_type FROM product ORDER BY product_type";
                $result= $conn->query($sql);
                while ($row=$result->fetch_assoc() ) {
                
             ?>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1"> 
                        <label class="tick">
                              <?php
                            $select_sql = "SELECT DISTINCT volume FROM product
                            ORDER BY volume DESC";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['volume']; ?>" id="volume"><span>
                                            <?= $row['volume']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
        </div>
        <div class="py-3"  style="margin-top:-20px">
            <h5 class="font-weight-bold">Price</h5>
             <?php 
                $sql="SELECT DISTINCT product_type FROM product ORDER BY product_type";
                $result= $conn->query($sql);
                while ($row=$result->fetch_assoc() ) {
                
             ?>
                <form class="brand">
                    <div class="form-inline d-flex align-items-center py-1"> 
                        <label class="tick">
                              <?php
                            $select_sql = "SELECT DISTINCT price, COUNT(price) as total FROM product GROUP
                            BY price ORDER BY price";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['price']; ?>" id="price"><span>
                                         &#8369; <?= $row['price']; ?> (<?= $row['total']; ?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
        </div>
        
    </div>

      
      <!--     
             <div class="mobile-flex-display">                
                    <div class="filter-element">
                        <h6>Product Type <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT product_type, COUNT(product_type) as total FROM product GROUP
                            BY product_type ORDER BY product_type";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['product_type']; ?>" id="product_type"><span>
                                            <?= $row['product_type']; ?> (<?= $row['total']; ?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>                 
                </div>
                  <div class="mobile-flex-display">                
                    <div class="filter-element">
                        <h6>Price <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT price, COUNT(price) as total FROM product GROUP
                            BY price ORDER BY price";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['price']; ?>" id="price"><span>
                                            <?= $row['price']; ?> (<?= $row['total']; ?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>                 
                </div>
                <div class="mobile-flex-display">          
                   <div class="filter-element">
                        <h6>Product Name <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT product_name, COUNT(product_name) as Total FROM product
                            GROUP BY product_name ORDER BY product_name";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['product_name']; ?>" id="product_name"><span>
                                            <?= $row['product_name']; ?>  (<?= $row['Total'];?>)</span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>               
                </div>
                <div class="mobile-flex-display">          
                   <div class="filter-element">
                        <h6>Volume <span class="mobile-drop"><i class="fas fa-caret-down"></i></span></h6>
                        <div class="filter-selection scrollable-selection">
                            <?php
                            $select_sql = "SELECT DISTINCT volume FROM product
                            ORDER BY volume DESC";
                            $result = $conn->query($select_sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input product-check" value="<?= $row['volume']; ?>" id="volume"><span>
                                            <?= $row['volume']; ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>               
                </div>-->
            </div><br>
            <div class="container-element product-section">
                <?php
                $sql = "SELECT product.product_id,product.image,product.product_name,product.volume,
                product.price,product.product_type,  merchant.merchant_id, merchant.business_name,merchant.address,merchant.barangay
                FROM  merchant
                RIGHT JOIN product ON merchant.merchant_id = product.merchant_id 
                WHERE product.merchant_id = merchant.merchant_id ";

                $sql .=  " GROUP BY product_id";
                $result = $conn->query($sql);
                $rows = $result->num_rows;
                echo "<h4 id='filteredTexts'>" . $rows . " results</h4>";
                echo "<hr>";
                ?>

       <div class="row" id="result">
                    <?php
                    if ($rows > 0) {
                        while ($data = $result->fetch_assoc()) {

                             $std_num= 0;
                              $counter =0;
                            $productId = $data['product_id'];
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

                            $merchantId = $data['merchant_id'];
                             $query3 = $conn->query("SELECT inspection.inspection_id, inspection.date, 
                                              inspection.date,inspection.status,inspection.merchant_id
                                                FROM inspection                                                
                                                 WHERE inspection.merchant_id = $merchantId ");

                            while($fetch3 = $query3->fetch_array()){
                              $bad=$merchantId;
                              $dav=$fetch3['status'];
                  
                            }
                    ?>
                         <div class="col-md-12 col-lg-4 mb-4 mb-lg-0 "  >
                            <div class="card">
                              <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0"><?php echo $data['business_name']?>'s Offer</p>
                                <a href="#!">
                                  <div class="mask">
                                    <div class="d-flex justify-content-start align-items-end h-100">
                                    <?php 
                                          if ($data['merchant_id']==$bad && $dav=='Passed') {
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
                               <img src = "../photo/<?php echo $data['image']?>" 
                                  onclick="window.location='product_view.php?product_id=<?php echo $data['product_id']?>'"
                                   class="card-img-top" />
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                      <p class="small"><?php echo $data['product_type']?> </p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                      <h5 class="mb-0"><?php echo $data['product_name']?>  <?php echo $data['volume']?></h5>
                                      <h5 class="text-dark mb-0">&#8369; <?php echo $data['price']?>.00</h5>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                      <p class="small"><i class="fas fa-map-marker" style="color:red"></i>
                                        <?php echo $data['address']?> <?php echo $data['barangay']?>
                                          Nasugbu,Batangas
                                      </p>
                                    </div>
                                    <svg style="display:none;">
                                      <defs>
                                        <symbol id="fivestars">
                                          <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd"/>
                                          <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(24)"/>
                                          <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(48)"/>
                                          <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd" transform="translate(72)"/>
                                          <path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z M0 0 h24 v24 h-24 v-24" fill="white" fill-rule="evenodd"  transform="translate(96)"/>
                                        </symbol>
                                      </defs>
                                    </svg>
                                    <div class="rating">
                                    <!--   <div class="rating-bg" style="width: 90%;"></div> -->
                                      <progress class="rating-bg" value="<?php echo  $average ?>" max="5"></progress>
                                      <svg><use xlink:href="#fivestars"/></svg>
                                    </div>
                                       <a onclick="window.location='review.php?product_id=<?php echo $data['product_id']?>'"   
                                          style="width: 65%; margin-top: 50px"
                                          class="btn btn-primary">Ratings and Reviews</a>
                              </div>
                            </div>
                          </div>
    
                    <?php
                        }
                    } else {
                        echo "<div><ol start='1'><li>Check your spelling</li></ol></div>";
                    }
                    ?>
               </div> 
            </div>
        </div>
    </main>
   
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!--           Bootstrap CDN     -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--           Custom JS -->
    <script src="../js/main2.js"></script>
</body>

</html>


<style type="text/css">
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.btn{
  margin:2px;
  padding:4px;
  width: 110px;
}

.rating {
  width: 120px;
  height: 24px;
  position: relative;
  background-color: gray;
}

.rating progress.rating-bg {
  -webkit-appearance: none;
  -moz-appearence: none;
  appearance: none;
  border: none;
  display: inline-block;
  height: 24px;
  width: 100%;
  color: orange;
}

.rating progress.rating-bg::-webkit-progress-value {
  background-color: orange;
}

.rating progress.rating-bg::-moz-progress-bar {
  background-color: orange;
}

.rating svg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>