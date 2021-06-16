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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
        body{ font: 12px sans-serif; text-align: center; 
        height: 100%;

              /* The image used */
              background-image: url('imgs/login-background.jpg');
              /* Full height */
              height: 100%;
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: auto;}
        a:link {
            background-color: #00008B;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
        }

/* visited link */
        a:visited {
            background-color: #00008B;
            color: white;
            text-decoration: none;
             padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
        }

/* mouse over link */
        a:hover {
          background-color: #BDB76B;
          color: white;
          text-decoration: none;
           padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
        }

        /* selected link */
        a:active {
          background-color: #00008B
          color: white;
          text-decoration: none;
           padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
        }
    p.login { border-radius: 25px;
  border: 2px solid #00008B;
  padding: 20px; 
  width: 500px;
  height: 100px; }
  div.files { border-radius: 25px;
  border: 2px solid #00008B;
  padding: 20px; 
  width: 500px;
  height: 150px; }
    </style>
</head>
<body>
<center>
    <br>
    <img src="imgs/login-icon.png" style="width:100px;height:100px;">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Choose what you want to do:</h1>
    </div>
    <p class="login">
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <br><br>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <div class="files">
    
        <a href="upload-file.php">Upload File</a>
        <br><br>
        <a href="search-files.php">Search Files</a>
        <br><br>
        <a href="users.php">See Users</a>
        <br><br>
    </div>
</center>
</body>
</html>