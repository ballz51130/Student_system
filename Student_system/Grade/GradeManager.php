<?php
session_start();
include_once('../conn/connect.php');
$GA = 0;$GBP = 0;$GB = 0;$GCP = 0;$GC = 0;$GDP = 0;$GD = 0;$GF = 0;
$GASE = 0;$GBPSE = 0;$GBSE = 0;$GCPSE = 0;$GCSE = 0;$GDPSE = 0;$GDSE = 0;$GFSE = 0;
$GAE = 0;$GBPE = 0;$GBE = 0;$GCPE = 0;$GCE = 0;$GDPE = 0;$GDE = 0;$GFE = 0;
$GAA = 0;$GBPA = 0;$GBA = 0;$GCPA = 0;$GCA = 0;$GDPA = 0;$GDA = 0;$GFA = 0;
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
    $sqlD = "SELECT `ID`, `G_code`, `A`, `B+`, `B`, `C+`, `C`, `D+`, `D` FROM `edit_grade` INNER JOIN course_tb ON course_tb.Garde_code = edit_grade.G_code";
    $queryD = mysqli_query($conn, $sqlD);
    $resultD = mysqli_fetch_array($queryD, MYSQLI_ASSOC);

    // Check if form is submitted successfully 
    if (isset($_POST["submit"])) {
     
      if (isset($_POST["subject"])) {
       
        // Retrieving each selected option 
        
       // return false;
        foreach ($_POST['subject'] as $subject)
          $sql = "SELECT * FROM edit_grade WHERE G_code ='" . $subject . "'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
        echo "คุณเลือกรหัสเกณท์&nbsp;", $_SESSION['Numg'] = $result['G_code'], "&emsp;", "A :&nbsp", $result['A'], "&emsp;", "B+:&nbsp", $result['B+'], "&emsp;", "B:&nbsp", $result['B'], "&emsp;", "C+:&nbsp", $result['C+'], "&emsp;", "C:&nbsp", $result['C'], "&emsp;", "D+:&nbsp", $result['D+'], "&emsp;", "D:&nbsp", $result['D'], "&emsp;";
        $sqlup= "UPDATE `course_tb` SET Garde_code = '" . $subject . "' WHERE Cos_term = '".$_SESSION['Term']."' AND Sub_Code = '".$_SESSION['SubCodeED']."' ";
        $queryup  = mysqli_query($conn,$sqlup);
      } else
        echo "Select an option first !!";
    } else {
      echo "เกณฑ์ Defult ", $_SESSION['Numg'] = $resultD['G_code'], "&nbsp;=&nbsp;", "A :&nbsp", $resultD['A'], "&emsp;", "B+:&nbsp", $resultD['B+'], "&emsp;", "B:&nbsp", $resultD['B'], "&emsp;", "C+:&nbsp", $resultD['C+'], "&emsp;", "C:&nbsp", $resultD['C'], "&emsp;", "D+:&nbsp", $resultD['D+'], "&emsp;", "D:&nbsp", $resultD['D'];
    }
    ?>
  </div>
  <div class="eiei p-4 mt-4">
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
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
                ORDER BY `coursename_tb`.`Cos_name` ASC ";
  $queryshow = $conn->query($sqlshow);

  $rowSum = mysqli_num_rows($queryshow);

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
          <?php $grade = $resultgrade['GPA'];
            $sql = "SELECT * FROM edit_grade WHERE G_code ='" . $_SESSION['Numg'] . "'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $Gaede_front = "";
            if (($grade > 100) || ($grade < 0)) {
              echo "เกรดที่ได้  : ไม่สามารถคิดเกรดได้ คะแนนเกิน" . '<br>';
              // $gradeSum = $_SESSION['grade_font'];
              // $grade = $_SESSION['GPA'];
            } else if (($grade >= $result['A']) && ($grade <= 100)) {
              echo  "A";
              $Gaede_front = "A";
            } else if (($grade >= $result['B+']) && ($grade < $result['A'])) {
              echo  "B+";
              $Gaede_front = "B+";
            } else if (($grade >= $result['B']) && ($grade < $result['B+'])) {
              echo  "B";
              $Gaede_front = "B";
            } else if (($grade >= $result['C+']) && ($grade <= $result['B'])) {
              echo  "C+";
              $Gaede_front = "C+";
            } else if (($grade >= $result['C']) && ($grade < $result['C+'])) {
              echo  "C";
              $Gaede_front = "C";
            } else if (($grade >= $result['D+']) && ($grade < $result['C'])) {
              echo  "D+";
              $Gaede_front = "D+";
            } else if (($grade >= $result['D']) && ($grade < $result['D+'])) {
              echo  "D";
              $Gaede_front = "A";
            } else {
              echo  "F";
              $Gaede_front = "F";
              
            }
