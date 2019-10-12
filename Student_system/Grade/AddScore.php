<?php
session_start();
include_once('../conn/connect.php');
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];


    $sqlcheckStd = "SELECT register_tb.Std_code, student_tb.Std_Pname, student_tb.Std_Fname, student_tb.Std_Lname, student_tb.Std_Tel, student_tb.Std_Add, student_tb.Std_Birth, student_tb.Std_Card, student_tb.Std_Major, student_tb.Std_Faculty
    FROM `register_tb` 
    INNER JOIN student_tb on register_tb.Std_code = student_tb.Std_Code
    WHERE register_tb.Std_code ='".$_GET['StdCode']."'"; 
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
            $_SESSION['StdCode'] = $_GET['StdCode'] ;  
            $_SESSION['Term'] = $_GET['Term'];

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
      
      <a type="back" class="btn btn-secondary mb-2 " style="width:150px;" href="./GradeManager.php?SubName=<?php echo $SubName?>&ID=<?php echo $SubCode ?>">กลับหน้าเดิม</a>

  

        </div>
</center>
</body>

</html>