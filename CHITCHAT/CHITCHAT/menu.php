<?php
    if(!isset($_SESSION))
	{
		session_start();
	}
	$user = isset($_SESSION["user"])?$_SESSION["user"]:"";
		
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CHITCHAT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
			            
			<li><a href="active_users.php">Active Users</a></li>
			<?php
			    if(isset($_SESSION["user"]))
				{
					
					echo'
					   <li><a href="Logout.php">Logout</a></li>
					';
				}
				else
				{
					echo'<li><a href="newuser.php">New User</a></li>';
					echo'
					   <li><a href="login.php">Login</a></li>
					';
				}	
			?>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>