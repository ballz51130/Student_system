<?php
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "dbsd";
$conn = mysqli_connect($host,$uname,$passwd,$db);
mysqli_set_charset($conn, "utf8");

if(!$conn) {
    echo "Error: Unable to connect to MySQL.". PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
?>