 <?php require_once('controller/admin/url-admin.php') ?>
 <div class="sidebar">
    <li>
        <i class="ti-user"></i><a href="<?php echo info ?>">Thông tin cá nhân</a></li>
    <li>
        <i class="ti-control-forward"></i><a href="<?php echo order ?>">Quản lý đơn hàng</a></li>
    <li>
        <i class="ti-control-forward"></i><a href="<?php echo customer ?>">Quản lý khách hàng</a></li>
    <li>
        <i class="ti-control-forward"></i><a href="<?php echo room ?>">Quản lý phòng</a></li>
    <li>
        <i class="ti-control-forward"></i><a href="<?php echo bill ?>">Thống kê</a></li>
    <li>
        <i class="ti-share-alt"></i><a href="<?php echo logout ?>">LogOut</a></li>
</div>
<style>
    a{
        color: white;
        text-decoration: none;
        text-shadow: 1x 1px black;
        &&:hover{
            color: red;
            scale: 1.02;
            transition: 0.2s;
        }
    }
</style>
                