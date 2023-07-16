<?php 
    if(!isset($_SESSION['book'])) $_SESSION['book'] = [];
    $type = ["Standart", "Superior", "Deluxe", "Royal Suite Room", "Connect Room"];
    $quantity = ["Single bedroom", "Twin", "Double bedroom", "Triple bedroom", "Quad bedroom", "Connecting Room (VIP)"];
    if(isset($_POST['addbook']) && $_POST['addbook'] == 1) {
        $img = $_POST['img'];
        $name = $_POST['NameRoom'];
        $price = $_POST['Price'];
        $typeID = $_POST['TypeID'];
        $roomID = $_POST['RoomID'];
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $bookDate = $_POST['bookdate'];
        $record = [$img, $name, $price, $type[$typeID], $quantity[$roomID], $checkin, $checkout, $bookDate];
        $_SESSION['book'] =  $record;
    }

?>