<?php
    require_once("controller/control_form.php");
    $connect = new control_form();
    $record = $connect->getMoneyBill();
    $result = $record->fetch_assoc();
    $record1 = $connect->getCountRoomBooked();
    $result1 = $record1->fetch_assoc();
    $record2 = $connect->getCountRoomBookedButCanceled();
    $result2 = $record2->fetch_assoc();
?>

<table id="customers">
    <input class="search-ad" type="search" >
  <tr>
    <td>Doanh thu tháng trước</td>
    <th><?php echo $result['sum'] ?></td>
  </tr>
  <tr>
    <td>Số phòng bị hủy </td>
    <th><?php if($result2['sum'] != null) echo $result2['sum'];
              else echo 0; ?></td>
  </tr>
  <tr>
    <td>Tổng số phòng đã đặt</td>
    <th><?php echo $result1['sum'] ?></td>
  </tr>
  <tr>
    <td>Danh sách khách hàng đã hủy phòng</td>
    <th><a href="admin.php?type=7">Click here</a></td>
  </tr>

</table>