<?php
session_start();
include_once('../conn/connect.php');
$SubName = $_SESSION['SubName'];
$SubCode = $_SESSION['SubCodeED'];
$StdCode = $_SESSION['StdCode'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>เพื่มเกณฑ์</title>

</head>

<body>

        <form name='EditMem' method='POST' action='./FrmAddSelectScore.php'>
            <center>
                <h3>เพื่มเกณฑ์</h3>
                <table class="table table-dark" style="height: 500px; width: 900px;">
                    <tbody>
                        <tr>
                            <td width="125"> &nbsp;รหัสเกณฑ์</td>
                            <td widrh="180">
                                <input name="G_code" type="text" id="G_code" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;A:</td>
                            <td widrh="180">
                                <input name="A" type="text" id="A" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="100"> &nbsp;B+:</td>
                            <td widrh="100">
                                <input name="B+" type="text" id="B+" value="">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;B :</td>
                            <td widrh="180">
                                <input name="B" type="text" id="B" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;C+ :</td>
                            <td widrh="180">
                                <input name="C+" type="text" id="C+" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;C :</td>
                            <td widrh="180">
                                <input name="C" type="text" id="C" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;D+ :</td>
                            <td widrh="180">
                                <input name="D+" type="text" id="D+" value="">

                            </td>
                        </tr>
                        <tr>
                            <td width="125"> &nbsp;D :</td>
                            <td widrh="180">
                                <input name="D" type="text" id="D" value="">

                            </td>
                        </tr>



                    </tbody>
                </table>
            </center>
            <br>
            <center>
                <input type="submit" name="Submit" value="เพื่ม">
            </center>

        </form>



        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



    </body>

</html>