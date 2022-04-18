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
    $servername = "localhost";
    $username = "sa";
    $password = "12345";
    $dbname = "DBTest";
    $Serch = $_GET["Serch"];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM customers WHERE ID LIKE '%$Serch%' OR Name LIKE '%$Serch%' OR LastName LIKE '%$Serch%'";
    $result = $conn->query($sql);
    $conn->close();
    ?>
    <div>
        <a href="index.php">بازگشت</a>
        <table>
            <tr>
                <th>شماره</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo ("<tr><td>" . $row["ID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["LastName"] . "</td><td><a href='EditForm.php?id=" . $row["ID"] . "'>تصحیح</a></td><td><a href='Delete.php?id=" . $row["ID"] . "'>حذف</a></td></tr>");
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>
</body>

</html>