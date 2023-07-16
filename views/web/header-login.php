<style>
    .login a {
        color: #fff;
        text-decoration: none;
    }
    .info-user {
        background-color: rgb(129, 129, 129);
        color: aliceblue;
        text-align: center;
        margin-right: 20px;
        font-size: 20px;
        margin-top: 25px;
        text-shadow: 1px 1px black;
        padding-top: 8px;
    }
</style>
<?php 
    if(!isset($_SESSION['user_id'])) {
?>
    <div class="login"><a href="/HOTEL/login.php">Đăng nhập</a></div>
                
    </div>
<?php
    }
    else {
?>
    <div class="info-user">Welcome, <?= $_SESSION['Fullname'] ?> </div>
<?php
    }
?>
