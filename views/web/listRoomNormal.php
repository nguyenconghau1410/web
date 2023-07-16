<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $rooms = $connect->getTheRoomOfNumber();
    $quantity = $rooms->fetch_assoc();
    $buttons = $quantity['count'] / 6 + 1;
    $limit = 6; $offset = 0;
    if(isset($_POST['page'])) $offset = ($_POST['page'] - 1) * $limit;
    $records = $connect->getPagingRoom($limit, $offset);
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
                    <button class="btn btn-about" onclick="onclick()">Đặt ngay</button>
                    <button class="btn btn-cart"><i class="ti-shopping-cart"></i></button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="paging">
        <?php 
            for($i = 1; $i <= $buttons; $i++) {
        ?>
                <form action="" method="POST">
                    <input type="hidden" name="page" value="<?= $i ?>">
                    <button class="paging-btn"><?= $i; ?></button>
                </form>
        <?php
            }
        ?>
    </div>
</div>
<?php require_once("checkButtons.php") ?>


