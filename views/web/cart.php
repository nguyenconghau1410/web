<?php 
  if(isset($_POST['delete'])) {
    $value = $_POST['delete'];
    $array = explode(",", $value);
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      if(checkArray($array, $_SESSION['cart'][$i])) {
        unset($_SESSION['cart'][$i]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        break;
      }
    }
  }

  if(isset($_POST['buyAll']) && isset($_SESSION['cart'])) {
    require_once("controller/control_form.php");
    $connect = new control_form();
    $deposit = 0;
    $rooms = "";
    $flag = false;
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      $deposit += 10 / 100 * $_SESSION['cart'][$i][2];
      if($i != sizeof($_SESSION['cart']) - 1) {
        $rooms .= $_SESSION['cart'][$i][1] . ',';
      }
      else
        $rooms .= $_SESSION['cart'][$i][1];
    }
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      $status = 1;
      
      $detailBook = [$_SESSION['Username'],
                     $_SESSION['cart'][$i][1],
                     $_SESSION['cart'][$i][2]];
      if(!$flag) {
        $book = [$_SESSION['Username'],
               $_SESSION['Fullname'],
               $_SESSION['cart'][$i][5],
               $_SESSION['cart'][$i][6],
               $_SESSION['cart'][$i][7],
               $status, sizeof($_SESSION['cart']), $deposit, $rooms
              ];
        $connect->insertBook($book);
        $flag = true;
      }
      $connect->insertDetailBook($detailBook);
    }
    unset($_SESSION['cart']);
  }
  function checkArray($arr1, $arr2) {
    for($i = 0; $i < 6; $i++) {
      if($arr1[$i] != $arr2[$i]) return false;
    }
    return true;
  }
  $sum = 0;
  if(!isset($_SESSION['cart']))
    $count = 0;
  else {
    $count = sizeof($_SESSION['cart']);
  }
  function showCart() {
    global $sum;
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
      for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        $tmp = ((strtotime($_SESSION['cart'][$i][6]) - strtotime($_SESSION['cart'][$i][5])) / 86400);
        $sum += $_SESSION['cart'][$i][2] * $tmp;
        $temp = "";
        for($j = 0; $j < 6; $j++) {
          $temp .= $_SESSION['cart'][$i][$j] . ',';
        }
        echo '<li class="cart-item">
                <img src="'.$_SESSION['cart'][$i][0].'" alt="Product 1">
                <div class="cart-item-details">
                  <h3 class="cart-item-title">'.$_SESSION['cart'][$i][1].'</h3>
                  <span class="cart-item-price">'.$_SESSION['cart'][$i][2].'</span>
                  <div>Là loại phòng '.$_SESSION['cart'][$i][3].', số lượng người ở là '.$_SESSION['cart'][$i][4].'</div>
                  <div>Ngày ở: '.$_SESSION['cart'][$i][5].' - '.$_SESSION['cart'][$i][6].'</div>
                </div>
                <form action="index.php?cart" method="POST">
                  <input type="hidden" name="delete" value="'.$temp.'">
                  <button class="btnDelete">Delete</button>
                </form>
              </li>';
      }
    }
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
</style>
  <div class="cart-container">
    <div class="cart-header">
      <h2 class="cart-title">Thông tin đặt phòng</h2>
      <span class="cart-count"><?php echo $count ?> phòng</span>
    </div>
    <ul class="cart-items">
      <?php showCart(); ?>
    </ul> 
    <div class="cart-total">
        <p class="cart-total-text">Tổng cộng:</p>
        <p class="cart-total-price"><?php echo $sum ?> VNĐ</p>
        <form action="index.php?cart" method="POST">
          <input type="hidden" name="buyAll" value="1">
          <button id="btnBuy">Book</button>
        </form>
    </div>
  </div>
