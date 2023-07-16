<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $typeID = (int)$_GET['typeID'];
    $roomID = (int)$_GET['roomID'];
    $count = $connect->getCountRoomByID($typeID, $roomID);
    $count = $count->fetch_assoc();
    $buttons = $count['count'] / 6 + 1;
    if($count['count'] % 6 == 0) $buttons = $count['count'] / 6;
    $limit = 6; $offset = 0;
    if(isset($_POST['page'])) $offset = ($_POST['page'] - 1) * $limit;
    $records = $connect->getRoomsByID($typeID, $roomID, $limit, $offset);
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
                <a href="/HOTEL/index.php?id=2&name=<?php echo $record['NameRoom']?>">
                    <img class="room-img" src="<?= $record['Image'] ?>" alt="">
                </a>
                <div class="title-room">
                    <?= $record['NameRoom'] ?>
                </div>
                <div class="room-title-about">
                   Price : <?= $record['Price'] ?>
                </div>
                <div class="room-btn-container">
                    <a href=""><button class="btn btn-about">Đặt ngay</button></a>
                    <a href=""><button class="btn btn-cart"><i class="ti-shopping-cart"></i></button></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="paging">
        <?php
            if($buttons != 1) {
                for($i = 1; $i <= $buttons; $i++) {
        ?>
                    <form action="" method="POST">
                        <input type="hidden" name="page" value="<?= $i ?>">
                        <button class="paging-btn"><?= $i; ?></button>
                    </form>
        <?php
                }
            }
        ?>
    </div>
</div>
<?php require_once("checkButtons.php") ?>


