<style>
    .detail {
        width: calc(100% / 1.2);
        background-color: #fff;
        border-radius: 10px;
    }
    .dl {
        display: inline-block;
    }
    .detail .img {
        width: 50%;
        height: 70%;
        margin-left: 16px;
        margin-top: 20px;
    }
    .information-room {
        margin-left: 16px;
    }
    .information-room p, span, h2 {
        margin-bottom: 24px;
    }
    .detail h1 {
        margin-top: 10px;
        text-align: center;
    }
    .btn {
        font-size: 20px;
        background-color: $fff;
        padding: 8px 8px;
        border-radius: 10px;
        margin-top: 10px;
        margin-left: 20px;
    }

</style>
<?php
    require_once("controller/control_form.php");
    $connect = new control_form(); 
    if(isset($_POST['booked']) && $_POST['booked'] == 1) {
        $book = [$_SESSION['Username'],
                 $_SESSION['Fullname'],
                 $_SESSION['book'][5], $_SESSION['book'][6],
                 $_SESSION['book'][7], 1, 1, 10 / 100 * $_SESSION['book'][2],
                 $_SESSION['book'][1]];
        $detailBook = [$_SESSION['Username'],
                       $_SESSION['book'][1], $_SESSION['book'][2]];
        $connect->insertBook($book);
        $connect->insertDetailBook($detailBook);
        unset($_SESSION['book']);
    }
?>
<div class="detail">
    <h1>Chi tiết đặt phòng</h2>
    <?php if(isset($_SESSION['book'])) { ?>
        <img class="dl img" src="<?php echo $_SESSION['book'][0] ?>" alt="">
        <div class="dl information-room">
            <h2><?php echo $_SESSION['book'][1] ?></h2>
            <p>Price: <?php echo $_SESSION['book'][2] ?></p>
            <p>Thể loại: <?php echo $_SESSION['book'][3] ?></p>
            <p>Không gian: <?php echo $_SESSION['book'][4] ?></p>
            <p>Ngày đặt: <?php echo $_SESSION['book'][5] ?></p>
            <span>Checkin: <?php echo $_SESSION['book'][6] ?></span> //
            <span>Checkout: <?php echo $_SESSION['book'][7] ?></span>
        </div>
    <?php } ?>
    <form action="" method="POST">
        <input type="hidden" name="booked" value="1">
        <button class="btn btn-about">Đặt ngay</button>
    </form>
</div>
