<?php
session_start();
include_once('../conn/connect.php');

// $_SESSION['ID'];
// $_GET['ID'] = $_SESSION['ID'];
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

    $_SESSION['StdCode'] = $_GET['StdCode'];
    $_SESSION['Term'] = $_GET['Term'];

    // $sqlcheckStd = "SELECT * FROM `student_tb` 
    // WHERE `Std_code` ='".$_SESSION['StdCode']."'";
    $sqlcheckStd = "SELECT register_tb.Std_code, student_tb.Std_Pname, student_tb.Std_Fname, student_tb.Std_Lname, student_tb.Std_Tel, student_tb.Std_Add, student_tb.Std_Birth, student_tb.Std_Card, student_tb.Std_Major, student_tb.Std_Faculty
    FROM `register_tb` 
    INNER JOIN student_tb on register_tb.Std_code = student_tb.Std_Code
    WHERE register_tb.Std_code ='".$_SESSION['StdCode']."'"; 

    $querycheckStd = $conn->query($sqlcheckStd);
    $resultcheckStd = $querycheckStd->FETCH_ASSOC();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>แก้ไขผลการเรียน</title>
    <style> <?php  include('../css/add.css') ?> </style>
</head>
<body>
        <div class="card p-5 mt-5 mr-5 ml-5 text-center">
            <h3>จัดการผลการเรียน</h3>
           <?php  
           //SQL//
            $SubCodeED = $_GET['SubCodeED'];
            $_SESSION['SubCodeED'] = $SubCodeED;
            $SubName = $_GET['SubName'];
            $_SESSION['SubName'] = $SubName ;  

            echo $_SESSION['SubCodeED']." - ".$_SESSION['SubName'];
            $sql3 = "SELECT * FROM `grade_tb` WHERE `Std_code`='".$resultcheckStd['Std_code']."' AND `Sub_code` = '$SubCodeED' ";
            $query = mysqli_query($conn, $sql3);
            $result5 = mysqli_fetch_array($query)
            ?>

            <div class="form-group mb-2">
            <label for="StudentName"><?php echo $resultcheckStd['Std_code']."  ".$resultcheckStd['Std_Pname'].$resultcheckStd['Std_Fname']." ".$resultcheckStd['Std_Lname']?></label>
            </div>
           
            
            <!-- Hidden -->
      
            <!-- Grade -->
            <center>
            <div class="form-group">
        <form action="./save_addEdit_score.php" method = "POST" class="form-inline">
       
            </div>
             
        คะแนนครั้งที่ : 1 &emsp;&emsp;&emsp;   <input type="number" class="form-control" id="txtGrade" placeholder="คะแนน" name="txtGrade1" style="width:100px;"
            min="0" max="20" title = "โปรดกรอกคะแนนตั้งแต่ 0 - 20 !" value="<?php echo $result5['P1']?>" required >
        คะแนนครั้งที่ : 2 &emsp;&emsp;&emsp;   <input type="number" class="form-control" id="txtGrade" placeholder="คะแนน" name="txtGrade2" style="width:100px;"
            min="0" max="20" title = "โปรดกรอกคะแนนตั้งแต่ 0 - 100 !" value="<?php echo $result5['P2']?>" required>
            
           
        คะแนนสอบกลางภาค :  &nbsp; <input type="number" class="form-control" id="txtGrade" placeholder="คะแนน" name="txtGradeMid" style="width:100px;"
            min="0" max="30" title = "โปรดกรอกคะแนนตั้งแต่ 0 - 100 !" value="<?php echo $result5['Mid']?>" required>
           
        คะแนนสอบปลายภาค :   &nbsp;<input type="number" class="form-control" id="txtGrade" placeholder="คะแนน" name="txtGradeFinal" style="width:100px;"
            min="0" max="30" title = "โปรดกรอกคะแนนตั้งแต่ 0 - 100 !" value="<?php echo $result5['Final']?>" required>
            
<br>
            <button type="submit" class="btn btn-success mb-2" name="GradeEdit" style="width:150px;">บันทึก</button>
      
      <a type="back" class="btn btn-secondary mb-2 " style="width:150px;" href="./GradeManager.php?ID=<?php echo $_SESSION['ID'];?> ">กลับหน้าเดิม</a>

  

        </div>
</center>
</body>

</html>