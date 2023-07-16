<style>
    .cart .quantity {
        width: 20px;
        height: 20px;
        background-color: red;
        border-radius: 5px;
        float: right;
        margin-top: -20px;
        margin-right: 20px;
        font-size: 18px;
    }
</style>
<div class="itemH menu"><a href="index.php?id=1">Trang chủ</a>
</div>
<div class="itemH booking"><a href="index.php?id=2">Book</a></div>
<?php
    if(!isset($_SESSION['cart']))
        $quantity = 0;
    else
        $quantity = sizeof($_SESSION['cart']);
    if(isset($_SESSION['user_id'])) {
        echo "<div class='itemH cart'><a href='index.php?cart'>Giỏ hàng</a>
                <div class='quantity'>".$quantity."</div>
              </div>";
        echo "<div class='itemH information'><a href='index.php?information=1'>Thông tin cá nhân</a></div>";
        echo "<div class='itemH logout'><a href='index.php?id=3'>Log Out</a></div>";
    }
?>
