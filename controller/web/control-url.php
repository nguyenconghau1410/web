<?php 
    if(isset($_GET['name'])) {
        $temp = $_GET['name'];
        $result = str_replace('%20', '', $temp);
        
        require_once("controller/control_form.php");
        $connect = new control_form();
        $records = $connect->getRoomByName($result);

        while($row = $records->fetch_assoc()) {
            if($row['NameRoom'] == $result) {
                include("views/web/detailRoom.php");
            }
        }
    }
?>