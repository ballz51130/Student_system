<?php
session_start();
include_once('../conn/connect.php');
error_reporting(0);

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>แสดงผลการเรียน</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../Style.css">

 
</head>

<body >
  
            <table class="table table-bordered mt-3">
                    <thead>
                      <tr>
                        <th scope="col">รหัสวิชา</th>
                        <th scope="col">ชื่อวิชา</th>
                        <th scope="col">หน่วยกิต</th>
                        <th scope="col">กลุ่มวิชา</th>
                        <th scope="col">เกรด</th>
                        <th scope="col">คะแนนรวม</th>
                      </tr>
                    </thead>
                    <tbody>
                    <th colspan="9">ภาคเรียนที่ 1/2561</th>
                      
                       <?PHP
                        $sql_1_2561 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, 
                        sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '1/2561' AND register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $query_1_2561 = $conn->query($sql_1_2561);
                        

                        if($query_1_2561->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                    
                            <?php }?>
                            </tr>
                        <?php while($result_1_2561 = $query_1_2561->fetch_assoc()) {
                            //SQL Show Grade//
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$result_1_2561['Std_code']."' 
                                        AND  `Grad_Term` = '1/2561'
                                        AND `Sub_code` = '".$result_1_2561['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();

                                        // print_r($querygrade);
                                        // return false;
                            ?>
                        <tr>
                        <td scope="row"><?php echo $result_1_2561['Sub_Code']?></td>
                        <td><?php echo $result_1_2561['Sub_Name']?></td>
                        <td><?php echo $result_1_2561['Sub_Credit']?></td>
                        <td><?php echo $result_1_2561['Sect_Name']?></td>
                        <td class="text-success" ><?php echo $resultgrade['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>

                      <th cols pan="9">ภาคเรียนที่ 2/2561</th>
                      <?PHP

                        $sql_2_2561 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, 
                        sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '2/2561' AND register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $query_2_2561 = $conn->query($sql_2_2561);
                        if($query_2_2561->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($result_2_2561 = $query_2_2561->fetch_assoc()) {
                                //SQL Show Grade//
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$result_2_2561['Std_code']."' 
                                        AND  `Grad_Term` = '2/2561'
                                        AND `Sub_code` = '".$result_2_2561['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();
                            
                            ?>
                        <tr>
                        <td scope="row"><?php echo $result_2_2561['Sub_Code']?></td>
                        <td><?php echo $result_2_2561['Sub_Name']?></td>
                        <td><?php echo $result_2_2561['Sub_Credit']?></td>
                        <td><?php echo $result_2_2561['Sect_Name']?></td>
                        <td class="text-success" ><?php echo $result_2_2561['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>


                        <th cols pan="9">ภาคเรียนที่ 1/2562</th>
                      <?PHP

                        $sql_1_2562 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '1/2562' AND register_tb.Std_code = '".$_SESSION['Mem_user']."'";

                        $query_1_2562 = $conn->query($sql_1_2562);
                        if($query_1_2562->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($result_1_2562 = $query_1_2562->fetch_assoc()) {
                                    
                                    //SQL Show Grade//
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$result_1_2562['Std_code']."' 
                                        AND  `Grad_Term` = '1/2562'
                                        AND `Sub_code` = '".$result_1_2562['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();    
                            ?>
                        <tr>
                        <td scope="row"><?php echo $result_1_2562['Sub_Code']?></td>
                        <td><?php echo $result_1_2562['Sub_Name']?></td>
                        <td><?php echo $result_1_2562['Sub_Credit']?></td>
                        <td><?php echo $result_1_2562['Sect_Name']?></td>
                        <td class="text-success" ><?php echo $result_1_2562['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>

                        <th cols pan="9">ภาคเรียนที่ 2/2562</th>
                        <?PHP

                        $sql_2_2562 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '2/2562' AND register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $query_2_2562 = $conn->query($sql_2_2562);
                        if($query_2_2562->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($result_2_2562 = $query_2_2562->fetch_assoc()) {
                                     //SQL Show Grade//
                                     $sqlgrade = "   SELECT * FROM `grade_tb` 
                                     WHERE `Std_code` ='".$result_2_2562['Std_code']."' 
                                     AND  `Grad_Term` = '2/2562'
                                     AND `Sub_code` = '".$result_2_2562['Sub_Code']."' ";
                                     $querygrade = $conn->query($sqlgrade);
                                     $resultgrade = $querygrade->FETCH_ASSOC();                   
                            
                            ?>
                        <tr>
                        <td scope="row"><?php echo $result_2_2562['Sub_Code']?></td>
                        <td><?php echo $result_2_2562['Sub_Name']?></td>
                        <td><?php echo $result_2_2562['Sub_Credit']?></td>
                        <td><?php echo $result_2_2562['Sect_Name']?></td>
                        <td class="text-success" ><?php echo $resultgrade['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>


                        <th cols pan="9">ภาคเรียนที่ 1/2563</th>
                      <?PHP

                        $sql_1_2563 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '1/2563' AND register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $query_1_2563 = $conn->query($sql_1_2563);
                        if($query_1_2563->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($result_1_2563 = $query_1_2563->fetch_assoc()) {
              
                                          //SQL Show Grade//
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$result_1_2563['Std_code']."' 
                                        AND  `Grad_Term` = '1/2563'
                                        AND `Sub_code` = '".$result_1_2563['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();
                            ?>
                        <tr>
                        <td scope="row"><?php echo $result_1_2563['Sub_Code']?></td>
                        <td><?php echo $result_1_2563['Sub_Name']?></td>
                        <td><?php echo $result_1_2563['Sub_Credit']?></td>
                        <td><?php echo $result_1_2563['Sect_Name']?></td>
                        <td class="text-success" ><?php echo $resultgrade['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>


                        <th cols pan="9">ภาคเรียนที่ 2/2563</th>
                      <?PHP

                        $sql_2_2563 = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE course_tb.Cos_term = '2/2563' AND register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $query_2_2563 = $conn->query($sql_2_2563);
                        if($query_2_2563->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($result_2_2563 = $query_2_2563->fetch_assoc()) {
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$result_2_2563['Std_code']."' 
                                        AND  `Grad_Term` = '2/2563'
                                        AND `Sub_code` = '".$result_2_2563['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();
                            ?>
                        
                        <tr>
                        <td scope="row"><?php echo $result_2_2563['Sub_Code']?></td>
                        <td><?php echo $result_2_2563['Sub_Name']?></td>
                        <td><?php echo $result_2_2563['Sub_Credit']?></td>
                        <td><?php echo $result_2_2563['Sect_Name']?></td>
                        <td class="text-success" ><?php echo  $resultgrade['grade_font']?></td>
                        <td class="text-success" ><?php echo $resultgrade['GPA']?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                  </table>
<hr>
<div class="row text-center">
    <div class="col-6">
        <div class="row">
            <div class="col-12">
                    หน่วยกิตรวม
            </div>
            <div class="col-12">
            <?PHP  $sqlCredit = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $queryCredit = $conn->query($sqlCredit);
                        $row = mysqli_num_rows($queryCredit);
                        if($queryCredit->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($resultCredit = $queryCredit->fetch_assoc()) {
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$resultCredit['Std_code']."' 
                                    
                                        AND `Sub_code` = '".$resultCredit['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();
                            ?>

                    <?php } ?>
                    <?php 
                    $sum_unit = $row * 3;
                    echo $sum_unit;
                    
                    ?>
            </div>
        </div>
    </div>
    <div class="col-6">
            <div class="row">
                    <div class="col-12">
                            เกรดเฉลี่ย
                    </div>
                    <div class="col-12">
                             
               <?php   $sqlCredit = "SELECT DISTINCT course_tb.Cos_term, subject_tb.Sub_Name, subject_tb.Sub_Credit, sect_tb.Sect_Name, course_tb.Sub_Code, register_tb.Std_code
                        FROM course_tb
                        INNER JOIN sect_tb 
                        ON course_tb.Sect_code = sect_tb.Sect_code
                        INNER JOIN register_tb
                        ON course_tb.Cos_code = register_tb.Cos_code
                        INNER JOIN subject_tb 
                        ON course_tb.Sub_Code = subject_tb.Sub_code
                                    
                        WHERE register_tb.Std_code = '".$_SESSION['Mem_user']."' ";

                        $queryCredit = $conn->query($sqlCredit);
                        $row = mysqli_num_rows($queryCredit);
                        if($queryCredit->num_rows == 0){?>
                            <tr>
                            <td class="text-center" colspan="6">--- ไม่พบข้อมูล ---</td>
                            <?php }?>
                            </tr>
                        <?php while($resultCredit = $queryCredit->fetch_assoc()) {
                                        $sqlgrade = "   SELECT * FROM `grade_tb` 
                                        WHERE `Std_code` ='".$resultCredit['Std_code']."' 
                                        AND `Sub_code` = '".$resultCredit['Sub_Code']."' ";
                                        $querygrade = $conn->query($sqlgrade);
                                        $resultgrade = $querygrade->FETCH_ASSOC();
                                       
                            ?>

                            <!-- เกรดรวม -->
                        <?php
                        //close tag 
                       
                                if($resultgrade['grade_font'] == 'A') {
                                $gradesum = 4*3;
                               
                                }else if($resultgrade['grade_font'] == 'B+') {
                                $gradesum = 3.5*3;
                               
                                }else if($resultgrade['grade_font'] == 'B') {
                                $gradesum = 3*3;
                               
                                }else if($resultgrade['grade_font'] == 'C+') {
                                $gradesum = 2.5*3;
                               
                                }else if($resultgrade['grade_font'] == 'C') {
                                $gradesum = 2*3;
                               
                                }else if($resultgrade['grade_font'] == 'D+') {
                                $gradesum = 1.5*3;
                               
                                }else if($resultgrade['grade_font'] == 'D') {
                                $gradesum = 1*3;
                               
                                }else if($resultgrade['grade_font'] == 'F'){
                                $gradesum = 0*3;
                                } ?>
                       
                    <?php  $sumgrade = $sumgrade + $gradesum; } ?>  
                    <?php 
                    $sum_unit = $row * 3;
                    $finalGrade = $sumgrade/$sum_unit;
                     $Final = sprintf("%.2f",$finalGrade);
                     echo $Final;
                    ?>
                    
                     


                    </div>
                </div>
    </div>
</div>
<hr>
        </div>

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