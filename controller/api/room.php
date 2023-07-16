<?php
    require_once("../control_form.php");
    $connect = new control_form();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        doPost($connect);
    } else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        doPut($connect);
    } else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        doDelete($connect);
    } 



    function doPost($connect) {
        $jsonData = file_get_contents('php://input');
        $records = null;
        if(!empty($jsonData)) {
            $records = json_decode($jsonData, true);
            if(!empty($records)) {
                $connect->insertRoom($records);
                echo $jsonData;
            }
        }
    }

    function doPut($connect) {
        $jsonData = file_get_contents('php://input');
        $records = null;
        if(!empty($jsonData)) {
            $records = json_decode($jsonData, true);
            if(!empty($records)) {
                $connect->updateRoom($records);
                echo $jsonData;
            }
        }
    }

    function doDelete($connect) {
        $jsonData = file_get_contents('php://input');
        $records = null;
        if(!empty($jsonData)) {
            $records = json_decode($jsonData, true);
            if(!empty($records)) {
                foreach($records['rooms'] as $record) {
                    $connect->deleteRoom($record);
                }
            }
        }
    }

?>