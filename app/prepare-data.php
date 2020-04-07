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

// sql to create table
$crete_table_sql = "CREATE TABLE IF NOT EXISTS persons (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL  
)";

if ($conn->query($crete_table_sql) === TRUE) {
	echo "Table persons created successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

echo "<br/><br/>";

$sql = "INSERT INTO persons (firstname, lastname)
VALUES ('Adam', 'Smith');";
$sql .= "INSERT INTO persons (firstname, lastname)
VALUES ('John', 'Herit');";
$sql .= "INSERT INTO persons (firstname, lastname)
VALUES ('Lilly', 'Win');";

if ($conn->multi_query($sql) === TRUE) {
	echo "New records created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>