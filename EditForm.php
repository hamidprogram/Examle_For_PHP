<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamid Master</title>
</head>

<body dir="rtl" style="display: flex;justify-content: center;">
    <?php
    $id = $_REQUEST["id"];
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

    $sql = "SELECT * FROM customers WHERE ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idshow = $row["ID"];
    $nameshow = $row["Name"];
    $lastnameshow = $row["LastName"];


    $conn->close();
    echo("<form method='POST' action='Edit.php'><input type='hidden' id='ID' name='ID' value='".$idshow."'><br><label for='fname'>نام:</label><br><input type='text' id='Name' name='Name' value='".$nameshow."'><br><label for='lname'>نام خانوادگی:</label><br><input type='text' id='LastName' name='LastName' value='".$lastnameshow."'><input type='submit' value='ثبت'></form>");
    ?>
</body>

</html>