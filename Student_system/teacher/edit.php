<?php 
    session_start();
    $host = "localhost";
    $uname = "root";
    $passwd = "";
    $db = "dbname";
    $link = mysqli_connect($host,$uname,$passwd,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
<?php
    include '../conn/condb.php';
    $ID = $_SESSION['id'];
    $sql = "SELECT * FROM `check_login` WHERE `id` = '".$ID."'"; 
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($query)


?>
    <form name='Editmem' method='POST' action='./UpdateMem.php'>
    <br>
    <center><img class="mb-4" src="../img/goldgear1.png" alt="" width="150" height="150"></center>
    <center><h3> Change your password </h3></center>
    <input name="MID" type="hidden" id="MID" value="<?PHP echo $result['ID']?>">
    <center><br>   
   
        <center><h5> Password </h5></center> 
        <div class="col-md-3 mb-3">
        <input class="form-control" name="password" type="text" id="password" value="">
            </div>
            *รหัสผ่านต้องประกอบได้วย ตัวอักษรมากกว่า8ตัวประกอบไปด้วย เล็ก-ใหญ่และอักขระ
            <center><h5> Confrom Password </h5></center>
        <div class="col-md-3 mb-3">
        <input class="form-control" name="confirmpassword" type="password" id="password" value="">
            </div>
           
</center>
<br>
    <center>
        <input type="submit" name="Submit" value="Save"class="btn btn-danger"> &nbsp; <a href="../index.php"class="btn btn-outline-dark">Back</a>
    </center>
</form>  
</body>
</html>