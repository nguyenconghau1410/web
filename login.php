<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="template/login/css/style.css">
    <style>
        .warning {
            color: #fff;
            margin-top: 16px;
            font-size: 24px;
        }
        .note {
            font-size: 16px;
        }
        .notify {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form open">
            <div class="title"> Login</div>
            <form class="form" action="?credential=log-in" method="POST">
                <input type="text" name="userName" placeholder="Nhập Tên Người Dùng">
                <input type="password" name="password" placeholder="Nhập Mật Khẩu">
                <button>Đăng Nhập</button>
                <div class="sign-up"> Đăng Ký</div>
                <div id="displayNote"></div>
                <?php include("controller/login/control-login.php"); ?>
            </form>
        </div>
        <div class="sign-up-form">
            <div class="title"> Sign Up</div>
            <form class="form" id="formSubmit" action="" method="POST">
                <input class="mg-20" id="userName" type="text" name="userName" placeholder="Nhập Tên Người Dùng">
                <div id="note" class="note"></div>
                <input class="mg-20" type="password" name="password" placeholder="Nhập Mật Khẩu">
                <input class="mg-20" type="text" name="fullName" placeholder="Nhập họ tên">
                <input class="mg-20" type="number" name="phoneNumber" placeholder="Nhập số điện thoại">
                <input class="mg-20" type="date" name="dateOfBirth" placeholder="Ngày tháng năm sinh">
                <button id="btnSignUp">Đăng ký</button>
            </form>
        </div>
    </div>


</body>
<script src="template/login/js/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userName').on('keyup', function() {
            var username = $(this).val();
            $.ajax({
                url: 'controller/login/checkUsername.php',
                type: 'POST',
                data: { userName: username },
                success: function(response) {
                    if(response == "Tên tài khoản hợp lệ") {
                        document.querySelector('.note').style.color = "white ";
                    }
                    else {
                        document.querySelector('.note').style.color = "red";
                    }
                    $('#note').text(response);
                }
            });
        });
    });

    $(document).ready(function() {
        $('#btnSignUp').on('click', function(e) {
            e.preventDefault();
            var data = {};
            var formData = $('#formSubmit').serializeArray();
            $.each(formData, function(i, v) {
                data[""+v.name+""] = v.value;
            });
            console.log(data);
            $.ajax({
                url: 'controller/login/sign-up.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                dataType: 'json',
                success: function (result) {
                    window.location.href = "http://localhost/HOTEL/login.php?notify=success";
                },
                error: function(error) {
                    window.location.href = "http://localhost/HOTEL/login.php?notify=error";
                }
            });
        });
    });

</script>

</html>