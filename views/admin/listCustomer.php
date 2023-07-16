<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getCustomerRoomBookedButCanceled();
?>

<table id="customers">
    <tr>
        <th>Name</th>
        <th>Fullname</th>
        <th>BookDate</th>
        <th>Số lượng</th>
        <th>Rooms</th>
    </tr>
    <?php foreach($records as $record): ?>
        <tr>
            <td><?= $record['Name'] ?></td>
            <td><?= $record['FullName'] ?></td>
            <td><?= $record['BookDate'] ?></td>
            <td><?= $record['Quantity'] ?></td>
            <td><?= $record['Rooms'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>