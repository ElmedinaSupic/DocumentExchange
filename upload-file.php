<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Exo+2:400,700,500,300);

body {
  background: #ebeff2;
  font-family: "Exo 2";
}

.zone {      
  margin: auto;
  position: absolute;
  top: 0; left: 0; bottom: 0; right: 0;
  background: radial-gradient(ellipse at center,#99ccff 0,#00008B 100%);
  width:80%;
  height:50%;  
  border:5px dashed white;
  text-align:center;
  color: white;
  z-index: 20;
  transition: all 0.3s ease-out;
  box-shadow: 0 0 0 1px rgba(255,255,255,.05),inset 0 0 .25em 0 rgba(0,0,0,.25);
  .btnCompression {
    .btn {

    } 
    .active {
      background: #EB6A5A;
      color:white;
    }
  }
  
  .selectFile {
    height: 50px;
    margin: 20px auto;
    position: relative;
    width: 200px;          
  }

  label, input {
    cursor: pointer;
    display: block;
    height: 50px;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    border-radius: 5px;          
  }

  label {
    background: #fff;
    color:#EB6A5A;
    display: inline-block;
    font-size: 1.2em;
    line-height: 50px;
    padding: 0;
    text-align: center;
    white-space: nowrap;
    text-transform: uppercase;
    font-weight: 400;   
    box-shadow: 0 1px 1px gray;
  }

  input[type=file] {
    opacity: 0;
  }

}

	</style>
	
</head>
<body>

	<div class="zone">
		<br><br>

		
		
		<img src="imgs/upload-png.png" style="width:100px;height:100px;">
		
		

		
	<div class="selectFile">
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<input  type="file" name="file" id="file">
		<button type="submit" name="submit">UPLOAD</button>
	</form>
</div>
<p> File size limit : 20 MB</p>
</div>

</body>
</html>