
<!DOCTYPE html>

<html lang="en">
   <?php
        session_start();
		$username = $_SESSION['user'];
		error_reporting(E_ALL ^ E_WARNING); 
   ?>
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
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="css/.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	    label{
			    margin-top:10px;
			 }
	</style>
	<script>
	    
	    $(document).ready(function(){
			 //details();
			function details(){
				$.post("data.php",{
					        opr:"fetch_active_users",
							username:"<?php echo $username; ?>"
							
				},function(res){
					   $("#details").html(res);
				});
			}
			
			   setInterval(function(){
				 update_last_activity();
				 details();
			 },5000);  
			 
			
			
			 function update_last_activity()
			{
				$.post("data.php",{
					               opr:"update_last_activity"  
				},function(res){
					
				});
			} 
			

			
		});//document ready function
	 </script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
	      include_once("menu.php");
	?>

    <div class="container theme-showcase" role="main">

         <div class="jumbotron" style="box-shadow:2px 2px 10px #000;max-width:500px;margin:auto;margin-top:100px;">
             	 
				 <div id="details"> </div>  
		         
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
