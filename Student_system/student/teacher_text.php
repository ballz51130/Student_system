<?php
$varlue = $_POST["value"];
session_start();
include_once('../conn/condb.php');

$sql = "SELECT course_tb.Cos_term,subject_tb.Sub_code,subject_tb.Sub_Name,course_tb.Cos_Time,course_tb.Cos_Room,course_tb.Cos_code
FROM course_tb
INNER JOIN register_tb ON course_tb.Cos_code = register_tb.Cos_code
 INNER JOIN subject_tb ON course_tb.Sub_code = subject_tb.Sub_code
 INNER JOIN teacher_tb ON course_tb.Teach_code = teacher_tb.Teach_code
 WHERE teacher_tb.Teach_code = '30144' and course_tb.Cos_term = '$varlue' " ;
$query = $link->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>
<style>
  div.input-group{
      input-group
  }
  </style>
    <div id="Slidebar">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand">Navbar</a>
            <form class="form-inline">

                <a href="./edit.php"><button type="button" class="btn btn-primary">เปลียนรหัสผ่าน</button></a>
                <a href="./edit.php"><button type="button" class="btn btn-primary">เปลียนรหัสผ่าน</button></a>

            </form>
        </nav>
        <div class="div">
        <br><br>
        <form name="form" method="post" action="../student/teacher_text.php">
        <div class="input-group mb-3"style="width: 100px;margin-left: 300px">
  <select name = "value" class="custom-select" id="inputGroupSelect02">
  <option value="1/2560">1/2560</option>
    <option value="2/2560">2/2560</option>
    <option value="1/2561">1/2561</option>
    <option value="2/2561">2/2561</option>
    <option value="1/2562">1/2562</option>
    <option value="2/2562">2/2562</option>
  </select>
</form>     
<input type="submit" name="submit" id="submit" value="submit">
        </div><br>
        <center>
        <table class="table table-bordered mt-3"style="height: 500px; width: 900px;">
                <thead>
                    <tr>
                        <th scope="col">เทริม</th>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">ชื่อวิชา</th>
                        <th scope="col">คาบเรียนที่สอน</th>
                        <th scope="col">ห้องเรียน</th>
                        <th scope="col">กรอกคะแนน</th>
                       
                      </tr>
                    </thead>
                    <tbody>

                        <tbody>
                            <tr>
                            <?php while($result = $query->fetch_assoc()){ ?>
                              <td><?php echo $result['Cos_term']; ?></td>
                              <td><?php echo $result['Sub_code']; ?></td>
                              <td><?php echo $result['Sub_Name']; ?></td>
                              <td><?php echo $result['Cos_Time']; ?></td>
                              <td><?php echo $result['Cos_Room']; ?></td>
                              <td><a class="btn btn-sm btn-outline-primary" href="../teacher/edit_P.php?ID=<?php echo $result['Cos_code'];?>">กรอกคะแนน</a></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                  </table>
        </center>

        
    </div>
    </div>  //
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>