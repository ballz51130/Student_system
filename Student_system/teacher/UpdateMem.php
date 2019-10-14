
<?php
$password = $_POST['password'];
$Md5password =md5($_POST['password']);
// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[._-]@', $password);

if (strlen($password) < 8) {
    echo "รหัสผ่านต้องมีอย่างน้อย8ตัว";
    echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
} else if (!$uppercase) {
    echo "รหัสผ่านต้องมีตัวใหญ่ผสมอยู่ด้วย";
    echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
} else if (!$lowercase) {
    echo "รหัสผ่านต้องมีตัวเล็กผสมอยู่ด้วย";
    echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
} else if (!$number) {
    echo "รหัสผ่านต้องมีตัวเลขผสมอยู่ด้วย";
    echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
} else if (!$specialChars) {
    echo "รหัสผ่านต้องมีตัวอักขระผสมอยู่ด้วย";
    echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
} else {
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if ($password == "" & $confirmpassword == "") {
        echo "กรุณากรอกรหัสผ่านทั้ง 2 ช่อง";
    } else if ($password != $confirmpassword) {
        echo "“รหัสผ่านไม่ตรงกัน”";
        echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=./edit.php'>";
    } else {
        
        session_start();
        
        include_once('../conn/connect.php');
        $ID = $_SESSION['id'];
        $sql = "UPDATE `check_login`
        SET `password` = '" . $Md5password . "'
        WHERE username='" . $ID . "'";

        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            echo "Update Complete";
            
            echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=../index.php'>";
        } else {
            echo "Error Cann't Update Member";

            echo "<META HTTP-EQUIV='Refresh' CONTENT = '2;URL=../index.php'>";
        }
        mysqli_close($conn);
    }
}
