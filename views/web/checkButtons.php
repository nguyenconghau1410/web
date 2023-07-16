<?php
    if(!isset($_SESSION['Username'])) {
        echo "<script>
                var buttons = document.getElementsByClassName('btn');
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].addEventListener('click', function() {
                        alert('Hãy đăng nhập để đặt phòng');
                    });
                }
            </script>";
    }
    else {
        echo "<script>
                var buttons = document.getElementsByClassName('btn');
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].addEventListener('click', function() {
                        alert('Hãy chọn thể loại phòng cần tìm và chọn ngày giờ đặt');
                    });
                }
            </script>";
    }
?>