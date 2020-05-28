<?php
    session_start();
	include_once("connect.php");
	include_once("function.php");
    
	$opr = $_POST["opr"];
	switch($opr)
	{
		
		case "new_user_create":  //case to create a new user (signup form)
		   {    
		        $username = $_POST["username"];
				$password = md5($_POST["password"]);
				$secret_question = $_POST["secret_question"];
				$secret_answer = $_POST["secret_answer"];
		        $sql = "INSERT INTO `user`(`user_name`, `password`, `secret_question`, `answer`)
				VALUES ('$username','$password','$secret_question','$secret_answer')";
				$result = mysqli_query($con,$sql);
				if($result)
				{
					echo"User is created!";
				}
				else
				{
					echo"Failed to create the user!";
				}	
		        echo"new user created!";
				break;
	        }		
		case "login":
		   { 
			    $username = $_POST["username"];
				$password = md5($_POST["password"]);
				$sql = "SELECT * FROM `user` WHERE `user_name`='$username' && `password`='$password'";
		        
				$result = mysqli_query($con,$sql);
				$count = mysqli_num_rows($result);
				if($count>0)
				{
				   $_SESSION["user"] = $username;
				   //$date = date('Y-m-d');
				   $sql_active_user = "INSERT INTO `active_user`(`user_name`) 
				   VALUES ('$username')";
				   $result_active_user = mysqli_query($con,$sql_active_user);  
				   $sql_login_details = "INSERT INTO `login_details`( `user_name`)
				   VALUES ('$username')";
				   $result_login_details = mysqli_query($con,$sql_login_details);
				   if($result_login_details)
				   {
					 $sql_last_login_details_id = "SELECT * FROM `login_details` ORDER BY `login_details_id` DESC LIMIT 1";
					 $result_last_login_details_id = mysqli_query($con,$sql_last_login_details_id);
					   while($rr = mysqli_fetch_array($result_last_login_details_id))
					   {
						   $last_id = $rr[0];
					   }
					      $_SESSION['login_details_id'] = $last_id;
					 echo "true";   
				   }
				   else{
					   echo"false";
				       }
				    
				}
				else
				{
					echo"false";
				}	
				break;
		   }
		   case "session_request_sent":
		   {   
		         $user1 = $_POST['user1'];
				 $user2 = $_POST['user2'];
				 $date = date('Y-m-d h:i:s a', time());
				 $sql = "INSERT INTO `chatting_session_request`(`user1`, `user1_confirm`,`user2`,`date_time`)
				 VALUES ('$user1',1,'$user2','$date')";
				 $result = mysqli_query($con,$sql);
				 if($result)
				 {
					 echo "Request sent";
				 }
		         else
				 {
					 echo "error".mysqli_error($con);
				 } 
		         break;
		   }
		
		   case "test_for_request":
		   {     $user1 = $_POST["user1"];
				 $sql = "SELECT * FROM `chatting_session_request` WHERE `user2`='$user1' && `user2_confirm`=0 ORDER BY `date_time` DESC ";
		         $result = mysqli_query($con,$sql);
				 if($result)
				 {
					 $count = mysqli_num_rows($result);
					 if($count<=0)
					 {
						 echo "false";
					 }
					 else
					 {
						 while($row = mysqli_fetch_array($result))
					     {
						   $user2 = $row[1];
					     }
					     echo $user2; 
					 }	 
					
				 }
				 else
				 {
					 echo "".mysqli_error($con);
				 }
				  break;				 
		   }
		   
		   case "fetch_active_users":
		   {
 			      $username = $_POST["username"];
				  $sql = "SELECT * FROM `active_user` WHERE `user_name`!='$username'";
				  $result = mysqli_query($con,$sql);
				  $cnt = mysqli_num_rows($result);
				  if($cnt==0)
				  {
					  echo"<h3>You are the only Active User !</h3>";
					  exit();
				  }
				  if($result)
				  {
					  echo"<h2 style='text-align:center;' class='text-danger'>Active Users</h2>";
					  echo"<table class='table table-responsive table-bordered'>";
					  echo"<thead>"; 
					    echo"<th>Users</th> <th>Status</th> <th>Action</th>";
					  echo"</thead>";
					  echo"<tbody>";
					  while($row = mysqli_fetch_array($result))
					  {
						 $status = '';
						  $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                          $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
						  $user_last_activity = fetch_user_last_activity($username,$con);
						  if($user_last_activity < $current_timestamp)
							{
								$status = '<span class="label label-success">Online</span>';
							}
						  else
							{
								$status = '<span class="label label-danger">Offline</span>';
							}  
							/* $status=$user_last_activity; */
						 echo"<tr>";
                         echo"<td>".$row[1]."</td> <td>".$status."</td> <td><a href='chatbox.php?chating_to_user=".$row[1]."' class='btn btn-sm btn-primary start_chat' data-touserid=".$row[1]." data-tousername=".$row[1].">Start</a></td>";
						 echo "</tr>";						 
					  }
					  echo"</tbody>";
					  echo"</table>";
				  }
				  else
				  {
					  echo"error";
				  }
				  break;
		   }
		   
		     case "update_last_activity":
		   {
			      $last_id = $_SESSION['login_details_id'];
				  $now = now();
				  $sql = "UPDATE `login_details` SET `last_activity`='$now'
				  WHERE `login_details_id` = '$last_id'";
				  $result = mysqli_query($con,$sql);
				  break;
		   } 
		   
		    case "resetpassword":
		   {
			       $username = $_POST['username'];
				   $new_password = md5($_POST['newpassword']);
				   $sql = "UPDATE `user` SET `password`='$new_password' WHERE `user_name`='$username'";
				   $result = mysqli_query($con,$sql);
				   if($result)
				   {
					   echo"Password Changed Successfully!";
				   }
				  break;
		   } 
           
            case "secret_question_verification":
			        $username = $_POST['username'];
					$secret_question= $_POST['secret_question'];
					$answer=$_POST['answer'];
				      $sql = "SELECT * FROM `user` WHERE `user_name`='$username' && `secret_question`='$secret_question' && `answer`='$answer'";
					  $result = mysqli_query($con,$sql);
					  $cnt = mysqli_num_rows($result);
					  if($cnt>0)
					  {
						 $_SESSION['username']=$username;
						 echo"true"; 
						 
					  }
					  else
					  {
						  echo"false";
					  }	  
					 break;
			
					  
	}
?>