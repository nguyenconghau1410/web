<?php
    if($_GET['type'] == '1') {
        include('views/admin/info.php');
    }
    else if($_GET['type'] == '2') {
        include('views/admin/order.php');
    }
    else if($_GET['type'] == '3') {
        include('views/admin/customers.php');
    }
    else if($_GET['type'] == '4') {
        include('views/admin/rooms.php');
    }
    else if($_GET['type'] == '5') {
        include("views/admin/bill.php");
    }
    else if($_GET['type'] == '6') {
        session_unset();
        header("Location: http://localhost/HOTEL/login.php");
    }
    else if($_GET['type'] == '7')
        include("views/admin/listCustomer.php");
?>