<?php
$servername = "localhost";
$username = "sa";
$password = "12345";
$dbname = "DBTest";
$id = $_REQUEST["id"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM customers WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo ("<script> location.href='index.php'; </script>");
    exit;
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>