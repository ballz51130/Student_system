<?php
session_start();
include('../conn/connect.php');
//echo $_SESSION['id'];
if($_SESSION['Type_id'] == 1){
    $name = "admin";
    $img = "admin.jpg";
    error_reporting(0);
   // echo $_SESSION['id'];
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

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ข้อมูลส่วนตัวนักศึกษา</title>

</head>
<ul class="nav justify-content-center mt-5">
  <li class="nav-item">
    <a class="nav-link" href="../Grade/gradeStudent.php">ผลการเรียน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../subjects/edprograms/ShowPrograms.php">แผนการเรียน</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../schedule/Student_Sch1.php">ตารางเรียน</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="./FrmEditStuent.php?Edcode=<?php echo $code ?>&s=1">แก้ไขข้อมูลส่วนตัว</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="../login/logout.php" class="download">ออกจากระบบ</a>
  </li>
</ul>

<body>
                    <!-- <a href="../Grade/gradeStudent.php">ผลการเรียน</a>  <br>       
                    <a href="../subjects/edprograms/ShowPrograms.php">แผนการเรียน</a><br>
                    <a href="../schedule/Student_Sch1.php">ตารางเรียน</a><br>
                    <a href="../teacher/edit.php"><button type="button" class="btn btn-primary">แก้ไขข้อมูลส่วนตัว</button></a><br>
                    <a href="../login/logout.php" class="download">ออกจากระบบ</a>
       -->

        <!-- Page Content  -->
     
        <div class="card text-left mt-5 ml-5 mr-5 p-5">
            <h3>ข้อมูลส่วนตัว</h3>
            <?php if($_SESSION['Type_id'] == 1){ ?>
            <b>ชื่อ - นามสกุล : </b>
            <label for="idcard"><?php echo $name; ?> </label> <br>
            <?php  } else {?>
            <b>ชื่อ - นามสกุล : </b>
            <label for="idcard"><?php echo $name; ?> </label> <br>

            <b>วันเกิด : </b>
            <label for="idcard"><?php echo $birth; ?> </label> <br>

            <b>เลขที่บัตรประจำตัวประชาชน : </b>
            <label for="idcard"><?php echo $card; ?> </label> <br>

            <b>รหัสนักศึกษา/อาจาร์ : </b>
            <label for="idcard"><?php echo $code; ?> </label> <br>

            <b>หลักสูตร : </b>
            <label for="idcard"><?php echo $faculty; ?> </label> <br>

            <b>สาขาวิชา : </b>
            <label for="idcard"><?php echo $major; ?> </label> <br>
           
            <?php }?>


        </div>
     
                  </table>

        </div>  
        </div>
            
            
       
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>