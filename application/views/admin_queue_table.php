<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--<table style="width:100%" border="1">
  <tr>
    <th>รหัสการจอง</th>
    <th>รหัสลูกค้า</th>
    <th>รหัสช่าง</th>
    <th>ปี</th>
    <th>เดือน</th>
    <th>วัน</th>
    <th>รอบ</th>
  </tr>
  <?php
  //foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
  ?>
    <tr>
      <td><?php //echo $row->BK_ID; ?></td>
      <td><?php //echo $row->C_ID; ?></td>
      <td><?php //echo $row->B_ID; ?></td>
      <td><?php //echo $row->BK_Year; ?></td>
      <td><?php //echo $row->BK_Month; ?></td>
      <td><?php //echo $row->BK_Day; ?></td>
      <td><?php //echo $row->ST_Time; ?></td>
      <br />
    </tr> -->

  <?php
  //}
  ?>
  
  <div class="container-table">
    <div class="header-barber-queue">Your entire queue table</div>
    <div class="table-barber-queue">
      <table class="barber-queue" cellspacing="0">
        <tr class="tr-barber-queue">
          <th class="th-barber-queue">รูป</th>
          <th class="th-barber-queue">ชื่อเล่น</th>
          <th class="th-barber-queue">เบอร์โทร</th>
          <th class="th-barber-queue">วันที่</th>
          <th class="th-barber-queue">เวลา</th>
          <th class="th-barber-queue">สถานะ</th>
          <th class="th-barber-queue status-queue">ชำระเงินแล้ว</th>
          <th class="th-barber-queue status-queue">ยกเลิก</th>
        </tr>
        <?php
        foreach ($BOOKING as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
        ?>
          <tr class="tr-barber-queue">
            <td class="td-barber-queue">
              <img class="img-barber-queue" src="https://unsplash.com/photos/rDEOVtE7vOs" alt="" />
            </td>
            <td class="td-barber-queue">Noch</td>
            <td class="td-barber-queue">0651134910</td>
            <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
            <td class="td-barber-queue"><?php echo $row->ST_Time; ?></td>
            <td class="td-barber-queue">Waiting</td>
            <td class="td-barber-queue">
              <a class="queue-complete" href="#"><i class="fas fa-check-square"></i></a>
            </td>
            <td class="td-barber-queue">
              <a class="queue-cancel" href="#"><i class="fas fa-window-close"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>