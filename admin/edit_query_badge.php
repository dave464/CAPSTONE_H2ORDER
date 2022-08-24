<?php
	require_once 'connect.php';

		$time = date('Y-m-d H:i:s');
		
		$conn->query("UPDATE `badge` SET `date` = '$time' 
		WHERE `badge_id` = '$_REQUEST[badge_id]'") or die(mysqli_error());
		echo
		"<script>
		alert('Data Updated Successfully');
		document.location.href = 'badge.php';
		</script>"
		;


/*
           <div class = "form-group">
              <label>Room Type </label>
              <select class = "form-control" required = required name = "status">
                <option value = "">Choose an option</option>
                <option value = "Passed" <?php if($fetch['status'] == "Passed"){echo "selected";}?>>Passed</option>
                <option value = "Failed" <?php if($fetch['status'] == "Failed"){echo "selected";}?>>Failed</option>
              </select>
            </div>*/