<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Products</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

     <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>     
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"  >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    </head>

    <body   >
    
      <?php include 'navbar.php' ?>

      <div class="wrapper">
    <div class="d-md-flex align-items-md-center">
              <p class="text-center h2 fw-bold mb-3 mx-1 mx-md-4 mt-4"
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;font-weight: 600">PRODUCT LIST
      </p>
        <div class="ml-auto d-flex align-items-center views"> </div>
    </div>
    <!--<div class="d-lg-flex align-items-lg-center pt-2">
        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label class="tick">Czech republic <input type="checkbox"> <span class="check"></span> </label> <span class="border px-1 mx-2 mr-3 font-weight-bold count"> 12</span> <select name="country" id="country" class="bg-light">
                <option value="" hidden>Country</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="Uk">UK</option>
            </select> </div>
    </div>-->

<script type="text/javascript">
    function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
     function ShowHideDivs(chkPassports) {
        var dvPassports = document.getElementById("dvPassports");
        dvPassports.style.display = chkPassports.checked ? "block" : "none";
    }
</script>
<label for="chkPassport">
    <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
    Do you have Passport?
</label>
<hr />
<div id="dvPassport" style="display: none">
    Passport Number: 5star
    <input type="text" id="txtPassportNumber" />
</div>

<div id="dvPassports" style="display: none">
    Passport Number:
    4s
    <input type="text" id="txtPassportNumber" />
    
</div>
</script>

    <div class="d-sm-flex align-items-sm-center pt-2 clear">
        <div class="text-muted filter-label"></div>
        
    </div>

    <div class="filters"> <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span class="px-1 fas fa-filter"></span></button> </div>
    <div id="mobile-filter">
<!---====================== MOBILE VIEW ============================= -->
         <div class="py-3">
                <h5 class="font-weight-bold">Price</h5>

                
            </div>
       
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
                            <input type="checkbox"  value="<?= $row['product_type'];?>" name="product_type" id="product_type" class="product_checked">
                            <?=  $row['product_type'];?>
                            <span class="check"></span>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
        </div>
        <div class="py-3">
            <h5 class="font-weight-bold">Rating</h5>
                <form class="rating">
                    <div class="form-inline d-flex align-items-center py-2">
                       <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)"> 
                            <span class="check"></span> 
                      </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick"> 
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox" id="chkPassports" onclick="ShowHideDivs(this)"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick"> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> </div>
                </form>
        </div>
    </div>
    <!---====================== END MOBILE VIEW ============================= -->

    <div class="content py-md-0 py-3">       
     <!---====================== WEB VIEW ============================= -->
        <section id="sidebar">
            <div class="py-3">
                <h5 class="font-weight-bold">Price</h5>

                
            </div>
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
                            <input type="checkbox"  value="<?= $row['product_type'];?>" id="product_type" class="product_checked">
                            <?=  $row['product_type'];?>
                            <span class="check"></span>
                         </label> 
                     </div>     
                </form>

                <?php 

                    }
                 ?>
                
            </div>
            <div class="py-3">
                <h5 class="font-weight-bold">Rating</h5>
                <form class="rating">
                    <div class="form-inline d-flex align-items-center py-2">
                       <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                      </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick"> 
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span>
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick">
                            <span class="fas fa-star"></span> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> 
                    </div>
                    <div class="form-inline d-flex align-items-center py-2"> 
                        <label class="tick"> 
                            <span class="fas fa-star"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <span class="far fa-star px-1 text-muted"></span> 
                            <input type="checkbox"> 
                            <span class="check"></span> 
                        </label> </div>
                </form>
            </div>
        </section> 
 <!---====================== END WEB VIEW ============================= -->
        <!-- Products Section -->
        <section id="products">
            <div class="container py-3">
                <div class="row" id="result">
                     <?php
                           $query = $conn->query("SELECT * FROM product ") or die(mysqli_error());

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
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> 
                            <img class="card-img-top" src="../photo/<?php echo $fetch['image']?>" 
                                 onclick="window.location='product_view.php?product_id=<?php echo $fetch['product_id']?>'">
                            <div class="card-body">
                                <h5 class="font-weight-bold pt-1"><?php echo $fetch['product_type']?></h5>
                                  <div class="d-flex justify-content-between mb-3">
                                      <h6 class="mb-0"><?php echo $fetch['product_name']?></h6>
                                      <h6 class="text-dark mb-0">&#8369; <?php echo $fetch['price']?>.00</h6>
                                    </div>
                                <div class="d-flex align-items-center product"> 
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


                } ?> 
                                </div>
                                    <a onclick="window.location='review.php?product_id=<?php echo $fetch['product_id']?>'"   
                                      style="width:80%; margin-top: 30px;color:white"
                                      class="btn btn-primary">Ratings and Reviews</a>

                            </div>
                        </div><br>
                    </div> 
                    
                   <?php
                       }
                    ?>
 
                </div>
            </div>
        </section>
    </div>
</div>

    </body>
</html>






<style type="text/css">


.wrapper {
    padding: 30px;
    max-width: 1200px;
    margin: auto
}

.h3 {
    font-weight: 900
}

