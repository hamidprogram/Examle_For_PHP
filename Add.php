<?php
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

$sql = "INSERT INTO customers (Name, LastName)
VALUES ('$Name', '$LastName')";

if ($conn->query($sql) === TRUE) {
    echo ("<script> location.href='index.php'; </script>");
    exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>