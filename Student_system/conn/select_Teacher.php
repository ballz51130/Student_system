<?php

$connect = mysqli_connect("localhost", "root", "", "dbname");
mysqli_set_charset($connect, "utf8");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "SELECT course_tb.Cos_term,subject_tb.Sub_code,subject_tb.Sub_Name,course_tb.Cos_Time,course_tb.Cos_Room,course_tb.Cos_code
 FROM course_tb
 INNER JOIN register_tb ON course_tb.Cos_code = register_tb.Cos_code
  INNER JOIN subject_tb ON course_tb.Sub_code = subject_tb.Sub_code
  INNER JOIN teacher_tb ON course_tb.Teach_code = teacher_tb.Teach_code
  WHERE teacher_tb.Teach_code = '30144' and course_tb.Cos_term = '%".$search."%'

";
}
else
{
 $query = "
 SELECT course_tb.Cos_term,subject_tb.Sub_code,subject_tb.Sub_Name,course_tb.Cos_Time,course_tb.Cos_Room,course_tb.Cos_code
 FROM course_tb
 INNER JOIN register_tb ON course_tb.Cos_code = register_tb.Cos_code
  INNER JOIN subject_tb ON course_tb.Sub_code = subject_tb.Sub_code
  INNER JOIN teacher_tb ON course_tb.Teach_code = teacher_tb.Teach_code
  WHERE teacher_tb.Teach_code = '30144' and course_tb.Cos_term = '%".$search."%'"        
  ;
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive" style="height: 500px; width: 900px;>
   <table class="table table bordered">
    <tr>
    <th scope="col">เทริม</th>
    <th scope="col">รหัสวิชา</th>
    <th scope="col">ชื่อวิชา</th>
    <th scope="col">คาบเรียนที่สอน</th>
    <th scope="col">ห้องเรียน</th>
   <th scope="col">กรอกคะแนน</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   
    <td>'.$row["cos_term"].'</td>
    <td>'.$row["Sub_Code"].'</td>
    <td>'.$row["Sub_Name"].'</td>
    <td>'.$row["Sub_Credit"].'</td>
    <td>'.$row["Cos_Time"].'</td>
    <td>'.$row["Cos_Room"].'</td>
    <td>'.$row["Teach_Fname"].'</td>
    <td>'.$row["Sect_Name"].'</td>
    <A herf="./edit_P.php?ID='.$row["cos_term"].'"กรอกคะแนน</a>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>