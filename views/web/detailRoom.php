<style>
    .detail {
        width: calc(100% / 1.5);
        background-color: #fff;
        border-radius: 10px;
    }
    .dl {
        display: inline-block;
    }
    .detail .img {
        width: 80%;
        height: 50%;
    }
    .information-room {
        float: right;
    }
</style>
<div class="detail">
    <h1>Chi tiết phòng</h2>
    <img class="dl img" src="<?php echo $row['Image'] ?>" alt="">
    <div class="dl infomation-room">
        <span><?php echo $row['NameRoom'] ?></span>
        <span><?php echo $row['DescriptionRole'] ?></span>
        <span><?php echo $row['DescriptionRoom'] ?></span>
        <span><?php echo $row['Price'] ?></span>
    </div>
</div>