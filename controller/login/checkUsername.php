<?php
    require_once("../control_form.php");
    $connect = new control_form();
    $records = null; $user = null;
    if(isset($_POST['userName']) && $_POST['userName'] != "")
        $user = $_POST['userName'];
    $records = $connect->getUsername($user);
    $result = $records->fetch_assoc();
    if($user != "") {
        if(strlen($user) < 5) {
            echo "Tài khoản phải bắt buộc phải có ít nhất 5 kí tự";
        } 
        else {
            if($result['count'] != 0) {
                echo 'Tên tài khoản đã tồn tại';
            }
            else {
                echo 'Tên tài khoản hợp lệ';
            }
        }
    }
?>