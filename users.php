<!DOCTYPE html>
<html>
<head>
	<title>List of Users</title>
	<style type="text/css">
		.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  margin: auto;
  max-width: 800px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;


}

th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
  width: 100px;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
  width: 50px;
  height: 14px;
}
 
tr:hover td {
  background:#4E5066;
  color:	#4682B4;
  border-top: 1px solid #22262e;
  line-height: 14px;
}
 
tr:first-child {
  border-top:none;

}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#B0E0E6;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight: 300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
  table-layout:fixed;
  width:100px;
  
}
td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
  
}

td.text-left {
  text-align: left;
  
}

td.text-center {
  text-align: center;
  

}

td.text-right {
  text-align: right;
  
}


	</style>
</head>

<body>

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
    $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "projekat";
    
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
		mysqli_set_charset($conn,"utf8");


$sql = "SELECT id, username FROM users";
		$result = $conn->query($sql);
		


		if ($result->num_rows > 0) {
			echo '<table class="table-fill"><thead><tr><th>ID</th><th>Username</th><th>Delete User</th><th>Edit Username</th></tr></thead></table>';
		    // output data of each row
		    //echo "<form method='POST' action='#'>";
		    while($row = $result->fetch_assoc()) {



		        echo "<table class='table-fill'><tbody class='table-hover'><tr><td class='text-left'><span id='".$row["id"]. "'>" . $row["id"] . " <td> " . $row["username"] . " <td><button onclick='deleteUser(this);' id='" . $row["id"] ."'>Delete</td></button> " . "<td><button><a href='edit.php?edit=$row[id]'> Edit</button></a></button></td></span></td></tr></table>";
		    }
		  
		} else {
		    echo "0 results";
		}

		$conn->close();
		?>
	</p>
	
	
</body>
<script type="text/javascript">
	function deleteUser(element){//BRISANJE REDA

		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		     var odg = this.responseText;
		     
		     
			 var spanic = document.getElementById(element.id).parentNode;
			
			 while(spanic.children.length>0){
			 	spanic.removeChild(spanic.lastChild);
			 }
			 spanic.style.color='rgba(90,0,0,0.3)';
			
		    }
		  };
		  xhttp.open("GET", "delete.php?id=" + element.id, true);
		  xhttp.send();

	}

	

	
</script>
</html>
