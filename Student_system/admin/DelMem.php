<html>
<body>
<center>
<font size="100" color="red">
<br>

<?php
 include '../conn/connect.php'; 
 $ID = $_GET['ID'];
 $status = $_GET['status'];
 
if($status == 'student'){
$sql = "DELETE FROM check_login WHERE username=".$ID;
$sql2 = "DELETE FROM student_tb WHERE Std_Code=".$ID;
$query2 = mysqli_query($conn, $sql2);
$query = mysqli_query($conn, $sql);
if($query==TRUE)
{
    echo"Delete Complete";
    echo"<META HTTP-EQUIV ='Refresh' CONTENT = '2;URL=./edit_student.php'>";
}
else
{
    echo "Error , can't Delete member";
      echo "<META HTTP-EQUIV='Refresh'CONTENT = '2;URL=./edit_student.php'>";
}

}
else if($status == 'teacher'){
    $sql = "DELETE FROM check_login WHERE username=".$ID;
    $sql2 = "DELETE FROM teacher_tb WHERE Teach_code=".$ID;
    $query2 = mysqli_query($conn, $sql2);

    $query = mysqli_query($conn, $sql);
if($query==TRUE)
{
    echo"Delete Complete";
    echo"<META HTTP-EQUIV ='Refresh' CONTENT = '2;URL=./edit_student.php'>";
}
else
{
    echo "Error , can't Delete member";
      echo "<META HTTP-EQUIV='Refresh'CONTENT = '2;URL=./edit_student.php'>";
}
}

mysqli_close($conn);

?>