
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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	    label{
			    margin-top:10px;
			 }
		.mandatory{
				 color:#f00;
				 font-size:18px;
				 line-height:20px;
			 }
	</style>
	<script>
	    $(document).ready(function(){
			$("#submit").click(function(){
  			    var username = $("#username").val();
				var password = $("#password").val();
				if(username==""||password=="")
				{
					alert("All Fields are mandatory!");
					exit();
				}
                $.post("data.php",{
					              username:username,
								  password:password,
								  opr:"login"
								  
				},function(res){
					
					if(res=="true")
					{
						window.location.replace("active_users.php");
					}
					else
					{
						alert("Invalid Username/Password!");
					}
					$("#username").val("");
					$("#password").val(""); 
					$("#username").focus();
				
				});				
			});
		});
	 </script>
	 
  </head>

  <body>

    <!-- Fixed navbar -->
    <?php
	      include_once("menu.php");
	?>

    <div class="container theme-showcase" role="main">

         <div class="jumbotron" style="box-shadow:2px 2px 10px #000;max-width:500px;margin:auto;margin-top:100px;">
             	   
		   <h2 style="text-align:center;">Login</h2>
		      <br>
			 <label style="text-align:left;">User Name<span class="mandatory">*</span></label>
             <input type="text" class="form-control" id="username"/>
			 
			  <label style="text-align:left;">Password<span class="mandatory">*</span></label>
             <input type="password" class="form-control" id="password"/>
			 <a href="secret_question.php">Forget Password?</a>
			   <div style="text-align:center;"><br>
			   <button id="submit" class="btn btn-success btn-md">Submit</button></div>
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