$sqlGF = "UPDATE `grade_tb` SET `grade_font`= '$Gaede_front' WHERE Std_code = '".$resultG['Std_code']."' AND Sub_code = '".$ID."'";
$queryGF = $conn->query($sqlGF);

            ?>

        </div>
      </td>
      <td>
        <div align="center">
          <?php
         $_SESSION['SubCodeED'] = $ID ;
         $_SESSION['StdCode']=$resultG['Std_code'];
          ?>

          <a class="btn btn-info" href="./AddScore.php?Grade=<?php echo $resultgrade['GPA']; ?>&SubCodeED=<?php echo $ID; ?>&SubName=<?php echo $resultsub['Sub_Name']; ?>&StdCode=<?php echo $resultG['Std_code']; ?>&Term=<?php echo $resultG['Cos_term']; ?>">
            จัดการ</a>
      </td>
    </tr>
  <?php
    if ($Gaede_front == 'A') {
      $GA = $GA + 1;
    }
    if ($Gaede_front == 'B+') {
      $GBP = $GBP + 1;
    }

    if ($Gaede_front == 'B') {
      $GB = $GB + 1;
    }
    if ($Gaede_front == 'C+') {
      $GCP = $GCP + 1;
    }
    if ($Gaede_front == 'C') {
      $GC = $GC + 1;
    }
    if ($Gaede_front == 'D+') {
      $GDP = $GDP + 1;
    }
    if ($Gaede_front == 'D') {
      $GD = $GD + 1;
    }
    if ($Gaede_front == 'F') {
      $GF = $GF + 1;
    }
    if($resultG['Cos_name']=='วิศวกรรมซอฟต์แวร์ 2560'){
      $numSE =$numSE+1;
      if ($Gaede_front == 'A') {
        $SEGA = $GASE + 1;
      }
      if ($Gaede_front == 'B+') {
        $GBPSE = $GBPSE + 1;
      }
  
      if ($Gaede_front == 'B') {
        $GBSE = $GBSE + 1;
      }
      if ($Gaede_front == 'C+') {
        $GCPSE = $GCPSE + 1;
      }
      if ($Gaede_front == 'C') {
        $GCSE = $GCSE + 1;
      }
      if ($Gaede_front == 'D+') {
        $GDPSE = $GDPSE + 1;
      }
      if ($Gaede_front == 'D') {
        $GDSE = $GDSE + 1;
      }
      if ($Gaede_front == 'F') {
        $GFSE = $GFSE + 1;
      }
    }
      if($resultG['Cos_name']=='อังกฤษเพื่อคนอื่น'){
        $numE =$numE+1;
        if ($Gaede_front == 'A') {
          $GAE = $GAE + 1;
        }
        if ($Gaede_front == 'B+') {
          $GBPE = $GBPE + 1;
        }
    
        if ($Gaede_front == 'B') {
          $GBE = $GBE + 1;
        }
        if ($Gaede_front == 'C+') {
          $GCPE = $GCPE + 1;
        }
        if ($Gaede_front == 'C') {
          $GCE = $GCE + 1;
        }
        if ($Gaede_front == 'D+') {
          $GDPE = $GDPE + 1;
        }
        if ($Gaede_front == 'D') {
          $GDE = $GDE + 1;
        }
        if ($Gaede_front == 'F') {
          $GFE = $GFE + 1;
        }

      }
      if($resultG['Cos_name']=='Area 51'){
        $numA =$numA+1;
        if ($Gaede_front == 'A') {
          $GAA = $GAA + 1;
        }
        if ($Gaede_front == 'B+') {
          $GBPA = $GBPA + 1;
        }
    
        if ($Gaede_front == 'B') {
          $GBA = $GBA + 1;
        }
        if ($Gaede_front == 'C+') {
          $GCPA = $GCPA + 1;
        }
        if ($Gaede_front == 'C') {
          $GCA = $GCA + 1;
        }
        if ($Gaede_front == 'D+') {
          $GDPA = $GDPA + 1;
        }
        if ($Gaede_front == 'D') {
          $GDA = $GDA + 1;
        }
        if ($Gaede_front == 'F') {
          $GFA = $GFA + 1;
        }

      }
    

  } ?>
  </table>
  
  <div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <center>
  <div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Report</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-body">
            <?php
            echo "มีนักศึกษาทั้งหมด", $rowSum,"<br>";
            if($GA !=0){
            echo "&emsp;", "ได้เกรด A&nbsp;&nbsp;=",$GA,"<br>" ;}else{}
            if($GBP !=0){
            echo "&emsp;", "ได้เกรด B+=",$GBP,"<br>";}else{}
              if($GB !=0){
            echo "&emsp;", "ได้เกรด B&nbsp;&nbsp;=",$GB,"<br>";}else{}
              if($GCP !=0){
            echo "&emsp;", "ได้เกรด C+=",$GCP,"<br>";}else{}
              if($GC !=0){
            echo "&emsp;", "ได้เกรด C&nbsp;&nbsp;=",$GC,"<br>";}else{}
              if($GDP !=0){
            echo "&emsp;", "ได้เกรด D+=",$GDP,"<br>";}else{}
              if($GD !=0){
            echo "&emsp;", "ได้เกรด D&nbsp;&nbsp;=",$GD,"<br>";}else{}
              if($GF !=0){
            echo "&emsp;", "ได้เกรด F&nbsp;&nbsp;=",$GF,"<br>";}else{}

            echo "นักศึกษาวิศวกรรมซอฟต์แวร์ 2560","&nbsp;&nbsp;จำนวน&nbsp;&nbsp;",$numSE,"<br>";
            if($GASE !=0){
            echo "&emsp;", "ได้เกรด A&nbsp;&nbsp;=",$GASE,"<br>" ;}else{}
            if($GBPSE !=0){
            echo "&emsp;", "ได้เกรด B+=",$GBPSE,"<br>";}else{}
            if($GBSE !=0){
            echo "&emsp;", "ได้เกรด B&nbsp;&nbsp;=",$GBSE,"<br>";}else{}
            if($GCPSE !=0){
            echo "&emsp;", "ได้เกรด C+=",$GCPSE,"<br>";}else{}
            if($GCSE !=0){
            echo "&emsp;", "ได้เกรด C&nbsp;&nbsp;=",$GCSE,"<br>";}else{}
            if($GDPSE !=0){
            echo "&emsp;", "ได้เกรด D+=",$GDPSE,"<br>";}else{}
            if($GDSE !=0){
            echo "&emsp;", "ได้เกรด D&nbsp;&nbsp;=",$GDSE,"<br>";}else{}
            if($GFSE !=0){
            echo "&emsp;", "ได้เกรด F&nbsp;&nbsp;=",$GFSE,"<br>";}else{}

            
            echo "อังกฤษเพื่อคนอื่น","&nbsp;&nbsp;จำนวน&nbsp;&nbsp;",$numE,"<br>";
            if($GAE !=0){
              echo "&emsp;", "ได้เกรด A&nbsp;&nbsp;=",$GAE,"<br>" ;}else{}
              if($GBPE !=0){
              echo "&emsp;", "ได้เกรด B+=",$GBPE,"<br>";}else{}
              if($GBE !=0){
              echo "&emsp;", "ได้เกรด B&nbsp;&nbsp;=",$GBE,"<br>";}else{}
              if($GCPE !=0){
              echo "&emsp;", "ได้เกรด C+=",$GCPE,"<br>";}else{}
              if($GCE !=0){
              echo "&emsp;", "ได้เกรด C&nbsp;&nbsp;=",$GCE,"<br>";}else{}
              if($GDPSE !=0){
              echo "&emsp;", "ได้เกรด D+=",$GDPE,"<br>";}else{}
              if($GDE !=0){
              echo "&emsp;", "ได้เกรด D&nbsp;&nbsp;=",$GDSE,"<br>";}else{}
              if($GFE !=0){
              echo "&emsp;", "ได้เกรด F&nbsp;&nbsp;=",$GFE,"<br>";}else{}
              echo "Area 51","&nbsp;&nbsp;จำนวน&nbsp;&nbsp;",$numA,"<br>";
              if($GAA !=0){
                echo "&emsp;", "ได้เกรด A&nbsp;&nbsp;=",$GAA,"<br>" ;}else{}
                if($GBPA !=0){
                echo "&emsp;", "ได้เกรด B+=",$GBPA,"<br>";}else{}
                if($GBA !=0){
                echo "&emsp;", "ได้เกรด B&nbsp;&nbsp;=",$GBA,"<br>";}else{}
                if($GCPA !=0){
                echo "&emsp;", "ได้เกรด C+=",$GCPA,"<br>";}else{}
                if($GCA !=0){
                echo "&emsp;", "ได้เกรด C&nbsp;&nbsp;=",$GCA,"<br>";}else{}
                if($GDPSA !=0){
                echo "&emsp;", "ได้เกรด D+=",$GDPA,"<br>";}else{}
                if($GDA !=0){
                echo "&emsp;", "ได้เกรด D&nbsp;&nbsp;=",$GDSA,"<br>";}else{}
                if($GFA !=0){
                echo "&emsp;", "ได้เกรด F&nbsp;&nbsp;=",$GFA,"<br>";}else{}
  

            ?>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

  </div>
  </div>
                </center>
  <?php
  // echo "คนที่ให้เกรด A =",$GA;
  // echo "&emsp;","คนที่ให้เกรด B+ =",$GBP;
  // echo "&emsp;","คนที่ให้เกรด B =",$GB;
  // echo "&emsp;","คนที่ให้เกรด C+ =",$GCP;
  // echo "&emsp;","คนที่ให้เกรด C =",$GC;
  // echo "&emsp;","คนที่ให้เกรด D+ =",$GDP;
  // echo "&emsp;","คนที่ให้เกรด D =",$GD;
  // echo "&emsp;","คนที่ให้เกรด F =",$GF;

  ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>