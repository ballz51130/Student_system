<?php
session_start();
include '../conn/connect.php';
$ID = $_GET['id'];
$SubName = $_SESSION['SubName'];
$sqlchang = "SELECT * FROM `edit_grade` WHERE G_code = '1'";
$querychang = $conn->query($sqlchang);
while($rowchang = $querychang->FETCH_ASSOC()){
    $sql = "UPDATE `edit_grade` SET `G_code`= '0' WHERE ID = '".$rowchang['ID']."'";
    $query = $conn->query($sql); 
}



$sqlcheck = "SELECT * FROM `edit_grade` WHERE `G_code` = '".$_GET['sum']."'";
$querycheck = $conn->query($sqlcheck);

while($row = $querycheck->FETCH_ASSOC()){

    $sql = "UPDATE `edit_grade` SET `G_code`= '1' WHERE ID = '".$row['ID']."'";
    $query = $conn->query($sql);   

}


$sqlchang2 = "SELECT * FROM `edit_grade` WHERE `G_code` = '0'";
$querychang2 = $conn->query($sqlchang2);
while($rowchang2 = $querychang2->FETCH_ASSOC()){
    $sql = "UPDATE `edit_grade` SET `G_code`= '".$_GET['sum']."' WHERE ID = '".$rowchang2['ID']."'";
    $query = $conn->query($sql); 
}


if($query==TRUE)
{
    header( "location:  ./GradeManager.php?ID=<?php echo $ID ?>&SubName<?php echo $SubName ?>");
}
else
{
    header( "location: ../../view/setScore/SubjectList.php?susccess=2");
}
mysqli_close($conn);
?>