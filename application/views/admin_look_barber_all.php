<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

  <div class="container-table">
    <div class="header-barber-queue">Your entire queue table</div>
    <center><?php echo anchor('UserManagement_Con/create_barber', 'เพิ่มช่างตัดผม') ?></center>
    <div class="table-barber-queue">
      <table class="barber-queue" cellspacing="0">
        <tr class="tr-barber-queue">
          <th class="th-barber-queue">รูป</th>
          <th class="th-barber-queue">ชื่อเล่น</th>
          <th class="th-barber-queue">ชื่อจริง</th>
          <th class="th-barber-queue">นามสกุล</th>
          <th class="th-barber-queue">เบอร์</th>
          <th class="th-barber-queue">ที่อยู่</th>
          <th class="th-barber-queue status-queue">แก้ไข</th>
          <th class="th-barber-queue status-queue">ลบ</th>
        </tr>
        <?php
        foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
        ?>
          <tr class="tr-barber-queue">
            <td class="td-barber-queue">
              <img class="img-barber-queue" src="https://unsplash.com/photos/rDEOVtE7vOs" alt="" />
            </td>
            <td class="td-barber-queue"><?php echo $row->B_Nickname; ?></td>
            <td class="td-barber-queue"><?php echo $row->B_Name; ?></td>
            <td class="td-barber-queue"><?php echo $row->B_Lname; ?></td>
            <td class="td-barber-queue"><?php echo $row->B_Phone; ?></td>
            <td class="td-barber-queue"><?php echo $row->B_Address; ?></td>
            <td class="td-barber-queue">
              <a class="queue-edit" href="<?php echo site_url('UserManagement_Con/admin_editbarber/'.$row->B_ID); ?>"><i class="fas fa-pen-square"></i></i></a>
            </td>
            <td class="td-barber-queue">
              <a class="queue-cancel" href="<?php echo site_url('UserManagement_Con/del_barber/'.$row->B_ID); ?>"><i class="fas fa-window-close"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </div>