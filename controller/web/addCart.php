<?php
  if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
  $type = ["Standart", "Superior", "Deluxe", "Royal Suite Room", "Connect Room"];
  $quantity = ["Single bedroom", "Twin", "Double bedroom", "Triple bedroom", "Quad bedroom", "Connecting Room (VIP)"];
  if(isset($_POST['addcart']) && $_POST['addcart'] == "1") {
    $img = $_POST['img'];
    $name = $_POST['NameRoom'];
    $price = $_POST['Price'];
    $typeID = $_POST['TypeID'];
    $roomID = $_POST['RoomID'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $bookDate = $_POST['bookdate'];
    //checking
    $flag = 0;
    for($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
      if($_SESSION['cart'][$i][1] == $name) {
        if(convert($_SESSION['cart'][$i][5]) < convert($checkout) && convert($_SESSION['cart'][$i][6]) > convert($checkin)) {
          $flag = 1;
          break;
        }
        else if(convert($_SESSION['cart'][$i][5]) > convert($checkout) && convert($_SESSION['cart'][$i][6]) < convert($checkin)) {
          $flag = 1;
          break;
        }
        else if(convert($_SESSION['cart'][$i][5]) == convert($checkin) && convert($_SESSION['cart'][$i][6]) > convert($checkout)) {
          $flag = 1;
          break;
        }
      }
    }
    //add a new room in the cart
    if($flag == 0) {
      $record = [$img, $name, $price, $type[$typeID], $quantity[$roomID], $checkin, $checkout, $bookDate];
      $_SESSION['cart'][] = $record;
    }
  }

?>