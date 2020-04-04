<?php
//echo phpinfo();die();
mysqli_connect("mysqldb", "root", "root") or die(mysqli_error());

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

echo "Connected to MySQL<br />";
?>