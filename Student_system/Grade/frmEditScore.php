<html>
<body>
<center>
<img src="http://www.innesvienna.net/Theme/img/success.png">
<font size="10" color="blue">
<br>

<?php
session_start();
include_once('../conn/connect.php');
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];

 $ID = $_POST['MID'];
 $sql = "UPDATE `edit_grade` SET `G_code`='".$_POST['G_code']."',`A`='".$_POST['A']."',`B+`='".$_POST['B+']."',`B`='".$_POST['B']."',`C+`='".$_POST['B+']."',`C`='".$_POST['C']."',`D+`='".$_POST['D+']."',`D`='".$_POST['D']."' WHERE ID=".$ID;
$query = mysqli_query($conn, $sql);

if($query==TRUE)
{
    echo"UPdate Complete";
    echo"<META HTTP-EQUIV ='Refresh' CONTENT = '2;URL=./GradeManager.php?SubName=$SubName&ID=$SubCode'>";
}
else
{
    echo "Error , can't UPdate member";
      echo "<META HTTP-EQUIV='Refresh'CONTENT = '2;URL=admin.php'>";
}
mysqli_close($conn);
?>

</center>
</body>
</html>
