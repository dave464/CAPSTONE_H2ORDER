<?php 
require_once '../connection.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body >
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <div class="wrapper">
        <div class="logo"> <img src="../img/customer.png" alt=""> </div>
        <div class="text-center mt-4 name"> Customer </div>
        <form action="login.php" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> 
            <input type="text" name="username" id="userName" placeholder="Username"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> 
            <input type="password" name="password" id="pwd" placeholder="Password"> </div> 
            <button type="submit" name="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6"> <a href="customer_sign.php">Sign up</a> </div>
      </div>


    </body>
</html>


