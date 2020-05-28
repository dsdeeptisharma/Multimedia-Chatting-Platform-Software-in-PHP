<?php
     include_once("connect.php");
	 $to_user= $_POST["to_user"];
	 $from_user= $_POST["from_user"];
	 $from_user = $from_user;
	 $msg = isset($_POST["msg"])?$from_user." : ".$_POST["msg"]:"";
	 $opr = $_POST["opr"];
	 switch($opr)
	 {
		 case "save_message":
		 {
			  $sql = "INSERT INTO `chatting_session_messages`(`to_user`, `from_user`, `messages`)
	          VALUES ('$to_user','$from_user','$msg')";
	          $result = mysqli_query($con,$sql);
			 break;
		 }
	 
	    case "show_message":
		{
		 $sql_show_message = "SELECT * FROM `chatting_session_messages` 
		 WHERE (`to_user`='$to_user' && `from_user`='$from_user') || (`to_user`='$from_user' && `from_user`='$to_user') LIMIT 20";
	     $result_show_message = mysqli_query($con,$sql_show_message);
		 if($result_show_message)
		  {
			 while($row = mysqli_fetch_array($result_show_message))
			 {
				 
				 echo "\n".$row[4];
				 
			 }
			break;
		  }
		  else
		  {
			  echo"sorry";
		  }
         break;		  
		}
		
		 case "show_images":
		{
		 $sql_show_images = "SELECT * FROM `files_details` 
		 WHERE (`to_user`='$to_user' && `from_user`='$from_user') || (`to_user`='$from_user' && `from_user`='$to_user') LIMIT 20";
	     $result_show_image = mysqli_query($con,$sql_show_images);
		 if($result_show_image)
		  {
			 while($row = mysqli_fetch_array($result_show_image))
			 {
				 echo "<br><br><img style='max-width:100px;max-height:100px;' class='img img-responsive img-thumbnail' src= '".$row[3]."'/>";
			 }
			break;
		  }
		  else
		  {
			  echo"sorry";
		  }
         break;		  
		}
	 }
		
	 
?>
