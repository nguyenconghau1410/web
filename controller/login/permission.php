<?php
    if(!isset($_SESSION['user_id'])) {
        header("Location: http://localhost/HOTEL/login.php");
    }
    else {
        if(isset($_SESSION['RoleID'])) {
            $permission = $_SESSION['RoleID'];
            if($permission != 1) {
                header("Location: http://localhost/HOTEL/");
            }
        }
    }

?>