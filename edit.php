<!DOCTYPE html>
<html>
<head>
	<title>Edit Username</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<style type="text/css">
        body{ font: 14px sans-serif; 
              height: 100%;

              /* The image used */
              background-image: url('imgs/login-background.jpg');
              /* Full height */
              height: 100%;
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
             /* background-size: cover;*/
          background-size: auto;}
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
	<?php
	session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include_once('config.php');

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$res = mysqli_query($link, "SELECT id, username FROM users WHERE id='$id'");
	$row = mysqli_fetch_array($res, MYSQLI_NUM);

}

if (isset($_POST['newName'])){
	$newName = $_POST['newName'];
	$id = $_POST['id'];
	$sql = "UPDATE users SET username='$newName' WHERE id='$id'";
	$res = mysqli_query($link,$sql) or die("Could not update".mysqli_error());
	echo "<meta http-equiv='refresh' content='0;url=users.php'>";
}


?>
<center>
<div class="wrapper">
	<h1>File Share</h1>
<img src="imgs/login-icon.png" style="width:100px;height:100px;"><br><br>
<form action="edit.php" method="POST">
	<h1>Name: <?php echo $row[1]; ?></h1><br><br>
	<label>Edit this name to: </label><br><br>
	<input type="text" name="newName" ><br/>
	<input type="hidden" name="id" value="<?php echo $row[0]; ?>"><br>
	<input class="btn btn-primary" type="submit" value=" Update">
</form>
</div>
</center>


</body>
</html>