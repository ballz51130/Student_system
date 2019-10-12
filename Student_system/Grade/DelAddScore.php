<html>
<body>
<?php
session_start();
include_once('../conn/connect.php');
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];

 $ID = $_GET['ID'];
$sql = "DELETE FROM `edit_grade` WHERE G_code ".$ID;
$query = mysqli_query($conn, $sql);
if($query==TRUE)
{
    echo"Delete Complete";
    echo"<META HTTP-EQUIV ='Refresh' CONTENT = '2;./GradeManager.php?SubName=$SubName&ID=$SubCode'>";
}
else
{
    echo "Error , can't Delete ";
      echo "<META HTTP-EQUIV='Refresh'CONTENT = '2;./GradeManager.php?SubName=$SubName&ID=$SubCode'>";
}
mysqli_close($conn);
?>

</body>
</html>
