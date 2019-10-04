<?php
session_start();
include '../conn/connect.php';
$code = $_SESSION['id'];
$Pname  = $_POST['txtPname'];
$Fname = $_POST['txtFname'];
$Lname  = $_POST['txtLname'];
$tel  = $_POST['txttel'];
$add = $_POST['txtbadd'];
$Birth  = $_POST['txtbirth'];
$Email  = $_POST['txtEmail'];
$pass = $_POST['txtPass'];
$card = $_POST['txtidcard'];
$major  = $_POST['txtmajor'];
$fac  = $_POST['txtfac'];
if($_SESSION['id']!=null){
$sqlTCH = "UPDATE `teacher_tb` SET `Teach_code`='".$code."',`Teach_Pname`='".$Pname."',`Teach_Fname`='".$Fname."',`Teach_Lname`='".$Lname."',`Teach_Tel`='".$tel."',`Teach_Add`='".$add."',`Teach_Birth`='".$Birth."',`Teach_Card`='".$card."',`Teach _Major`='".$major."',`Teach _Faculty`='".$fac."' WHERE Teach_code = '".$_SESSION['id']."' ";
$queryTCH = $conn->query($sqlTCH);
print_r($sqlTCH);
if($queryTCH){

    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='../profile/MainProfile.php'";
    echo "</script>";
   
}else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../profile/MainProfile.php'";
    echo "</script>";
}
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../profile/MainProfile.php'";
    echo "</script>";
}

?>