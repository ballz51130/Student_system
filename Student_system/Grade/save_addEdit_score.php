<?php
session_start();
include '../conn/connect.php';


// ตรวจเกรด ถ้าเกินให้ใช้ค่าเดิม
$P1 = $_POST['txtGrade1'];
$P2 = $_POST['txtGrade2'];
$P3 = $_POST['txtGradeMid'];
$P4 = $_POST['txtGradeFinal'];
$SumG = $P1+$P2+$P3+$P4;

$grade = $SumG;
$sql = "SELECT * FROM edit_grade WHERE G_code ='".$_SESSION['Numg']."'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

       if(($grade>100)||($grade<0)) {    
         echo "เกรดที่ได้  : ไม่สามารถคิดเกรดได้ คะแนนเกิน".'<br>';   
         $gradeSum = $_SESSION['grade_font'];
         $grade = $_SESSION['GPA'];
      }
      else if (($grade>=$result['A'])&&($grade<=100)) {    
         $gradeSum = "A";   
      }
       else if (($grade>=$result['B+'])&&($grade<$result['A'])) {    
         $gradeSum = "B+";   
      }
       else if (($grade>=$result['B'])&&($grade<$result['B+'])) {       
         $gradeSum = "B";    
      }
       else if (($grade>=$result['C+'])&&($grade<=$result['B'])) {
         $gradeSum = "C+";    
      }
       else if (($grade>=$result['C'])&&($grade<$result['C+'])) {    
         $gradeSum = "C";   
      }
       else if (($grade>=$result['D+'])&&($grade<$result['C'])) {            
         $gradeSum = "D+";    
      }
       else if (($grade>=$result['D'])&&($grade<$result['D+'])) {       
         $gradeSum = "D";    
      }
       else {$gradeSum = "F";}     
         
 echo $gradeSum;
// echo $SubCode;
 //echo $_SESSION['SubCodeED'];
// return false;
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];

$sqlcheck = "SELECT * FROM `grade_tb` 
             WHERE `Std_code` ='".$_SESSION['StdCode']."' 
             AND `Sub_code` = '".$_SESSION['SubCodeED']."'";
$querycheck = $conn->query($sqlcheck);
 //print_r ($querycheck); 
 //return false;
if($querycheck -> num_rows > 0){
   //Update
   $sql = "UPDATE `grade_tb` SET `GPA`='".$grade."', `grade_font`='".$gradeSum."',`P1`='".$P1."',`P2`='".$P2."',`Mid`='".$P3."',`Final`='".$P4."'
   WHERE  `Grad_Term` = '".$_SESSION['Term']."'
   AND `Std_code` ='".$_SESSION['StdCode']."'
   AND `Sub_code` = '".$_SESSION['SubCodeED']."' ";
   $query = $conn->query($sql);

 //print_r ($sql); 
 //print_r ($query);
 
 //return false;
   if($query==TRUE){
      header("location: ./GradeManager.php?success=1&SubName=$SubName&ID=".$SubCode);

      }
   else{
      header("location: ./GradeManager.php?success=2&SubName=$SubName&ID=".$SubCode); 
      }

}else{
   //Add grade
   $sqlAddGrade = "INSERT INTO `grade_tb`(`Grad_id`,`Grad_Term`,`Std_code`,`Sub_code`,`GPA`,`grade_font`) 
   VALUES (NULL,'".$_SESSION['Term']."','".$StdCode."','".$_SESSION['SubCodeED']."','".$grade."','".$gradeSum."');";
   $queryAddG = $conn->query($sqlAddGrade);

   $StdCode = '';


   if($queryAddG==TRUE){

      header("location: ../../view/grade/GradeManager.php?successIns=1&SubName=$SubName&ID=".$SubCode);
   }
   else{

      header("location: ../../view/grade/GradeManager.php?success=2&SubName=$SubName&ID=".$SubCode);   
   }
}


mysqli_close($conn);
?>