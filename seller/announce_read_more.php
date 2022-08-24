<?php
require 'validate.php';
require '../connection.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Read More</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
      <!-- Navbar-->
      <?php include 'navbar.php' ?>


      <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">ANNOUNCEMENT
      </p>

      
  <!---- SECTION Start---->
      <section style="margin-top:-30px;" >
  
      <div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">

            
<?php  
   $query = $conn->query("SELECT * FROM announcement WHERE `announcement_id` = '$_REQUEST[announcement_id]'") or die(mysqli_error());
              while($fetch = $query->fetch_array()){
 ?>
        <div class="col-md-12">         
            <div class="card blog-horizontal mt-4">
                <div class="card-body">
                    <div class="card-img-actions mr-sm-3 mb-3"> <a href="#course_preview" data-toggle="modal" data-abc="true"> <img src="../img/megaphone.png" class="img-fluid card-img" alt=""> </a> </div>
                    <div class="mb-3">
                        <h5 class="d-flex font-weight-semibold flex-nowrap my-1"> <a href="#" class="text-default mr-2" data-abc="true">Announcement</a></h5>
                        <ul class="list-inline list-inline-dotted text-muted mb-0">
                            <li class="list-inline-item">By <a href="#" class="text-muted" data-abc="true">Admin</a></li>
                            <li class="list-inline-item"><?php echo date("M d, Y", strtotime($fetch['date']))?></li>
                        </ul>
                    </div>
                            <?php echo $fetch['message']?>
                </div>            
            </div>
        </div>                
 <?php
       }
    ?>
    </div>
</div>

  
</section>
<!--------- SECTION END-------->
  


    </body>
</html>

<!-------- Style -------->
<style type="text/css">
body {
    margin: 0;
    font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: .8125rem;
    font-weight: 400;
    line-height: 1.5385;
    color: #333;
    text-align: left;
    
}


  .mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .1875rem;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

@media (min-width: 576px) {
    .blog-horizontal .card-img-actions {
        width: 45%;
        float: left;
        max-width: 25rem;
        z-index: 10
    }
}

a {
    text-decoration: none !important
}

.course-button {
    border: 1px solid #007bff;
    padding: 5px;
    background-color: #007bff;
    padding-right: 10px;
    padding-top: 3px;
    color: #fff;
    border-radius: 3px
}

.course-button:hover {
    color: #fff
}
</style>
