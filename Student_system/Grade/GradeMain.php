<?php
session_start();
include_once('../conn/connect.php');
?>

<h3>จัดการผลการเรียน</h3>
<h5>รายวิชาที่สอน</h5> <input type="text" placeholder="รหัสวิชา/ชื่อวิชา"> <button>ค้นหา</button>

            <table class="table table-bordered mt-3">
                    <thead>
                      <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">รายวิชา</th>
                        <th scope="col">จัดการ</th>
                      </tr>
                    </thead>         
    <?php
        
        $sql = "SELECT DISTINCT course_tb.Sub_code, subject_tb.Sub_Name 
        FROM course_tb 
        INNER JOIN subject_tb 
        ON course_tb.Sub_code = subject_tb.Sub_code 
        WHERE course_tb.Teach_code = '".$_SESSION['id']."'";

        $query = mysqli_query($conn, $sql);
        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) 
        {
            ?>
            <tr>
            <td><div align="center">
            <?php echo $result['Sub_code'];?></div></td>
            <td><div align="left">
            <?php echo $result['Sub_Name'];?></div></td>
            <td><div align="center">
            <a class="btn btn-info" href ="./GradeManager.php?ID=<?php echo $result['Sub_code']?>&SubName=<?php echo $result['Sub_Name']?> ">จัดการ</a></td>
            </tr>
            <?php

        
      }
    ?>
                    
                   
                    
                  </table>

        </div>