
<!DOCTYPE html> 
<?php
	require_once 'validate.php';
	require 'name.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../admin/navstyle.css">
    <link rel="stylesheet" href="../admin/ad_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Link -->
     <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet"> <!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
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
  font-weight: 400;" class="links_name">Accounts</span>
  


</div>


<!-- Main Content -->
   <div class="home_content">
    

   <div class="action">
        <div class="profile" style="margin-top:-340px;
        margin-right:17px;float:right" onclick="menuToggle()">
             <img src = "../photo/<?php echo $fetch['photo']?>" id = "lbl" width = "100%" height = "100%"/>
        </div>
        <div class="menu">
            <h3><?php echo $name;?> <br> <span>Administrator</span></h3>
            <ul style="margin-left: -40px;">            
            <li><img src="../img/edit.png" alt=""><a href="edit_account.php">Edit Account</a></li> <li><img src="../img/user.png" alt=""><a href="account.php">User Profile</a></li>
            <li><img src="../img/log-out.png" alt=""><a href="logout.php">Log-Out</a></li>
            </ul>
        </div>
    </div>
    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector(".menu");
            toggleMenu.classList.toggle('active')
        }
    </script> 
   

   <div id="tbl-contain" style=" margin-top:-240px;
    width: 97%; height:100%; max-height:3000px;
     background-color: white;  border-radius: .4rem;
     border-color:dodgerBlue;
    border:2px solid dodgerBlue;
    box-shadow: 0 0 8px 0 dodgerBlue; margin-left:20px;
      ">

     
<div>
     <a class = "btn btn-primary"  id ="addBtn" href="add_account.php" > Add Account</a> </div> <br>
   <table id="table" class="table" style="margin-left:15px; width:97%; margin-top:60px;border:1px solid blue;" >
  <thead>
    <tr>
      <th scope="col" class="border-primary" style="background:#1E90FF;color:white;">ID</th>
      <th scope="col" class="border-primary" style="background:#1E90FF;color:white;">NAME</th>
      <th scope="col" class="border-primary" style="background:#1E90FF;color:white;">PHOTO</th>  
      <th scope="col" class="border-primary" style="background:#1E90FF;color:white;">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php  
							$query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>

    <tr>
    <th scope="row" class=" border-primary"><?php echo $fetch['admin_id']?></th>
      <td class=" border-primary"><?php echo $fetch['name']?></td>    
      <td class=" border-primary">
        <center>
          <img src = "../photo/<?php echo $fetch['photo']?>" height = "50" width = "50"/>
        </center>
      </td>
      <td class=" border-primary"><a class = "btn btn-danger"   href="delete_account.php?admin_id=<?php echo $fetch['admin_id']?>" onclick = "confirmationDelete(this); return false;"><i class = ""></i> Delete</a></td>
      
    </tr>
    <?php
							}
						?>
  </tbody>
</table> <br>
    </div>  

    </div>
    
   </div>


  
 
  
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script> 
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 
    <script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Are you sure you want to delete this record?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>
    
   
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable(
		{
		
      pageLength: 10,
        lengthMenu: [[10, 20, 30, 40, 50 - 1], [10, 20, 30, 40, 50, 'all']],
       
        "columnDefs": [ {
            "searchable": false,

            "orderable": false,
           
            type:'title-string', targets: 0,
        } ],

        
		}
	);
	});
</script> 



<style>

#addBtn.btn.btn-primary{
  margin-top: 130px;
  margin-left:20px;
 bottom:20px;
 color:white;
}
#table_length.dataTables_length{
        width:120px;
        height: 10px;
        margin-left:13px;
    }

#table_paginate.dataTables_paginate.paging_simple_numbers{
  margin-right:20px;
}

#table_info.dataTables_info{
  width:200px;
        height: 20px;
        margin-left:13px;
}

#table_filter.dataTables_filter{
   
    margin-right: 97px;

}
tr:hover {
          background-color: #b2f8ff;
        }

</style>







<style>
  textarea{
    border-color:dodgerBlue;
    border:2px solid dodgerBlue;
    box-shadow: 0 0 8px 0 dodgerBlue;
  }
</style>


</body>
</html>

