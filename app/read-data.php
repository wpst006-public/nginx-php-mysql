<?php
$servername = "mysqldb";
$username = "root";
$password = "root";
$dbname = "test_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to query table
    $sql = "SELECT * FROM persons";    
	
	foreach ($conn->query($sql) as $row){
		//var_dump($row);
		echo $row["id"] . " - " . $row["firstname"] . " " . $row["lastname"] . "<br/>";
	}
	
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>