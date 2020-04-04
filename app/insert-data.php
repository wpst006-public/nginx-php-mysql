<?php
$servername = "mysqldb";
$username = "root";
$password = "root";
$dbname = "test_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS persons (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL  
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
	
	$data=[
		"id"=>1,
		"firstname"=> "John",
		"lastname"=> "Smith"
	];
	$sql = "INSERT INTO persons (id,firstname, lastname) VALUES (:id,:firstname,:lastname)";
$conn->prepare($sql)->execute($data);

	$data=[
		"id"=>2,
		"firstname"=> "Henry",
		"lastname"=> "Lynn"
	];
	
$sql = "INSERT INTO persons (id,firstname, lastname) VALUES (:id,:firstname,:lastname)";
$conn->prepare($sql)->execute($data);

    echo "Table persons created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>