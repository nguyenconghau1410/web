<?php 
    session_start();
    include("controller/login/permission.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý khách sạn</title>
    <link rel="stylesheet" href="template/admin/css/style.css">
    <link rel="stylesheet" href="template/admin/css/insertForm.css">
    <link rel="stylesheet" href="template/admin/font/themify-icons/themify-icons.css">
</head>
<style>
    .btn {
        background-color: steelblue;
        display: inline-block;
        padding: 4px 8px;
        border-radius: 8px;
        margin-left: 16px;
        margin-top: 8px;
        margin-bottom: 8px;
        color: #fff;
    }
    .edit {
        background-color: yellowgreen;
    }
    .delete {
        background-color: red;
    }
    .search-ad {
        display: block;
        padding: 8px 16px;
        border-radius: 10px;
        width: calc(100% / 1.2);
        margin-left: 16px;
        margin-top: 8px;
        margin-bottom: 8px;
    }
</style>
<body>
    <div>
        <div class="header">
            <?php include("views/admin/header.php") ?>
        </div>
        <div style="background-color: rgb(170, 211, 255); height: 100px;"></div>
        <div class="body">
            <?php include("views/admin/body.php") ?>
            <div class="center">
                
            <div class="container">
                <?php 
                    if(isset($_GET['type']) && isset($_GET['action'])) {
                        $action = $_GET['action'];
                        if($action == "insert") {
                            include("views/admin/formInsert.php");
                        }
                        else {
                            include("views/admin/formEdit.php");
                        }
                    }
                    else if(isset($_GET['type'])) {
                        include('controller/admin/control-url.php');
                    }

                ?>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    //Click all checkbox
    const selectAllCheckbox = document.getElementById('selectAll');
    const checkboxes = document.getElementsByClassName('checkbox');
    var value = null;
    function clickBtn() {
        for(let i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = selectAllCheckbox.checked;
        }
    }

    //click button to change URL
    function clickInsert() {
        window.location.href = "admin.php?type=4&action=insert";
    }

    function clickEdit() {
        var count = 0;
        for(let i = 0; i < checkboxes.length; i++) {
            if(checkboxes[i].checked) {
                ++count;
                value = checkboxes[i].value;
            }
            if(count == 2) {
                alert("Editing is only clicked a checkbox button")
                break;
            }
        }
        if(count == 1) {
            window.location.href = "admin.php?type=4&action=edit&name=" + value;
        }
    }
    

    //call api doPost
    $(document).ready(function() {
        $('#btnInsertRoom').on('click', function(e) {
            e.preventDefault();
            var data = {};
            var formData = $('#formInsert').serializeArray();
            $.each(formData, function(i, v) {
                data[""+v.name+""] = v.value;
            });
            $.ajax({
                url: 'controller/api/room.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                dataType: 'json',
                success: function (result) {
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Thêm phòng thành công");
                },
                error: function(error) {
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Thêm phòng thất bại");
                }
            });
        });
    });

    //call api doPut
    $(document).ready(function() {
        $('#btnEditRoom').on('click', function(e) {
            e.preventDefault();
            var data = {};
            var formData = $('#formInsert').serializeArray();
            $.each(formData, function(i, v) {
                data[""+v.name+""] = v.value;
            });
            $.ajax({
                url: 'controller/api/room.php',
                type: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(data),
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Update thành công");
                },
                error: function(error) {
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Update thất bại");
                }
            });
        });
    });
    //call api doDelete
    $(document).ready(function() {
        $('#btnDelete').on('click', function(e) {
            e.preventDefault();
            var data = [];
            for(let i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].checked) {
                    data.push(checkboxes[i].value);
                }
            }
            if(data.length == 0) return;
            var jsondata = {"rooms" : data};
            $.ajax({
                url: 'controller/api/room.php',
                type: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify(jsondata),
                success: function (result) {
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Xóa phòng thành công");
                },
                error: function(error) {
                    window.location.href = "http://localhost/HOTEL/admin.php?type=4";
                    alert("Thất bại");
                }
            });
        });
    });

</script>
</html>