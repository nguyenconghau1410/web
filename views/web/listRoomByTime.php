<?php
    function convert($date) {
        $array = explode("-", $date, 3);
        $count = 0;
        $count += (int)$array[0] * 365;
        $count += (int)$array[1] * 31;
        $count += (int)$array[2];
        return $count;
    }
    require_once("controller/control_form.php");
    $connect = new control_form();
    $typeID = (int)$_GET['typeID'];
    $roomID = (int)$_GET['roomID'];
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $date = $connect->getRoomsByTime($typeID, $roomID);

    $array = array();
    $idx = 0;
    $start = convert($checkin);
    $end = convert($checkout);
    while($row = $date->fetch_assoc()) {
        if($start < convert($row['Checkout'])) {
            $array[$idx++] = $row['NameRoom'];
        }
    }

    $quantity =  $connect->getCountRoomsByConditionNameRoom($typeID, $roomID, $array);
    $quantity = $quantity->fetch_assoc();
    $count = $quantity['count'];
    $buttons = $count / 6 + 1;
    if($count % 6 == 0) $buttons = $count / 6;
    $limit = 6; $offset = 0;
    if(isset($_POST['page'])) $offset = ($_POST['page'] - 1) * $limit;
    $records = $connect->getRoomsByConditionNameRoom($typeID, $roomID, $array, $limit, $offset);
?>
<style>
    .room-btn-container a {
        color: #fff;
        text-decoration: none;
    }
    .paging {
        display: flex;
        margin: 20px 0;
    }
    .paging .paging-btn {
        width: 40px;
        height: 40px;
    }
</style>
<form action="index.php" class="formSearchDate">
    <input type="hidden" value="2" name="id">
    <input type="hidden" value="<?php echo $typeID ?>" name="typeID">
    <input type="hidden" value="<?php echo $roomID ?>" name="roomID">
    <div class="lookFor">Checkin:<input type="date" name="checkin"></div>
    <div class="lookFor">Checkout:<input type="date" name="checkout"></div>
    <button id="btnDate"><i class="ti-search"></i></button>
</form>
<div class="trending-room-container">
    <?php foreach ($records as $record): ?>
            <div class="trending-room-item">
                <div class="room room1">
                    <a href="/HOTEL/index.php?id=2&name=<?= $record['NameRoom']?>">
                        <img class="room-img" src="<?= $record['Image'] ?>" alt="">
                    </a>
                    <div class="title-room">
                        <?= $record['NameRoom'] ?>
                    </div>
                    <div class="room-title-about">
                    Price : <?= $record['Price'] ?>
                    </div>
                    <div class="room-btn-container">
                        <form action="index.php?id=2&action=book" method="POST">
                            <input type="hidden" name="img" value="<?= $record['Image'] ?>">
                            <input type="hidden" name="NameRoom" value="<?= $record['NameRoom'] ?>">
                            <input type="hidden" name="Price" value="<?= $record['Price']?>">
                            <input type="hidden" name="TypeID" value="<?= $typeID ?>">
                            <input type="hidden" name="RoomID" value="<?= $roomID?>">
                            <input type="hidden" name="checkin" value="<?= $checkin ?>">
                            <input type="hidden" name="checkout" value="<?= $checkout ?>">
                            <input type="hidden" name="bookdate" value="<?= date('Y-m-d') ?>">
                            <input type="hidden" name="addbook" value="1">
                            <button class="btn btn-about">Đặt ngay</button>
                        </form>
                        <form action="" method="POST">
                            <input type="hidden" name="img" value="<?= $record['Image'] ?>">
                            <input type="hidden" name="NameRoom" value="<?= $record['NameRoom'] ?>">
                            <input type="hidden" name="Price" value="<?= $record['Price']?>">
                            <input type="hidden" name="TypeID" value="<?= $typeID ?>">
                            <input type="hidden" name="RoomID" value="<?= $roomID?>">
                            <input type="hidden" name="checkin" value="<?= $checkin ?>">
                            <input type="hidden" name="checkout" value="<?= $checkout ?>">
                            <input type="hidden" name="bookdate" value="<?= date('Y-m-d') ?>">
                            <input type="hidden" name="addcart" value="1">
                            <button class="btn btn-cart"><i class="ti-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
</div>
