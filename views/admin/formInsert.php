<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $typeID = $connect->getStyleType();
    $roomID = $connect->getQuantiyRoom();
?>
<style>
    .formSubmit h1 {
        text-align: center;
        margin-bottom: 16px;
    }
</style>
<div class="insert-data" id="displayInsert">
    <form id="formInsert" class="formSubmit" action="" method="POST">
        <h1>Thêm phòng</h1>
        <input type="text" placeholder="Tên phòng" name="NameRoom" class="display">
        <select name="TypeID" id="" class="display">
           <option value="">Chọn phong cách cách phòng</option>
           <?php foreach($typeID as $type): ?>
                <option value="<?= $type['ID'] ?>"><?= $type['NameType'] ?></option>
            <?php endforeach; ?>
        </select>
        <select name="RoomID" id="" class="display">
           <option value="">Chọn số lượng người trong phòng</option>
            <?php foreach($roomID as $quantity): ?>
                <option value="<?= $quantity['ID'] ?>"><?= $quantity['NameQuantity'] ?></option>
            <?php endforeach; ?>
        </select> 
        <input type="number" name="Price" placeholder="Giá phòng" class="display">
        <input type="text" name="Image" placeholder="Hình ảnh" class="display">
        <input type="number" name="VIP" placeholder="VIP" class="display">
        <button id="btnInsertRoom">Insert</button>
    </form>
</div>