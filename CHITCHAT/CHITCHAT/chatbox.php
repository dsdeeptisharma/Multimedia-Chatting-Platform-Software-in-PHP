<?php
  
    session_start();
     if(!isset($_SESSION["user"]))
	 {
		 header("Location:login.php");
	 }
   $username = $_SESSION["user"];
   include_once("connect.php");
    $chating_to_user = $_GET['chating_to_user'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
   

    <title>CHITCHAT</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <script>
	  
	    $(document).ready(function(){
			
                 setInterval(function(){ 
		              show_message();
		   }, 500);	

           setInterval(function(){ 
		              show_images();
		   }, 500);	 		   
			   
               function show_message()
			   {
				   $.post("message_saving.php",{
					                     from_user: "<?php echo $username;?>",
										  to_user: "<?php echo $chating_to_user?>",
										  opr:"show_message"
								   
				   },function(res){
					   $("#msg1").val(res);
					   $('#msg1').scrollTop($('#msg1')[0].scrollHeight);  
				   });
			   }

                function show_images()
			   {
				   $.post("message_saving.php",{
					                     from_user: "<?php echo $username;?>",
										  to_user: "<?php echo $chating_to_user?>",
										  opr:"show_images"
								   
				   },function(res){
					   $("#img").html(res);
					  //alert(res);
				   });
			   }			   
			  
			  $("#msg_submit").click(function(){
			   var msg_text = $("#wmsg1").val();
			      if(msg_text=="")
				  {
					  $("#wmsg1").focus();
					  exit();
				  }
                 $("#msg1").val($("#msg1").val()+"\n"+msg_text);
				 $.post("message_saving.php",{
					                      msg:msg_text,
										  from_user: "<?php echo $username;?>",
										  to_user: "<?php echo $chating_to_user?>",
										  opr:"save_message"
				 },function(res){
					 $("#wmsg1").val("");
				 $("#wmsg1").focus();
				  });
				
			    });
				
				 $(".user1").click(function(){
				 var you = "<?php echo $username;?>";
				 var user2 = $(this).val();
				 if($(this).val()==you)
				 {
					 alert("chatting with yourself not possible");
				 }
				 else
				 {
					 $.post("data.php",{
						           user1:you,
                                   user2:user2,								   
                                   opr:"session_request_sent"								   
					 },function(res){
						             alert(res);
									 
					 });
				 }	 
			});
			
		
			
			
		});//document ready function
	 </script>
	 <style>
	    #user_list{
			
			min-height:400px;
			min-width:100px;
			
		}
	 </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
	      include_once("menu.php");
	?>

    <div class="container theme-showcase" role="main">
       <div class="row">
	      <div class="col col-md-6">
		       
		     <div class="jumbotron" style="box-shadow:2px 2px 10px #000;max-width:500px;margin:auto;margin-top:80px;">
		        <h4 style="margin-top:-10px;">You logged in as: <?php echo $username;?></h4>
				
				<textarea readonly style="min-height:200px;" id="msg1" class="form-control"></textarea>
				<br>
				<label>Type Here</label>
				<textarea id="wmsg1" class="form-control"></textarea>
				<div style="margin-top:20px;text-align:center;">
				  
				  <button id="msg_submit" class="btn btn-md btn-success">Submit</button>
				  <a href="send_image.php?from_user=<?php echo $username; ?>&to_user=<?php echo $chating_to_user;?>" id="image_send" class="btn btn-md btn-success">Image Send</a>
				  <br>
				  
				</div>
		     </div>
		  </div>
		  <div class="col col-md-6">
		     <div class="jumbotron" style="box-shadow:2px 2px 10px #000;max-width:500px;margin:auto;margin-top:80px;">
		        <h2 style="margin-top:-10px;">Files exchange</h2>
				<div  id="img">
				  
				</div>
				
			 </div>
			 
		  
		  </div>
		  </div>
		 
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
