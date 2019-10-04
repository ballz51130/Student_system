<?php
session_start();
include_once('../conn/connect.php');error_reporting(0);
$_SESSION['Std_edit'] = "";
$id = $_GET['Edcode'];
$_SESSION['Std_edit'] = $id;
$sqlStd = "SELECT * FROM student_tb WHERE Std_Code = '$id'";
$sqlMem = "SELECT * FROM `member_tb` WHERE Mem_user = '$id'";
$queryStd = $conn->query($sqlStd);
$queryMem = $conn->query($sqlMem);
$resultStd = $queryStd->fetch_assoc();
$resultMem = $queryMem->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>เพิ่ม/แก้ไข ข้อมูลส่วนตัวนักศึกษา</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../Style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
</head>
<body >
            <h3>เพิ่ม/แก้ไข ข้อมูลส่วนตัวนักศึกษา</h3>
            <hr>
            <form id="myform" name='myform' method="POST" action="./editStudent.php">
                <!-- รหัสนักศึกษา -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">รหัสนักศึกษา : </label>
                    <div class="col-sm-5">
                    
                        <input type="text" name="txtcode" class="form-control form-control-sm" id="txtcode" disabled="disabled"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Code']; }else { echo "";}?>" ></div>
                </div>
                <!-- ชื่อขึ้นต้น -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">ชื่อขึ้นต้น
                        :</label>
                    <div class="col-sm-5">     
                        <input type="text" name="txtPname" class="form-control form-control-sm" id="txtPname"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Pname']; }else { echo "";}?>" ></div></div>
                <!-- ชื่อ -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">ชื่อ
                        :</label>
                    <div class="col-sm-5">
                        <input type="text" name="txtFname" class="form-control form-control-sm" id="txtFname"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Fname']; }else { echo "";}?>" ></div></div>
              <!-- นามสกุล  -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">นามสกุล
                        :</label>
                    <div class="col-sm-5">
                        <input type="text" name="txtLname" class="form-control form-control-sm" id="txtLname"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Lname']; }else { echo "";}?>" ></div></div>
                <!-- เบอร์โทร -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">เบอร์โทร : </label>
                    <div class="col-sm-5">
                        <input type="text" name="txttel" class="form-control form-control-sm" id="txttel"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Tel']; }else { echo "";}?>" ></div>
                    </div>
                <!-- ที่อยู่ -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">ที่อยู่ : </label>
                    <div class="col-sm-5">
                        <input type="text" name="txtbadd" class="form-control form-control-sm" id="txtbadd"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Add']; }else { echo "";}?>" ></div>
                    </div>
                <!-- วันเดือนปีเกิด -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">วันเกิด : </label>
                    <div class="col-sm-5">
                        <input type="date" name="txtbirth" class="form-control form-control-sm" id="txtbirth"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Birth']; }else { echo "";}?>" ></div>
                    </div>
                <!-- Email -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">Email
                        :</label>
                    <div class="col-sm-5">     
                        <input type="text" name="txtEmail" class="form-control form-control-sm" id="txtEmail"
                            <?php if($id!=null){ ?> value="<?php echo $resultMem['Email']; }else { echo "";}?>" ></div></div>
                <!-- รหัสผ่าน -->
                <div class="form-group row">
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">รหัสผ่าน
                        :</label>
                    <div class="col-sm-5">     
                        <input type="text" name="txtPass" class="form-control form-control-sm" id="txtPass"
                            <?php if($id!=null){ ?> value="<?php echo $resultMem['Mem_pass']; }else { echo "";}?>" ></div></div>
                <!-- เลขที่บัตรประจำตัวประชาชน -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">เลขที่บัตรประจำตัวประชาชน : </label>
                    <div class="col-sm-5">
                        <input type="text" name="txtidcard" class="form-control form-control-sm" id="txtcard"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Card']; }else { echo "";}?>" ></div>
                </div>
                <!-- สาขาวิชา -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">สาขาวิชา : </label>
                    <div class="col-sm-5">
                        <input type="text" name="txtmajor" class="form-control form-control-sm" id="txtmajor"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Major']; }else { echo "";}?>" ></div>
                </div>
                <!-- คณะ -->
                <div class="form-group row">
        
                    <label for="colFormLabelSm"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">คณะ : </label>
                    <div class="col-sm-5">
                        <input type="text" name="txtfac" class="form-control form-control-sm" id="txtfac"
                            <?php if($id!=null){ ?> value="<?php echo $resultStd['Std_Faculty']; }else { echo "";}?>" ></div>
                </div>         
            <div class="row">
                <button class="btn btn-sm btn-primary mx-auto col-2" >บันทึก</button>
            </div>
        </div>
        </form>
        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>

        
</body>

</html>