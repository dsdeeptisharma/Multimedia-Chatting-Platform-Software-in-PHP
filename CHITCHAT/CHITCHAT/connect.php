<?php
      
	 $host = "localhost";
	 $user = "root";
	 $pwd = "";
	 $db = "db_chatting";
	 $con = mysqli_connect($host,$user,$pwd,$db);
	 if(!$con)
	 {
		 echo"Connection Failed!";
	 }
	 
	 
?>