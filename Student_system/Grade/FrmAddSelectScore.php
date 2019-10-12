<html>
<body>
<center>
<font size="100" color="blue">

<br>
<?php
session_start();
include_once('../conn/connect.php');
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];

if(($_POST['G_code']!="")AND($_POST['A']!="")){
    $sql = "INSERT INTO `edit_grade`(`G_code`, `A`, `B+`, `B`, `C+`, `C`, `D+`, `D`) VALUES ('".$_POST['G_code']."','".$_POST['A']."','".$_POST['B+']."','".$_POST['B']."','".$_POST['C+']."','".$_POST['C']."','".$_POST['D+']."','".$_POST['D']."')";
   
    

    $query = mysqli_query($conn, $sql);
    
    if($query)
    {
        echo"Insert Success <br>";
        echo"<META HTTP-EQUIV ='Refresh' CONTENT = '2;./GradeManager.php?SubName=$SubName&ID=$SubCode'>";?>
        
        <?php
        
    }
    else{
        echo "Error , Insert Again";
      echo "<META HTTP-EQUIV='Refresh'CONTENT = '2;URL=admin.php'>";
    }
    mysqli_close($conn);
}
else
{
    echo "Error , Please Insert รหัสเกณณ์";
    echo "<META HTTP-EQUIV='Refresh'CONTENT = '3;URL= ./AddSelectScore.php'>";?>
 <img src="http://www.charoentech.com/assets/img/blog/%E0%B9%84%E0%B8%A1%E0%B9%88%E0%B9%81%E0%B8%AA%E0%B8%94%E0%B8%87%E0%B8%A3%E0%B8%B2%E0%B8%A2%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9A%E0%B8%B1%E0%B8%99%E0%B8%97%E0%B8%B6%E0%B8%81.jpg">
    <?php
  
}
?>

</center>
</body>
</html>