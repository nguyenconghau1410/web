<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $username = null; $password = null; $records = null; $result = null;
    if(isset($_GET['credential']) && $_GET['credential'] == "log-in") {
        if(isset($_POST['userName']) && isset($_POST['password'])) {
            $username = $_POST['userName'];
            $password = $_POST['password'];
        }
        if($username != null && $password != null) {
            $records = $connect->getAccount($username, $password);
            $result = $records->fetch_assoc();
        }
        if($result == null) {
            echo '<div class="warning">Tên đăng nhập hoặc mật khẩu đã sai</div>';
        }
        else {
            $_SESSION['user_id'] = uniqid();
            $_SESSION['Username'] = $result['Username'];
            $_SESSION['Fullname'] = $result['Fullname'];
            $_SESSION['RoleID'] = $result['RoleID'];
            $_SESSION['Phonenumber'] = $result['Phonenumber'];
            $_SESSION['Dateofbirth'] = $result['Dateofbirth'];
            ini_set('session.cookie_lifetime', 3600);
            if($result['RoleID'] == 1) {
                header("Location: http://localhost/HOTEL/admin.php");
            }
            else {
                header("Location: http://localhost/HOTEL/");
            }
        }
    }
    else if(isset($_GET['notify'])) {
        if($_GET['notify'] == "success")
            echo '<div class ="notify">Tài khoản của bạn đã tạo thành công, hãy đăng nhập!</div>';
    }
?>
