<?php
    include_once("connect.php");
?>
<!DOCTYPE HTML>
<html>
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
	 
	 
  </head>


<body>
 
<?php
 
    $from_user = $_GET["from_user"];
	$to_user = $_GET["to_user"];
	
	
if (count($_POST) && (strpos($_POST['img'], 'data:image') === 0)) {
     
  $img = $_POST['img'];
   
  if (strpos($img, 'data:image/jpeg;base64,') === 0) {
      $img = str_replace('data:image/jpeg;base64,', '', $img);  
      $ext = '.jpg';
  }
  if (strpos($img, 'data:image/png;base64,') === 0) {
      $img = str_replace('data:image/png;base64,', '', $img); 
      $ext = '.png';
  }
   
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = 'uploads/img'.date("YmdHis").$ext;
   
  if (file_put_contents($file, $data)) {
	   
	  $sql = "INSERT INTO `files_details`(`to_user`, `from_user`, `file`)
	  VALUES ('$to_user','$from_user','$file')";
	  $result = mysqli_query($con,$sql);
      //echo "<p>The image was saved as $file.</p>";
	  //header("Location:chatbox.php");
	  echo "<p>The image sent</p>";
  } else {
      echo "<p>The image could not be saved.</p>";
  } 
   
}
                      
?>
 
 <div style="background-color:#3a73a9;margin:auto;text-align:center;border:1px solid #000;max-width:450px;">
      <h2 style="color:#fff;margin-bottom:6px;">Image Transfer</h2>
	     <hr>
       <div class="row">
	     <div class="col col-md-6">
		    <input style="margin-left:10px;width:200px;" class="btn btn-info btn-md" id="inp_file" type="file">
		 </div>
		 <div class="col col-md-6">
		   <form method="post" action="">
			<input id="inp_img" name="img" type="hidden" value="">
			<input style="margin-right:10px;width:200px;" id="bt_save" class="btn btn-info btn-md" type="submit" value="Send">
			</form>
		 </divR
	   </div>
	   <br><br>
	   
	   <a style="margin-bottom:10px;" class="btn btn-default" href="chatbox.php?chating_to_user=<?php echo $to_user;?>">Back</a>
 </div>
 
<script>
 
  function fileChange(e) { 
     document.getElementById('inp_img').value = '';
     
     var file = e.target.files[0];
 
     if (file.type == "image/jpeg" || file.type == "image/png") {
 
        var reader = new FileReader();  
        reader.onload = function(readerEvent) {
   
           var image = new Image();
           image.onload = function(imageEvent) {    
              var max_size = 300;
              var w = image.width;
              var h = image.height;
             
              if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
              } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }
             
              var canvas = document.createElement('canvas');
              canvas.width = w;
              canvas.height = h;
              canvas.getContext('2d').drawImage(image, 0, 0, w, h);
                 
              if (file.type == "image/jpeg") {
                 var dataURL = canvas.toDataURL("image/jpeg", 1.0);
              } else {
                 var dataURL = canvas.toDataURL("image/png");   
              }
              document.getElementById('inp_img').value = dataURL;   
           }
           image.src = readerEvent.target.result;
        }
        reader.readAsDataURL(file);
     } else {
        document.getElementById('inp_file').value = ''; 
        alert('Please only select images in JPG- or PNG-format.');  
     }
  }
 
  document.getElementById('inp_file').addEventListener('change', fileChange, false);    
         
</script>
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