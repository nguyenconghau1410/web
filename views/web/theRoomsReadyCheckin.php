<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getBooked($_SESSION['Username']);

    if(isset($_POST['delete'])) {
        $del = $_POST['delete'];
        $connect->updateStatus($del);
    }
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
      <h2 class="cart-title">Phòng chuẩn bị checkin</h2>
    </div>
    <ul class="cart-items">
        <li class="cart-item">
            <h3>Tên người dùng : <?php echo $_SESSION['Fullname'] ?></h3>
        </li>
        <?php foreach($records as $record): ?>
            <li class="cart-item">
                <div class="cart-item-details">
                    <h3 class="cart-item-title">Tên các phòng : <?=  $record['Rooms'] ?></h3>
                    <h3>Tổng giá : <?= $record['Deposit'] * 10 ?></h3>
                    <span class="cart-item-price">Trả trước : <?= $record['Deposit'] ?>//</span>
                    <span>Checkin : <?= $record['Checkin'] ?>//</span>
                    <span>Checkout: <?= $record['Checkout'] ?>//</span>
                    <span>Checkout: <?= $record['BookDate'] ?></span>
                </div>
                <form action="" method="POST">
                  <input type="hidden" name="delete" value="<?= $record['ID'] ?>">
                  <button class="btnDelete">Hủy</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul> 
  </div>