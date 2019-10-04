<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page </title>
</head>

<body>

<script src="https://unpkg.com/ionicons@4.4.4/dist/ionicons.js"></script>
<center><h3> <h3 id="r1">All User</h3>
</center>
 <center><br>
           <table class="table table-dark"style="height: 500px; width: 900px;">
        <thead>
          <tr>
           <th scope="col",width = "90"><div align = "center">ID</div></th></th>
           <th scope="col",width = "90"><div align = "center">Name</div></th></th>
           <th scope="col",width = "90"><div align = "center">Last</div></th></th>
           <th scope="col",width = "90"><div align = "center">Username</div></th></th>
           <th scope="col",width = "90"><div align = "center">PASSWORD</div></th></th>
           <th scope="col",width = "90"><div align = "center">Status</div></th></th>
           <th scope="col",width = "90"><div align = "center">DEL</div></th></th>
           </tr>
        </thead>
        </center>
 <?php 
     include '../conn/connect.php';

        $sql = "SELECT * FROM check_login  ORDER BY `check_login`.`status` ASC ";
        $query = mysqli_query($conn, $sql);
        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC)) //ใช้ในการคืนค่าข้อมูลในฐานข้อมูลที่อยู่ในลักษณะเป็นแถวหรือว่าเป็น
        {
            ?>
            <tr class="table-primary">
           
            <td class="table-primary"><div align="center">
            <?php echo $result['id'];?></div></td>
            <td><div align="center">
            <?php echo $result['first_name'];?></div></td>
            <td><div align="center">
            <?php echo $result['last_name'];?></div></td>
            <td><div align="center">
            <?php echo $result['username'];?></div></td>
            <td><div align="center">
            <?php echo $result['password'];?></div></td>
            <td><div align="center">
            <?php echo $result['status'];?></div></td>
            <td><div align="center">
            <a href="./editadmin.php?ID=<?php echo $result['username']?>&status=<?php echo $result['status']?>"><ion-icon name="construct"></ion-icon></a></td>
            <td><div align="center"><a href="JavaScript:if(confirm('Confirm Delete?')== true){window.location='DelMem.php?ID=<?php echo $result['username']?>&status=<?php echo $result['status']?>';}"><ion-icon name="trash"></ion-icon></a></td>
            </tr>
            <?php

        
      }
    ?>
</table>
<?php 
mysqli_close($conn);
?>
<!--ลิ้งโดยใช้ข้อความ-->
<p>

<center><a href="./frm_add_student.php"><button type="button" class="btn btn-warning">เพื่มนักศึกษา</button></a></center><br>
<center><a href="./frm_add_teacher.php"><button type="button" class="btn btn-warning">เพื่มอาจารย์</button></a></center><br>
<center><a href="JavaScript:if(confirm('Confirm Logout?')== true){window.location='../login/logout.php';}"><button type="button" class="btn btn-danger">Logout</button></a></td>

</center>
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script>src="node_modules/bootstrap/dist/css/bootstrap.min.css"</script>
</body>

</html>