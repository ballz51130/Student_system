<?php
session_start();
include_once('../conn/connect.php');

$ID = $_GET['ID'];
$_SESSION['SubName'] = $_GET['SubName'];

$sqlsub = "SELECT * FROM `subject_tb` 
WHERE Sub_code = '" . $ID . "'";
$querysub = $conn->query($sqlsub);
$resultsub = $querysub->FETCH_ASSOC();
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

<body class="">

  <div class="">
    <form method='post'>
      <h4>เกณฑ์คะแนน</h4>

      <select name='subject[]'>
        <?php
        $strSQL = "SELECT * FROM `edit_grade` ORDER BY `edit_grade`.`G_code` ASC ";
        $objQuery = $conn->query($strSQL);
        while ($objResuut = $objQuery->FETCH_ASSOC()) {
          ?>
          <option value="<?php echo $objResuut["G_code"]; ?>"><?php echo " รหัสเกณท์ " . $objResuut["G_code"]; ?></option>
        <?php
        }
        ?>
      </select>
      <input class="btn btn-info" type='submit' name='submit' value=เลือก>
      <a class="btn btn-info" href="./editScore.php?ID=<?php echo $_SESSION['Numg']; ?>">แก้ไข</a>
      <a class="btn btn-info" href="./AddSelectScore.php">เพื่ม</a>
      <a class="btn btn-info" href="JavaScript:if(confirm('Confirm Delete?')== true){window.location='DelAddScore.php?ID=<?php echo $_SESSION['Numg']; ?>';}">ลบ</a>
    </form>
    <?php

    // Check if form is submitted successfully 
    if (isset($_POST["submit"])) {
      // Check if any option is selected 
      if (isset($_POST["subject"])) {
        // Retrieving each selected option 
        foreach ($_POST['subject'] as $subject)
          $sql = "SELECT * FROM edit_grade WHERE G_code ='" . $subject . "'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

        echo "คุณเลือกรหัสเกณท์&nbsp;", $result['G_code'], "&emsp;", "A :&nbsp", $result['A'], "&emsp;", "B+:&nbsp", $result['B+'], "&emsp;", "B:&nbsp", $result['B'], "&emsp;", "C+:&nbsp", $result['C+'], "&emsp;", "C:&nbsp", $result['C'], "&emsp;", "D+:&nbsp", $result['D+'], "&emsp;", "D:&nbsp", $result['D'], "&emsp;";
        $_SESSION['Numg'] = $result['G_code'];
      } else
        echo "Select an option first !!";
    } else {
      echo "โปรดเลือกเกณฑ์";
    }
    ?>
  </div>
  <div class="eiei p-5 mt-5">
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th scope="col">
            <div align="center">ภาคเรียน
          </th>
  </div>
  <th scope="col">
    <div align="center">รหัสแผนการเรียน
  </th>
  </div>
  <th scope="col">
    <div align="center">ชื่อแผนการเรียน
  </th>
  </div>
  <th scope="col">
    <div align="center">รหัสนักศึกษา
  </th>
  </div>
  <th scope="col">
    <div align="center">ชื่อ - นามสกุล
  </th>
  </div>
  <th scope="col">
    <div align="center">คะแนน
  </th>
  </div>
  <th scope="col">
    <div align="center">เกรด
  </th>
  </div>
  <th scope="col">
    <div align="center">จัดการ
  </th>
  </div>
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
                WHERE course_tb.Sub_Code = '" . $ID . "' and course_tb.Cos_term = '1/2561'
                ORDER BY register_tb.Std_code";
  $queryshow = $conn->query($sqlshow);
  while ($resultG = $queryshow->FETCH_ASSOC()) {

    $sqlgrade = "   SELECT * FROM `grade_tb` 
                            WHERE `Std_code` ='" . $resultG['Std_code'] . "' 
                            AND  `Grad_Term` = '" . $resultG['Cos_term'] . "'
                            AND `Sub_code` = '" . $resultG['Sub_Code'] . "' ";
    $querygrade = $conn->query($sqlgrade);
    $resultgrade = $querygrade->FETCH_ASSOC();

    error_reporting(0);
    ?>
    <tr>
      <td>
        <div align="center">
          <?php echo $resultG['Cos_term']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultG['Cos_code']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultG['Cos_name']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultG['Std_code']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultG['Std_Fname'];
            echo "&nbsp&nbsp";
            echo $resultG['Std_Lname']; ?></div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultgrade['GPA']; ?>
        </div>
      </td>
      <td>
        <div align="center">
          <?php echo $resultgrade['grade_font']; ?>
        </div>
      </td>
      <td>
        <div align="center">
          <a class="btn btn-info" href="./AddScore.php?Grade=<?php echo $resultgrade['GPA']; ?>&SubCodeED=<?php echo $ID; ?>&SubName=<?php echo $resultsub['Sub_Name']; ?>&StdCode=<?php echo $resultG['Std_code']; ?>&Term=<?php echo $resultG['Cos_term']; ?>">
            จัดการ</a>
      </td>
    </tr>
  <?php } ?>
  </table>
  </div>
</body>

</html>