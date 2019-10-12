<?php
session_start();
include_once('../conn/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Edit menber</title>

</head>

<body>

    
        <?php
        $ID = $_GET['ID'];
        $sql = "SELECT * FROM `edit_grade` WHERE G_code =" . $ID;
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query)
        ?>
        <form name='EditMem' method='POST' action='./frmEditScore.php'>
            <center>
                <h3>Edit เกณฑ์</h3>
                <table class="table table-dark" style="height: 500px; width: 900px;">
                    <tbody>
                        <input name="MID" type="hidden" id="MID" value="<?php echo $result['ID'] ?>">
                        <tr>
                            <td width="125"> &nbsp;รหัสเกณฑ์</td>
                            <td widrh="180">
                                <input name="G_code" type="text" id="G_code" value="<?php echo $result['G_code']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;A:</td>
                            <td widrh="180">
                                <input name="A" type="text" id="A" value="<?php echo $result['A']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="100"> &nbsp;B+:</td>
                            <td widrh="100">
                                <input name="B+" type="text" id="B+" value="<?php echo $result['B+']; ?>">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;B :</td>
                            <td widrh="180">
                                <input name="B" type="text" id="B" value="<?php echo $result['B']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;C+ :</td>
                            <td widrh="180">
                                <input name="C+" type="text" id="C+" value="<?php echo $result['C+']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;C :</td>
                            <td widrh="180">
                                <input name="C" type="text" id="C" value="<?php echo $result['C']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;D+ :</td>
                            <td widrh="180">
                                <input name="D+" type="text" id="D+" value="<?php echo $result['D+']; ?>">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;D :</td>
                            <td widrh="180">
                                <input name="D" type="text" id="D" value="<?php echo $result['D']; ?>">

                            </td>
                        </tr>



                    </tbody>
                </table>
            </center>
            <br>
            <center>
                <input type="submit" name="Submit" value="Save">
            </center>

        </form>



        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



    </body>

</html>