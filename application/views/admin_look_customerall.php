<div class="container-table">
  <div class="header-barber-queue">Your entire queue table</div>
  <div class="table-barber-queue">
    <table class="barber-queue" cellspacing="0">
      <tr class="tr-barber-queue">
        <th class="th-barber-queue">รูป</th>
        <th class="th-barber-queue">รหัสลูกค้า</th>
        <th class="th-barber-queue">ชื่อผู้ใช้</th>
        <th class="th-barber-queue">ชื่อเล่น</th>
        <th class="th-barber-queue">ชื่อจริง</th>
        <th class="th-barber-queue">นามสกุล</th>
        <th class="th-barber-queue">เพศ</th>
        <th class="th-barber-queue">เบอร์โทร</th>
        <th class="th-barber-queue">เฟสบุ๊ค</th>
      </tr>
      <?php
      foreach ($CUSTOMER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
      ?>
        <tr class="tr-barber-queue">
          <td class="td-barber-queue">
            <img class="img-barber-queue" src="https://unsplash.com/photos/rDEOVtE7vOs" alt="" />
          </td>
          <td class="td-barber-queue"><?php echo $row->C_ID; ?></td>
          <td class="td-barber-queue"><?php echo $row->Username; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Nickname; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Nickname; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Sex; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
          <td class="td-barber-queue"><?php echo $row->C_Facebook; ?></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>