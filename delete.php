<?php

$servername = "sql102.epizy.com";
$username = "epiz_26093693";
$password = "U9om7UHPYaJytL";
$dbname = "epiz_26093693_projekat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
// sql to delete a record
$sql = "DELETE FROM users WHERE id=' " . $_GET['id'] . "';";

if ($conn->query($sql) === TRUE) {
    echo "Successfully deleted!";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>