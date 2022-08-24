<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       
    </head>
    <body >
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
  <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">Dashboard
  </p>



     <?php
        /*====== Query for total pending orders =====*/
        $q_p = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'pending' && orderlist.merchant_id = '".$_SESSION['merchant_id']."' ") or die(mysqli_error());
        $f_p = $q_p->fetch_array();
        /*====== Query for total accepted orders =====*/
        $q_s = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'accepted' && orderlist.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());
        $f_s = $q_s->fetch_array();
        /*====== Query for total dispatched orders =====*/
        $q_d = $conn->query("SELECT COUNT(*) as total FROM `orderlist` WHERE orderlist.status = 'dispatched' && orderlist.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());
        $f_d = $q_d->fetch_array();
        /*====== Query for count deliveryman =====*/
        $q_del = $conn->query("SELECT COUNT(*) as total FROM `deliveryman` WHERE  deliveryman.merchant_id = '".$_SESSION['merchant_id']."'") or die(mysqli_error());
        $f_del = $q_del->fetch_array();

        /*====== Query for total earning today =====*/
         $q_sales = $conn->query("SELECT SUM(total) as earning FROM `orderlist` 
            WHERE DATE(date) = DATE(NOW()) && orderlist.status = 'delivered'  
            && orderlist.merchant_id = '".$_SESSION['merchant_id']."' 
            ORDER BY `order_id` DESC") or die(mysqli_error());
        $f_sales = $q_sales->fetch_array();

         /*====== Query for total earning yesterday =====*/
        $q_Ysales = $conn->query("SELECT SUM(total) as earning FROM `orderlist` 
            WHERE DATE(`date`) = DATE_ADD(CURDATE(), INTERVAL -1 DAY)  && orderlist.status = 'delivered'  
            && orderlist.merchant_id = '".$_SESSION['merchant_id']."'   ||DATE(`date`) = DATE_ADD(CURDATE(), INTERVAL -1 DAY)  && orderlist.status = 'rated'  
            && orderlist.merchant_id = '".$_SESSION['merchant_id']."'  
            ORDER BY `order_id` DESC") or die(mysqli_error());
        $f_Ysales = $q_Ysales->fetch_array();

         /*====== Query for last 7 days record =====*/
        $exp_date_line = mysqli_query($conn,"SELECT date FROM orderlist 
          WHERE YEARWEEK(`date`, 1) = YEARWEEK( CURDATE() - INTERVAL 1 WEEK, 1) && orderlist.status = 'delivered'
          && orderlist.merchant_id = '".$_SESSION['merchant_id']."' 
           GROUP BY date  ORDER BY `date` ASC ");

         /*====== Query for total sale in last 7 days  =====*/
         $exp_amt_line =  mysqli_query($conn,"SELECT SUM(total) FROM orderlist
          WHERE YEARWEEK(`date`, 1) = YEARWEEK( CURDATE() - INTERVAL 1 WEEK, 1)  &&  orderlist.status = 'delivered' 
          && orderlist.merchant_id = '".$_SESSION['merchant_id']."' 
           GROUP BY date") or die(mysqli_error());

          /*====== Query for last product_type =====*/
        $Product_Type = mysqli_query($conn,"SELECT product.product_type as product_type, product.product_id, orderlist.order_id FROM orderlist
          RIGHT JOIN product ON orderlist.product_id = product.product_id 
          WHERE orderlist.status = 'delivered'
           && orderlist.merchant_id = '".$_SESSION['merchant_id']."'  || orderlist.status = 'rated'  
            && orderlist.merchant_id = '".$_SESSION['merchant_id']."'
          GROUP BY product.product_type
           ORDER BY product.product_type");

         /*====== Query for counting product_type in last 7 days  =====*/
         $Total_per_product =  mysqli_query($conn,"SELECT COUNT(product.product_type) ,product.product_type, product.product_id, orderlist.order_id FROM orderlist
          RIGHT JOIN product ON orderlist.product_id = product.product_id 
          WHERE  orderlist.status = 'delivered'
           && orderlist.merchant_id = '".$_SESSION['merchant_id']."'   || orderlist.status = 'rated'  
            && orderlist.merchant_id = '".$_SESSION['merchant_id']."'
          GROUP BY product.product_type
           ORDER BY product.product_type") or die(mysqli_error());


          $query = $conn->query("SELECT * FROM `merchant` WHERE `merchant_id` = '$_SESSION[merchant_id]'") or die(mysqli_error());
          $fetch = $query->fetch_array();
              $stat=$fetch['status']; 

                $std_num= 0;
                $counter =0;
                $merchantId = $fetch['merchant_id'];
                $query2 = $conn->query("SELECT product_rating.rating
                FROM product_rating WHERE product_rating.merchant_id = $merchantId");

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

<div class="container-fluid"  style="margin-top:30px;">
  <section>
<!--================ CARD SUMMARY =============-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-history text-info fa-3x"></i>
              </div>
              <div class="text-end">
                <h3><?php echo $f_p['total']?></h3>
                <p class="mb-0">Pending Orders</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-clipboard-check text-warning fa-3x"></i>
              </div>
              <div class="text-end">
                <h3><?php echo $f_s['total']?></h3>
                <p class="mb-0">Accepted Orders</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-truck text-success fa-3x"></i>
              </div>
              <div class="text-end">
                <h3><?php echo $f_d['total']?></h3>
                <p class="mb-0">Dispatched Items</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="far fa-user text-danger fa-3x"></i>
              </div>
              <div class="text-end">
                <h3><?php echo $f_del['total']?></h3>
                <p class="mb-0">Delivery Man</p>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-money-bill-wave text-danger fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>&#8369; <?php echo $f_sales['earning']?>.00</h3>
                <p class="mb-0">Today Sales</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-money-bill-wave text-success fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>&#8369; <?php echo $f_Ysales['earning']?>.00</h3>
                <p class="mb-0">Yesterday Sales</p>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">

                <?php if ($stat=='approved') {
                  echo '<i class="fas fa-user-check text-info fa-3x"></i>';
                }else{
                  echo '<i class="fa fa-spinner fa-spin text-info fa-3x"></i>';
                }
               

                  ?>

              </div>
              <div class="text-end">
                <h3><?php echo $fetch['status']?></h3>
                <p class="mb-0">Account Status</p>
              </div>
            </div>
          </div>
        </div>
      </div>
 <div class="col-xl-3 col-sm-6 col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div class="align-self-center">
                <i class="fas fa-star text-warning fa-3x"></i>
              </div>
              <div class="text-end">
                <h3>
                     <?php if($average==0) {
                            echo 'No Rating';
                      } else{
                            echo round($average,2);
                              echo '/5.00 ';
                          }
                        ?>
                </h3>
                <p class="mb-0">Ratings</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    

 <!--============= ANALYTICS MODULE ==========-->   
    <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
          <canvas id="line-chart" ></canvas>
      </div>
    </div>
  </div><br>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
         <canvas id="pie-chart" height="310"></canvas>   
      </div>
    </div>
  </div>
</div><br>

  </section>
</div>


 <script src="Chart.min.js"></script>
<script type="text/javascript">
  var line = document.getElementById('line-chart').getContext('2d');
  var myChart = new Chart(line, {
  type: 'line',
  data: {
    labels: [<?php while ($fetch1 = mysqli_fetch_array($exp_date_line)) {
                    echo '"' . date("F d, Y", strtotime( $fetch1['date'])) . '",';
            } ?> ],

    datasets: [{ 
      data: [<?php while ($fetch2 = mysqli_fetch_array($exp_amt_line)) {
                    echo '"' .$fetch2['SUM(total)'] . '" ,';
            } ?>],
        label: "Last Week Record",
        borderColor: "#3e95cd",
        fill:true,
backgroundColor: "#9bc8e5"

                }]
  },
  options: {
    title: {
      display: true,
      text: 'Sales Summary'
    }
  }
});
</script>

<script type="text/javascript">
 
var chartDiv = document.getElementById('pie-chart').getContext('2d');
var myChart = new Chart(chartDiv, {
    type: 'doughnut',
    data: {
        labels: [<?php while ($fetch3 = mysqli_fetch_array($Product_Type)) {
                    echo '"' . $fetch3['product_type'] . '",';
            } ?> ],
        datasets: [
        {
            data: [<?php while ($fetch4 = mysqli_fetch_array($Total_per_product)) {
                    echo '"' .$fetch4['COUNT(product.product_type)'] . '" ,';
            } ?>],
            backgroundColor: [
               "#1e88e5",
            "#26c6da",
            "#6610f2",
            "#7460ee"
           
            ]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Pie Chart'
        },
    responsive: true,
maintainAspectRatio: false,
    }
});
    
</script>


    </body>
</html>




<style type="text/css">
  /*body {
  background-color: #f5f7fa;
}*/
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}
</style>