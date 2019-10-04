<?php
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "dbsd"; 

$conn = new mysqli($host,$uname,$passwd,$db);
$conn->set_charset('utf8');
if($conn->connect_error){
    echo "CONNECT ERROR".$conn->connect_error;
    exit();}
?>