<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getBookedPersonal($_SESSION['Username']);
?>

<style>
    li .btnDelete {
        float: right;
        font-size: 12px;
        background-color: #e74c3c;
        padding: 8px 8px;
        border-radius: 10px;
    }
    .cart-total #btnBuy {
        font-size: 20px;
        background-color: #fff;
        padding: 8px 8px;
        border-radius: 10px;
    }
    .cart-item {
        margin-left: 32px;
    }
    .cart-title {
        font-size: 32px;
    }
</style>
  <div class="cart-container">
    <div class="cart-header">
      <h2 class="cart-title">Lịch sử đặt phòng trong tháng này</h2>
    </div>
    <ul class="cart-items">
        <li class="cart-item">
            <h3>Tên người dùng : <?php echo $_SESSION['Fullname'] ?></h3>
        </li>
        <?php foreach($records as $record): ?>
            <li class="cart-item">
                <div class="cart-item-details">
                    <h3 class="cart-item-title">Tên các phòng : <?=  $record['Rooms'] ?></h3>
                    <span class="cart-item-price">Tổng giá : <?= $record['Deposit'] * 10 ?>//</span>
                    <span>Checkin : <?= $record['Checkin'] ?>//</span>
                    <span>Checkout: <?= $record['Checkout'] ?>//</span>
                    <span>BookDate : <?= $record['BookDate'] ?></span>
                </div>
            </li>
        <?php endforeach; ?>
    </ul> 
  </div>