<?php
     //error_reporting(E_ERROR | E_PARSE);     
	 include_once("connect.php");
	  session_start();  
	  $username = $_SESSION["user"];
	  $sql = "DELETE FROM `active_user` WHERE `user_name`='$username'";
	  $result = mysqli_query($con,$sql);
	  
	  unset($_SESSION["user"]);
      echo"<script>";
      echo"alert('You are successfully logout!');";
	  echo"</script>";	  
	  echo"<meta http-equiv='refresh' content='0;url=index.php'>";
?>