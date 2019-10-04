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
$sqlSTD = "UPDATE `student_tb` SET `Std_Code`='".$code."',`Std_Pname`='".$Pname."',`Std_Fname`='".$Fname."',`Std_Lname`='".$Lname."',`Std_Tel`='".$tel."',`Std_Add`='".$add."',`Std_Birth`='".$Birth."',`Std_Card`='".$card."',`Std_Major`='".$major."',`Std_Faculty`='".$fac."' WHERE Std_Code = '".$_SESSION['id']."' ";
$querySTD = $conn->query($sqlSTD);

if($querySTD){
    
    echo $_SESSION['Std_edit'];
    $_SESSION['Std_edit'] = "";
    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='./student_text.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='./student_text.php';";
    echo "</script>";
}
}

    
?>