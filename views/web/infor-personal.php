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
      <h2 class="cart-title">Thông tin cá nhân</h2>
    </div>
    <ul class="cart-items">
        <li class="cart-item">
            <div class="name-item">Tên tài khoản : <?php echo $_SESSION['Username'] ?> </div>
        </li>
        <li class="cart-item">
            <div class="name-item">Tên người dùng : <?php echo $_SESSION['Fullname'] ?> </div>
        </li>
        <li class="cart-item">
            <div class="name-item">Số điện thoại : <?php echo $_SESSION['Phonenumber'] ?> </div>
        </li>
        <li class="cart-item">
            <div class="name-item">Ngày sinh : <?php echo $_SESSION['Dateofbirth'] ?></div>
        </li>
    </ul> 
  </div>