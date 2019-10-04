<?php
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "dbname";
$link = mysqli_connect($host,$uname,$passwd,$db);
mysqli_set_charset($link, "utf8");

if(!$link) {
    echo "Error: Unable to connect to MySQL.". PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}
?>