<?php
    $admin = null;
    if(isset($_SESSION['user_id'])) {
        $admin = $_SESSION['Fullname'];
    }
?>
<style>
    .box-1 .name {
        font-size: 20px;
        margin-right: 10px
    }
    .box-1 a {
        text-decoration: underline;
    }
</style>
<h1 class="admin">ADMIN</h1>
<div class="box-1">
    <div class="name"><?php echo $admin ?></div>
</div>