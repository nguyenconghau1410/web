<?php
    require_once("../control_form.php");
    $connect = new control_form();
    $records = null;
    $jsonData = file_get_contents('php://input');
    if(!empty($jsonData)) {
        $records = json_decode($jsonData, true);
        if(!empty($records)) {
            $connect->insertAccount($records);
            echo $jsonData;
        }
        else {
            echo "error";
        }
    }
?>