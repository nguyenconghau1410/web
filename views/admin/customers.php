<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getOrders();
?>
<table id="customers">
    <input class="search-ad" type="search" >
    <button id="btnDelete" class="btn delete" onclick="">Xóa</button>
    <tr>
        <th><input type="checkbox" id="selectAll"></th>
        <th>Username</th>
        <th>Fullname</th>
        <th>Phone Number</th>
        <th>Date Of Birth</th>
    </tr>
    <?php foreach($records as $record): ?>
        <tr>
            <td><input type="checkbox" class="checkbox"></td>
            <td><?= $record['Username'] ?></td>
            <td><?= $record['Fullname'] ?></td>
            <td><?= $record['Phonenumber'] ?></td>
            <td><?= $record['Dateofbirth'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
