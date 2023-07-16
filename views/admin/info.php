<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getInfoAdmin();
    $display = $records->fetch_assoc()
?>

<div class="info-admin">
    <img class="img-info" src="template/admin/font/img/0095f327d3600d3e5471.jpg" alt="">
    <h1>Thông tin quản trị viên</h1>
    <h3>Tên quản trị viên : <?php echo $display['Fullname'] ?></h3>

</div>