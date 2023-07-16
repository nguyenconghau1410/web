<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $records = $connect->getRooms();
    $result = $records->fetch_assoc();
    $buttons = $result['count'] / 10 + 1;
    $limit = 10; $offset = 0;
    if(isset($_POST['page'])) $offset = ($_POST['page'] - 1) * $limit;
    $records = $connect->getRoomsByButtons($limit, $offset);
?>


<style>
    .paging {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 30px;
    }
</style>
<table id="customers">
    <input class="search-ad" type="search" >
    <button id="btnInsert" class="btn" onclick="clickInsert()">Thêm phòng</button>
    <button id="btnEdit" class="btn edit" onclick="clickEdit()">Chỉnh sửa</button>
    <button id="btnDelete" class="btn delete" onclick="">Xóa</button>
    <tr>
        <th><input type="checkbox" id="selectAll" onclick="clickBtn()"></th>
        <th>Room Name</th>
        <th>Type Room</th>
        <th>Quantity Room</th>
        <th>Price</th>
    </tr>
    <?php foreach($records as $record): ?>
        <tr>
            <td><input type="checkbox" class="checkbox" value="<?= $record['NameRoom'] ?>"></td>
            <td><?= $record['NameRoom'] ?></td>
            <td><?= $record['NameType'] ?></td>
            <td><?= $record['NameQuantity'] ?></td>
            <td><?= $record['Price'] ?></td>
        </tr>
    <?php endforeach; ?> 
</table>

<div class="paging">
        <?php
            if($buttons != 1) {
                for($i = 1; $i <= $buttons; $i++) {
        ?>
                    <form action="" method="POST">
                        <input type="hidden" name="page" value="<?= $i ?>">
                        <button class="paging-btn"><?= $i; ?></button>
                    </form>
        <?php
                }
            }
        ?>
    </div>

