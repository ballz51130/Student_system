<?php
session_start();
include_once('../conn/connect.php');


if($_SESSION['Type_id'] == 1){
    $name = "admin";
    $img = "admin.jpg";
    error_reporting(0);
}
else if($_SESSION['Type_id'] == 2){
    $sqlTC = "SELECT * FROM teacher_tb WHERE Teach_code = '".$_SESSION['id']."'";
    $queryTC = $conn->query($sqlTC);
    $resultTC  = $queryTC ->FETCH_ASSOC();
    $name = $resultTC['Teach_Pname']." ".$resultTC['Teach_Fname']." ".$resultTC['Teach_Lname'];
    $birth = $resultTC['Teach_Birth'];
    $card = $resultTC['Teach_Card'];
    $code = $resultTC['Teach_code'];
    $faculty = $resultTC['Teach _Faculty'];
    $major = $resultTC['Teach _Major'];
    $img = $resultTC['Teach _Image'];
}
else {
    $sqlSTD = "SELECT * FROM student_tb WHERE Std_code = '".$_SESSION['id']."'";
    $querySTD = $conn->query($sqlSTD);
    $resultSTD = $querySTD->FETCH_ASSOC();
    $name = $resultSTD['Std_Pname']." ".$resultSTD['Std_Fname']." ".$resultSTD['Std_Lname'];
    $birth = $resultSTD['Std_Birth'];
    $card = $resultSTD['Std_Card'];
    $code = $resultSTD['Std_Code'];
    $faculty = $resultSTD['Std_Faculty'];
    $major = $resultSTD['Std_Major'];
    $img = $resultSTD['Std_Image'];
}

$ID = $_GET['ID'];
$_SESSION['SubName'] = $_GET['SubName'];

$sqlsub ="SELECT * FROM `subject_tb` 
WHERE Sub_code = '".$ID."'";
$querysub = $conn->query($sqlsub);
$resultsub = $querysub -> FETCH_ASSOC();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>จัดการผลการเรียน</title>

</head>

<body class="#">
   
<??>
<?php error_reporting(0); if($_GET['success'] == 1){ ?>
<div class="alert alert-success mt-2" role="alert">
สำเร็จ
</div>

<?php }else if($_GET['success'] == 2) { ?>
<div class="alert alert-danger" role="alert">
มีบางอย่างผิดพลาด ลองอีกครั้ง
</div> <?php } error_reporting(0);?>
<!-- end alert  -->
            <div class="eiei p-5 mt-5">
            <table class="table table-bordered mt-3">
                    <thead>
                      <tr>
                        <th scope="col"><div  align="center">ภาคเรียน</th></div>
                        <th scope="col"><div  align="center">รหัสแผนการเรียน</th></div>
                        <th scope="col"><div  align="center">ชื่อแผนการเรียน</th></div>
                        <th scope="col"><div  align="center">รหัสนักศึกษา</th></div>
                        <th scope="col"><div  align="center">ชื่อ - นามสกุล</th></div>
                        <th scope="col"><div  align="center">คะแนน</th></div>
                        <th scope="col"><div  align="center">เกรด</th></div>
                        <th scope="col"><div  align="center">จัดการ</th></div>
                      </tr>
                    </thead>
                </div>
    <?php
        $sqlshow = "SELECT DISTINCT course_tb.Cos_term, register_tb.Cos_code, coursename_tb.Cos_name, register_tb.Std_code, 
                    student_tb.Std_Fname, student_tb.Std_Lname ,course_tb.Sub_Code
        
                FROM register_tb
                INNER JOIN course_tb
                ON register_tb.Cos_code = course_tb.Cos_code
                INNER JOIN student_tb
                ON register_tb.Std_code = student_tb.Std_code
                INNER JOIN coursename_tb
                ON course_tb.Cos_code = coursename_tb.Cos_code
                WHERE course_tb.Sub_Code = '".$ID."' and course_tb.Cos_term = '1/2561'
                ORDER BY register_tb.Std_code";
        $queryshow = $conn->query($sqlshow);
        while($resultG = $queryshow->FETCH_ASSOC()) {
            
            $sqlgrade = "   SELECT * FROM `grade_tb` 
                            WHERE `Std_code` ='".$resultG['Std_code']."' 
                            AND  `Grad_Term` = '".$resultG['Cos_term']."'
                            AND `Sub_code` = '".$resultG['Sub_Code']."' ";
            $querygrade = $conn->query($sqlgrade);
            $resultgrade = $querygrade->FETCH_ASSOC();
    
        error_reporting(0);
        ?>
            <tr>        
            <td><div align="center">
            <?php echo $resultG['Cos_term'];?></div></td>   
            <td><div align="center">
            <?php echo $resultG['Cos_code'];?></div></td>
            <td><div align="center">
            <?php echo $resultG['Cos_name'];?></div></td>
            <td><div align="center">
            <?php echo $resultG['Std_code'];?></div></td>
            <td><div align="center">
            <?php echo $resultG['Std_Fname'];echo"&nbsp&nbsp";echo $resultG['Std_Lname'];?></div></td>            
            <td><div align="center">
            <?php echo $resultgrade['GPA'] ;?>
            </div>
            </td>
            <td><div align="center">
            <?php echo $resultgrade['grade_font'];?>
            </div>
            </td>
            <td><div align="center">
            <a class="btn btn-info" href ="./AddScore.php?Grade=<?php echo $resultgrade['GPA'];?>&SubCodeED=<?php echo $ID;?>&SubName=<?php echo $resultsub['Sub_Name'];?>&StdCode=<?php echo $resultG['Std_code'];?>&Term=<?php echo $resultG['Cos_term'];?> ">
            จัดการ</a></td>
            </tr>
            <?php }?>  
                  </table>
        </div>
</body>

</html>