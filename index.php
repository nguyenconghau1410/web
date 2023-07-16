<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/web/css/main.css">
    <link rel="stylesheet" href="template/web/css/cart.css">
    <title>LETOH Hotel</title>
    <link rel="stylesheet" href="template/web/themify-icons/themify-icons.css">
</head>
<style>
    .header {
        left: 0;
    }
    .itemH a {
        color: #fff;
    }
    .formSearchDate {
        display: inherit;
        color: #fff;
    }
    .lookFor {
        margin: 0 16px;
    }
    #btnDate {
        color: #fff;
        background-color: rgba(1, 1, 1, 0.647);
    }
    .left-bar a{
        color: #fff;

    }
</style>
<body>
    <div class="container">
        <div class="header">
            <div class="header-logo">
                <?php include("views/web/header-logo.php"); ?>
            </div>
            <div class="header-item">
                <?php include("views/web/header-item.php"); ?>
            </div>
            <div class="header-login">
                <?php include("views/web/header-login.php"); ?>
            </div>

        </div>
        <div class="body-container">
            <?php 
                if(!isset($_GET['cart']) && !isset($_GET['information'])) {
            ?>
                <div class="search-box">
                    <?php include("views/web/looking-for.php") ?>
                </div>
                <div class="body-item">
                    <div class="trending-room">
                        <?php
                            $id = $_GET['id'];
                            switch($id) {
                                case 2:
                                    if(isset($_GET['typeID']) && isset($_GET['roomID'])) {
                                        if(!isset($_GET['checkin']) || !isset($_GET['checkout']))
                                            include("views/web/listRoom.php");
                                        else {
                                            include("views/web/listRoomByTime.php");
                                            include("controller/web/addCart.php");
                                        }
                                    }
                                    else if(isset($_GET['name'])) include("controller/web/control-url.php");
                                    else if(isset($_GET['action'])) {
                                        include("controller/web/addBook.php");
                                        include("views/web/bookRoom.php");
                                    }
                                    else {
                                        include("views/web/listRoomNormal.php");
                                    }
                                    break;
                                case 3:
                                    session_unset();
                                    header("Location: http://localhost/HOTEL/"); 
                                    break;
                            }
                        ?>                 
                    </div>
                </div>
            <?php 
                } else if(isset($_GET['information'])) {
                    include("views/web/information.php");
                }
                else {
                    include("views/web/cart.php");
                }
            ?>
            
        </div>
    </div>
    <script type="module" src="template/web/scripts/main.js"></script>
</body>


</html>