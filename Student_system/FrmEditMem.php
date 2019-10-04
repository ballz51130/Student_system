
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
<?php
    include 'condb.php';
    $ID = ['id'];
    $sql = "SELECT first_name, last_name, username, status FROM `admin` WHERE `id` = '".$id."'"; 
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query);
?>
    <form name='Editmem' method='POST' action='UpdateMem.php'>
    <br>
    <center><img class="mb-4" src="https://assets.ducati.com/dist/0.0.15/assets/img/ducati_id.png" alt="" width="72" height="72"></center>
    <center><h3> Update Member </h3></center>
    <input name="MID" type="hidden" id="MID" value="<?PHP echo $result['id']?>">
    <center><br>
    <div class="col-md-3 mb-3 text-center">
        <input class="form-control" name="first_name" type="text" id="first_name" placeholder="first_name" value="<?php echo $result['first_name'];?>" required>
        </div>
        <div class="col-md-3 mb-3 text-center">
        <input class="form-control" name="last_name" type="text" id="last_name" placeholder="last_name" value="<?php echo $result['last_name'];?>">
        </div>   
        <div class="col-md-3 mb-3 text-center">
        <input class="form-control" name="username" type="text" id="username" placeholder="username" value="<?php echo $result['username'];?>">
        </div>
        <div class="col-md-3 mb-3 text-center">
        <input class="form-control" name="password" type="password" id="password" placeholder="password" value="<?php echo $result['password'];?>">
        </div>
            <?php
            if($result['status']=="admin")
            {
            echo  "<select name=\"mtype\" id=\"mtype\">
            <option value=\"admin\" selected =\"selected\">ADMIN</option>
            <option value=\"teacher\">TEACHER</option>
            <option value=\"student\">STUDENT</option>
        </select>";
            }
            else if($result['status']=="teacher")
            {
            echo   "<select name=\"mtype\" id=\"mtype\">
            <option value=\"admin\">ADMIN</option>
            <option value=\"teacher\" selected=\"selected\">TEACHER</option>
            <option value=\"student\">STUDENT</option>
        </select>";
            }
            else
            {
            echo   "<select name=\"mtype\" id=\"mtype\">
            <option value=\"admin\">ADMIN</option>
            <option value=\"teacher\" selected=\"selected\">TEACHER</option>
            <option value=\"student\">STUDENT</option>
        </select>";
            }
            ?>
</center>
<br>
    <center>
        <input type="submit" name="Submit" value="Save"class="btn btn-danger"> &nbsp;
         <a href="index.php"class="btn btn-outline-dark">Back</a>
    </center>
</form>  
</body>
</html>