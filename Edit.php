<?php
$ID = $_POST["ID"];
$Name = $_POST["Name"];
$LastName = $_POST["LastName"];

$servername = "localhost";
$username = "sa";
$password = "12345";
$dbname = "DBTest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE customers SET Name='$Name',LastName='$LastName' WHERE ID=$ID";

if ($conn->query($sql) === TRUE) {
    echo ("<script> location.href='index.php'; </script>");
    exit;
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>