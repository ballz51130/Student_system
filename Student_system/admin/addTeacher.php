<?php
session_start();
include '../conn/connect.php';
$code = $_POST['txtcode'];
$Pname  = $_POST['txtPname'];
$Fname = $_POST['txtFname'];
$Lname  = $_POST['txtLname'];
$tel  = $_POST['txttel'];
$add = $_POST['txtbadd'];
$Birth  = $_POST['txtbirth'];
$Email  = $_POST['txtEmail'];
$pass = md5($_POST['txtPass']);
$card = $_POST['txtidcard'];
$major  = $_POST['txtmajor'];
$fac  = $_POST['txtfac'];

$sqlSTD = "INSERT INTO `teacher_tb`(`Teach_code`, `Teach_Pname`, `Teach_Fname`, `Teach_Lname`, `Teach_Birth`, `Teach_Add`, `Teach_Tel`, `Teach_Card`, `Teach _Major`, `Teach _Faculty`)
VALUES('".$_POST['txtcode']."','".$_POST['txtPname']."','".$_POST['txtFname']."','".$_POST['txtLname']."','".$_POST['txttel']."','".$_POST['txtbadd']."','".$_POST['txtbirth']."','".$_POST['txtidcard']."','".$_POST['txtmajor']."','".$_POST['txtfac']."')";
$sqlMem = "INSERT INTO `check_login`(`first_name`, `last_name`, `Code_id`, `username`, `password`, `status`) VALUES ('".$_POST['txtPname']."','".$_POST['txtLname']."','".$_POST['txtcode']."','".$_POST['txtcode']."','".$pass."','teacher')";
$querySTD = $conn->query($sqlSTD);
$queryMem = $conn->query($sqlMem);

if($querySTD){
if($queryMem){

    echo "<script>";
    echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='./admin_text.php';";
    echo "</script>";}
else {
    echo "<script>";
    echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
    echo "window.location='./admin_text.php';";
    echo "</script>";
}
}

    
?>