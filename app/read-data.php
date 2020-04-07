<?php
$servername = "mysqldb";
$username = "root";
$password = "root";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["id"]. " - " . $row["firstname"]. " " . $row["lastname"]. "<br/>";
    }
} else {
    echo "No results";
}
$conn->close();
?>