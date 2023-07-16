<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $typeID = $connect->getStyleType();
    $roomID = $connect->getQuantiyRoom();
    $records = null;
    if(isset($_GET['name'])) {
        $name = $_GET['name'];
        $result = str_replace('%20', '', $name);
        $records = $connect->getRoomByName($result);
    }
    $set = $records->fetch_assoc();
?>
<style>
    .formSubmit h1 {
        text-align: center;
        margin-bottom: 16px;
    }
</style>
<div class="insert-data" id="displayInsert">
    <form id="formInsert" class="formSubmit"  action="" method="POST">
        <h1>Chỉnh sửa phòng</h1>
        <input type="text" placeholder="Tên phòng" name="NameRoom" class="display" value="<?php echo $set['NameRoom'] ?>">
        <select name="TypeID" id="" class="display">
           <option value="">Chọn phong cách cách phòng</option>
            <?php foreach($typeID as $type): ?>
                <?php if($type['ID'] == $set['TypeID']): ?>
                    <option value="<?= $type['ID'] ?>" selected='selected'><?= $type['NameType'] ?></option>
                <?php else: ?>
                    <option value="<?= $type['ID'] ?>"><?= $type['NameType'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <select name="RoomID" id="" class="display">
           <option value="">Chọn số lượng người trong phòng</option>
           <?php foreach($roomID as $quantity): ?>
                <?php if($quantity['ID'] == $set['RoomID']): ?>
                    <option value="<?= $quantity['ID'] ?>" selected='selected'><?= $quantity['NameQuantity'] ?></option>
                <?php else: ?>
                    <option value="<?= $quantity['ID'] ?>"><?= $quantity['NameQuantity'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select> 
        <input type="number" name="Price" placeholder="Giá phòng" class="display" value="<?php echo $set['Price'] ?>">
        <input type="text" name="Image" placeholder="Hình ảnh" class="display" value="<?php echo $set['Image'] ?>">
        <input type="number" name="VIP" placeholder="VIP" class="display" value="<?php echo $set['VIP'] ?>">
        <input type="hidden" name="Room" value="<?php echo $set['NameRoom'] ?>">
        <button id="btnEditRoom">Submit</button>
    </form>
</div>
