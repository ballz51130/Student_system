<?php
session_start();
$host = "localhost";
$uname = "root";
$passwd = "";
$db = "dbsd";
$link = mysqli_connect($host,$uname,$passwd,$db);
$sqlC = "SELECT * FROM check_login WHERE username ='".$_POST['username']."'";
$queryC = mysqli_query($link, $sqlC);
$resultC = mysqli_fetch_array($queryC,MYSQLI_ASSOC);


if(!$link) {
    echo "Error: Unable to connect to MySQL.". PHP_EOL;
    exit;
}
if($resultC["status"]=="teacher"){
$userName = mysqli_real_escape_string($link,$_POST['username']);
$str_passMd5 = mysqli_real_escape_string($link,$_POST['password']);
$str_passMd5 =md5($str_passMd5);
}
else{
    $userName = mysqli_real_escape_string($link,$_POST['username']);
    $str_passMd5 = mysqli_real_escape_string($link,$_POST['password']);  
}

$sql = "SELECT * FROM check_login WHERE username ='".$_POST['username']."' AND password ='".$str_passMd5."'";
$query = mysqli_query($link, $sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
$_SESSION['id']=$_POST['username'];
if(!$result)
{
    echo "Username OR Password Incorrect";
    echo "<META HTTP-EQUIV='Refresh' CONTENT ='3;URL=../index.php'>";
}
else
{ if($result["status"]=="admin")
    {
        $_SESSION['Type_id'] = 1;
        $_SESSION['Mem_user'] = $result['username'];
        header("location: ../profile/MainProfile.php");
    }
    else if($result["status"]=="teacher")
    {
        $_SESSION['Type_id'] = 2;
        $_SESSION['Mem_user'] = $result['username'];
        header("location: ../profile/MainProfile.php");
    }
    else
    {
        $_SESSION['Type_id'] = 3;
        $_SESSION['Mem_user'] = $result['username'];
        header("location: ../student/student_text.php");
    }
}


    
mysqli_close($link);
?>
