<?php
ob_start();	
?>

<!DOCTYPE html> 
<?php
	require_once 'validate.php';
	
    require 'connect.php';
?>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Feedback</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
 <link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>

<link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css'>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  

   </head>


<body>



<?php
	$query = $conn->query("SELECT * FROM `feedback` WHERE `feedback_id` = '$_REQUEST[feedback_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>

  
<form method = "POST"  action = "feedback_query.php?feedback_id=<?php echo $fetch['feedback_id']?> "> <br>

<div class="card" style="margin-left:20px; margin-right:20px;">
          <div class="card-header">
            <div class="container-fluid">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-sm-12"><br>
                    <center>
                      <h2>INSPECTION REPORT</h2>
                    </center><br><br>
                    <hr>
                  </div><br><br><br>

                  
<div class = "col-md-4" >
<div class = "form-group">
      
        <?php  
            $query = $conn->query("SELECT feedback.feedback_id, merchant.business_name, feedback.date, feedback.criteria1,feedback.criteria2,feedback.criteria3,feedback.criteria4,feedback.criteria5,feedback.criteria6
            FROM merchant RIGHT JOIN feedback ON merchant.merchant_id = feedback.merchant_id WHERE `feedback_id` = '$_REQUEST[feedback_id]' ") or die(mysqli_error());
						$fetch = $query->fetch_array();	

            $sum= $fetch['criteria1']+$fetch['criteria2']+$fetch['criteria3']+$fetch['criteria4']+$fetch['criteria5']+$fetch['criteria6'];
				?>

     <strong><label>Name: </label></strong>
     <?php echo $fetch['business_name']?>  

       <div class = "form-group" style="float:right;">
      <strong><label>Date:</label></strong>
            <?php echo date("M d, Y", strtotime($fetch['date']))?>            
</div>

</div>


</div>



      




  <p style="margin-top: 20px">Instruction: (✓) Check the appropriate box (Pass/Fail), in the following statements.
 </p> 


    <table id="example"   class="table table-bordered border-primary table-hover "   style="margin-left:15px; width:97%; margin-top:10px;border:1px solid blue;" >
    <thead>
        <tr >
            <th scope="col" class=" border-primary" style="border:1px solid blue;background:#1E90FF;color:white;text-align:center;">Inspection Criteria</th>
            <th scope="col" class=" border-primary" style="border:1px solid blue;background:#1E90FF;color:white;text-align:center;"> Pass</th>
            <th scope="col" class=" border-primary" style="border:1px solid blue;background:#1E90FF;color:white;text-align:center;"> Fail</th>
             
           
        </tr>


      
    
    <tbody >

    
         
        <tr>
           
           <td>1. Valid Business Permit/Mayor’s Permit.</td>
            <td ><center><input type="checkbox" name="criteria1" value="5"
                  <?php if($fetch['criteria1'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria1" value="0"
                   <?php if($fetch['criteria1'] == '0') { echo "checked";}?>></center> </td>           
 </tr>


 <tr>
             <td>2. Storage tanks have tight fitting covers, are vented and are protected from 
contamination.</td>
            <td ><center><input type="checkbox" name="criteria2" value="5"
                  <?php if($fetch['criteria2'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria2" value="0"
                   <?php if($fetch['criteria2'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>

<tr>
             <td>3. Employees always wear facemasks, glooves, apron and hairnet.</td>
           <td ><center><input type="checkbox" name="criteria3" value="5"
                  <?php if($fetch['criteria3'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria3" value="0"
                   <?php if($fetch['criteria3'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>

<tr>
             <td>4. Water dispenser and Water container are clean .</td>
            <td ><center><input type="checkbox" name="criteria4" value="5"
                  <?php if($fetch['criteria4'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria4" value="0"
                   <?php if($fetch['criteria4'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>

<tr>
             <td>5. Keep the refilled water at room temperature (25C-28C).</td>
            <td ><center><input type="checkbox" name="criteria5" value="5"
                  <?php if($fetch['criteria5'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria5" value="0"
                   <?php if($fetch['criteria5'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>

<tr>
             <td>6. There must be no unpleasant taste, odor or color in drinking water.</td>
            <td ><center><input type="checkbox" name="criteria6" value="5"
                  <?php if($fetch['criteria6'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria6" value="0"
                   <?php if($fetch['criteria6'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>
<tr>
             <td>6. There must be no unpleasant taste, odor or color in drinking water.</td>
            <td ><center><input type="checkbox" name="criteria6" value="5"
                  <?php if($fetch['criteria6'] == '5') { echo "checked";}?>></center> </td>
              <td ><center><input type="checkbox" name="criteria6" value="0"
                   <?php if($fetch['criteria6'] == '0') { echo "checked";}?>></center> </td>  
             
</tr>

       
    </tbody>
</table>

                </div>
              </div>
            </div>
          </div>
        </div>

<br>

<!--<?php 
  
  if ($sum <20) {
    
    echo "Failed";
      }

?>-->
     
<div>

</form>  

<button name = "feedback_print" id="print" class="btn btn-primary btn-print" onclick="window.print()" style="float: right;margin-right:20px;"><span class="fas fa-print"></span> Print</button> 




<style>

 .rating {
    margin-right:30%;
  
    border:none;
}
.rating:not(:checked) > input {
    position:absolute;
    top:-9999px;
    clip:rect(0, 0, 0, 0);
}
.rating:not(:checked) > label {
    float:right;
    width:1em;
    padding:0 .1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:250%;
    line-height:1.2;
    color:#ddd;
}
.rating:not(:checked) > label:before {
    content:'★ ';
}
.rating > input:checked ~ label {
    color: gold;
}
.rating:not(:checked) > label:hover, .rating:not(:checked) > label:hover ~ label {
    color: #f70;
}
.rating > input:checked + label:hover, .rating > input:checked + label:hover ~ label, .rating > input:checked ~ label:hover, .rating > input:checked ~ label:hover ~ label, .rating > label:hover ~ input:checked ~ label {
    color: #ea0;
}
.rating > label:active {
    position:relative;
  


}    

@media print {
  #print{
    display:none;
  }
  #back{
    display:none;
  }
}
</style>

<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>