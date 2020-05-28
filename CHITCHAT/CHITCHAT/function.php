<?php
     include_once("connect.php");
	 function fetch_user_last_activity($username,$con)
	 {
		 
		 $sql = "SELECT * FROM `login_details` WHERE `user_name`='$username' ORDER BY `last_activity` DESC LIMIT 1";
		 $result = mysqli_query($con,$sql) or die("error ".mysqli_error($con));
		 while($row = mysqli_fetch_array($result))
		 {
			 $last_activity = $row['last_activity'];
		 }
		 return $row['last_activity'];
	 }  
?>