.views {
    font-size: 0.85rem
}

.btn {
    color: #666;
    font-size: 0.85rem
}



.btn:hover {
    color: #61b15a
}

.green-label {
    background-color: #0d6edf;
    color: #48b83e;
    border-radius: 5px;
    font-size: 0.8rem;
    margin: 0 3px
}

.radio,
.checkbox {
    padding: 6px 10px
}

.border {
    border-radius: 12px
}

.options {
    position: relative;
    padding-left: 25px
}

.radio label,
.checkbox label {
    display: block;
    font-size: 14px;
    cursor: pointer;
    margin: 0
}

.options input {
    opacity: 0
}

.checkmark {
    position: absolute;
    top: 0px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #0d6edf;
    border: 1px solid #ddd;
    border-radius: 50%
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 9px;
    height: 9px;
    display: block;
    background: white;
    position: absolute;
    top: 52%;
    left: 51%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
    background: #0d6edf;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.count {
    font-size: 0.8rem
}

label {
    cursor: pointer
}

.tick {
    display: block;
    position: relative;
    padding-left: 23px;
    cursor: pointer;
    font-size: 0.8rem;
    margin: 0
}

.tick input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
}

.check {
    position: absolute;
    top: 1px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #0d6edf;
    border: 1px solid #ddd;
    border-radius: 3px
}

.tick:hover input~.check {
    background-color: #0d6edf
}

.tick input:checked~.check {
    background-color: #0d6edf
}

.check:after {
    content: "";
    position: absolute;
    display: none
}

.tick input:checked~.check:after {
    display: block;
    transform: rotate(45deg) scale(1)
}

.tick .check:after {
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg) scale(2)
}

.close {
    font-size: 1.2rem
}

div.text-muted {
    font-size: 0.85rem
}

#sidebar {
    width: 25%;
    float: left
}

.category {
    font-size: 0.9rem;
    cursor: pointer
}

.list-group-item {
    border: none;
    padding: 0.3rem 0.4rem 0.3rem 0rem
}

.badge-primary {
    background-color: #defadb;
    color: #48b83e
}

.brand .check {
    background-color: #fff;
    top: 3px;
    border: 1px solid #666
}

.brand .tick {
    font-size: 1rem;
    padding-left: 25px
}

.rating .check {
    background-color: #fff;
    border: 1px solid #666;
    top: 0
}

.rating .tick {
    font-size: 0.9rem;
    padding-left: 25px
}

.rating .fas.fa-star {
    color: #ffbb00;
    padding: 0px 3px
}

.brand .tick:hover input~.check,
.rating .tick:hover input~.check {
    background-color: #f9f9f9
}

.brand .tick input:checked~.check,
.rating .tick input:checked~.check {
    background-color: #0d6edf
}

#products {
    width: 75%;
    padding-left: 30px;
    margin: 0;
    float: right
}

.card{
      box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.card:hover {
    transform: scale(1.1);
    transition: all 0.5s ease-in-out;
    cursor: pointer

}

.card-body {
    padding: 0.5rem
}

.card-body .description {
    font-size: 0.78rem;
    padding-bottom: 8px
}

div.h5,
h5 {
    margin: 0
}

.product .fa-star {
    font-size: 0.9rem
}

.rebate {
    font-size: 0.9rem
}

/*.btn.btn-primary {
    box-shadow:inset 0px 1px 0px 0px #fff6af;
  background:linear-gradient(to bottom,  #2196F3 5%, #0d6edf 100%);
    color: #fff;
      border-color: #0d6edf;
    border-radius: 10px;
    font-weight: 800
}

.btn.btn-primary:hover {
    background:linear-gradient(to bottom, #0d6edf 5%, #2196F3 100%);
}*/



.clear {
    clear: both
}

.btn.btn-success {
    visibility: hidden;
    background-color: #0d6edf;
}

@media(min-width:992px) {

    .filter,
    #mobile-filter {
        display: none
    }
}

@media(min-width:768px) and (max-width:991px) {

    .radio,
    .checkbox {
        padding: 6px 10px;
        width: 49%;
        float: left;
        margin: 5px 5px 5px 0px
    }

    .filter,
    #mobile-filter {
        display: none
    }
}

@media(min-width:576px) and (max-width:767px) {
    #sidebar {
        width: 35%
    }

    #products {
        width: 65%
    }

    .filter,
    #mobile-filter {
        display: none
    }

    .h3+.ml-auto {
        margin: 0
    }
}

@media(max-width:575px) {
    .wrapper {
        padding: 10px
    }

    .h3 {
        font-size: 1.3rem
    }

    #sidebar {
        display: none
    }

    #products {
        width: 100%;
        float: none
    }

    #products {
        padding: 0
    }

    .clear {
        float: left;
        width: 80%
    }

    .btn.btn-success {
        visibility: visible;
        margin: 10px 0px;
        color: #fff;
        padding: 0.2rem 0.1rem;
        width: 20%
    }

    .green-label {
        width: 50%
    }

    .btn.text-success {
        padding: 0
    }

    .content,
    #mobile-filter {
        clear: both
    }
}
</style>

