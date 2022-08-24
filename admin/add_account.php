<?php
ob_start();	
?>


<!DOCTYPE html> 
<?php
	require_once 'validate.php';
	require 'name.php';
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Add Account</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../admin/navstyle.css">
    <link rel="stylesheet" href="../admin/ad_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Link -->
     <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
   </head>

<body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <!-- Navbar -->
 <?php include'navbar.php';?>
  <!-- /.navbar -->




<!-- Blue background -->
  <div style="height: 340px; background-color: #2234ae;
    background-image: linear-gradient(340deg, #2234ae 0%,  #191714 89%);">
      <br> 
      <span style="color:white;
    margin-left:280px; margin-top:30px;  font-size: 40px; font-family:Monotype Corsiva;
  font-weight: 400;" class="links_name">Add Account</span>
  


</div>


<!-- Main Content -->
   <div class="home_content">
    

   <div class="action">
        <div class="profile" style="margin-top:-340px;
        margin-right:17px;float:right" onclick="menuToggle()">
            <img src = "../photo/<?php echo $fetch['photo']?>" />
        </div>
        <div class="menu">
            <h3><?php echo $name;?> <br> <span>Administrator</span></h3>
            <ul style="margin-left: -40px;">            
            <li><img src="../img/edit.png" alt=""><a href="edit_account.php">Edit Account</a></li> <li><img src="../img/user.png" alt=""><a href="account.php">User Profile</a></li>
            <li><img src="../img/log-out.png" alt=""><a href="logout.php">Log-Out</a></li>
            </ul>
        </div>
    </div>
     
   

   <div id="tbl-contain" style=" margin-top:-240px;
    width: 97%; height:510px;
     background-color: white;  border-radius: .4rem;
     border-color:dodgerBlue;
    border:2px solid dodgerBlue;
    box-shadow: 0 0 8px 0 dodgerBlue; margin-left:20px;
      ">

<div class = "col-md-4" style="margin-top:60px; margin-left:40px; ">	
					<form action="add_query_account.php" method = "POST" enctype = "multipart/form-data">

          <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

						<div class = "form-group" >
							<label>Name </label>
              <?php if (isset($_GET['name'])) { ?>
							<input type = "text" class = "form-control" name = "name" value="<?php echo $_GET['name']; ?>">
              
          <?php }else{ ?>
            <input type="text" 
                      name="name" 
                      class = "form-control"
                      >
          <?php }?>
						</div>


						<div class = "form-group">
							<label>Username </label>
              <?php if (isset($_GET['username'])) { ?>
							<input type = "text" class = "form-control" name = "username" value="<?php echo $_GET['username']; ?>">

              <?php }else{ ?>
            <input type="text" 
                      name="username" 
                      class = "form-control"
                      >
          <?php }?>

						</div>



						<div class = "form-group">
							<label>Password </label>
							<input type = "password" class = "form-control" name = "password" />
						</div>
            <div class = "form-group">
							<label>Confirm Password </label>
							<input type = "password" class = "form-control" name = "re_password" >
						</div>
						
            
            <div class = "form-group" style="margin-left:500px; margin-top:-250px;">
							<label>Photo </label>
							<div id = "preview" style = "width:240px; height :240px; border:1px solid #000;">
								<center id = "lbl">[Photo]</center>
							</div>

							<input type = "file" required = "required" id = "photo" name = "photo" >
						 
      
            
            
            </div>
            
						<div class = "form-group">
							<button name = "add_account"  class = "btn btn-info form-control" style="background:dodgerBlue;"><i class = ""></i> Saved</button>
						</div>
					</form>
					<?php require_once 'add_query_account.php'?>
				</div>   




    </div>
    
   </div>

<style>
  textarea{
    border-color:dodgerBlue;
    border:2px solid dodgerBlue;
    box-shadow: 0 0 8px 0 dodgerBlue;
  }
  .error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}
</style>

<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>

</body>
</html>

<script>
        function menuToggle() {
            const toggleMenu = document.querySelector(".menu");
            toggleMenu.classList.toggle('active')
        }
    </script>

  
