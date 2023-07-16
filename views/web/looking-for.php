<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $styles = $connect->getStyleType();
    $categories = $connect->getQuantiyRoom();
?>
<div class="search-item">
    <form action="index.php">
        <input type="hidden" name="id" value="2">
        <select name="typeID" id="" class="search">
            <option value="#">Chọn phong cách cách phòng</option>
            <?php foreach($styles as $style): ?>
                <option value="<?= $style['ID'] ?>"><?= $style['NameType'] ?></option>
            <?php endforeach; ?>
        </select>
        <select name="roomID" id="" class="search">
            <option value="#">Chọn số lượng người</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['ID'] ?>"><?= $category['NameQuantity'] ?></option>
            <?php endforeach; ?> 
        </select>
        <button class="search-btn"><i class="ti-search"></i></button>
    </form>
</div>