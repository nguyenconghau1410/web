<?php 
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getBooked($_SESSION['Username']);
?>
<div class="information">
    <div class="left-bar">
        <div><a href="index.php?information=1">Thông tin cá nhân</a></div>
        <div><a href="index.php?information=2">Lịch sử đặt phòng</a></div>
        <div><a href="index.php?information=3">Phòng đã đặt chuẩn bị checkin (<?php echo $records->num_rows ?>)</a></div>
    </div>
    <div class="right-bar"></div>
</div>
<?php

    if($_GET['information'] == 1) {
        include("infor-personal.php");
    }
    else if($_GET['information'] == 2) {
        include("infor-history.php");
    }
    else 
        include("theRoomsReadyCheckin.php");
?>
