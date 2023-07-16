<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getCustomers();
?>
<table id="customers">
    <input class="search-ad" type="search" >
    <button id="btnDelete" class="btn delete" onclick="">Xóa</button>
    <tr>
        <th><input type="checkbox" id="selectAll"></th>
        <th>ID</th>
        <th>Username</th>
        <th>CheckIn</th>
        <th>CheckOut</th>
        <th>Book Date</th>
        <th>Status</th>
        <th>Quantity</th>
        <th>Deposit</th>
        <th>Rooms</th>
    </tr>
    <?php foreach($records as $record): ?>
        <tr>
            <td><input type="checkbox" class="checkbox"></td>
            <td><?= $record['ID'] ?></td>
            <td><?= $record['Name'] ?></td>
            <td><?= $record['Checkin'] ?></td>
            <td><?= $record['Checkout'] ?></td>
            <td><?= $record['BookDate'] ?></td>
            <td><?= $record['Status'] ?></td>
            <td><?= $record['Quantity'] ?></td>
            <td><?= $record['Deposit'] ?></td>
            <td><?= $record['Rooms'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
