<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<main>
  <div class="cards">
    <?php
    foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
    ?>
      <div class="barber-profile">
        <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>" class="menu-btn">
          <div>
            <p><?php echo $row->B_Nickname; ?></p>
            <span>14520 ฿</span>
          </div>
          <div>
            <span>
              <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
            </span>
          </div>
        </a>
      </div>
    <?php
    }
    ?>
  </div>

  <div class="recent-grid barber-income">
    <div class="projects">
      <div class="card">
        <div class="card-header">
          <h3>ช่างตัดผมในร้าน</h3>
          <div>
            <a href="<?php echo site_url('UserManagement_Con/createBarber'); ?>"><button><i class="fas fa-user-plus"></i> เพิ่มช่างตัดผม <span class="las la-arrow-right"></span></button></a>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="barber-queue">
              <thead>
                <tr class="tr-barber-queue">
                  <td></td>
                  <td class="th-barber-queue">รูป</td>
                  <td class="th-barber-queue">ชื่อเล่น</td>
                  <td class="th-barber-queue">ชื่อจริง</td>
                  <td class="th-barber-queue">นามสกุล</td>
                  <td class="th-barber-queue">เบอร์</td>
                  <td class="th-barber-queue">รายได้</td>
                  <td class="th-barber-queue">ดูคิว</td>
                  <td class="th-barber-queue">แก้ไข</td>
                  <td class="th-barber-queue del-barber">ลบ</td>
                  <td></td>
                </tr>
              </thead>
              <?php
              foreach ($BARBER as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
              ?>
                <tbody>
                  <tr class="tr-barber-queue">
                    <td></td>
                    <td class="td-barber-queue">
                      <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->B_Img; ?>" />
                    </td>
                    <td class="td-barber-queue booking-with">
                      <a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $row->B_ID; ?>">ช่าง<?php echo $row->B_Nickname; ?></a>
                    </td>
                    <td class="td-barber-queue"><?php echo $row->B_Name; ?></td>
                    <td class="td-barber-queue"><?php echo $row->B_Lname; ?></td>
                    <td class="td-barber-queue"><?php echo $row->B_Phone; ?></td>
                    <td class="td-barber-queue">
                      <a class="queue-income" href="<?php echo site_url('Admin_Con/getBarberIncome/' . $row->B_ID); ?>"><i class="fas fa-search-dollar"></i></a>
                    </td>
                    <td class="td-barber-queue">
                      <a class="queue-check" href="<?php echo site_url('Admin_Con/getBarberQueue/' . $row->B_ID); ?>"><i class="far fa-calendar-alt"></i></a>
                    </td>
                    <td class="td-barber-queue">
                      <a class="queue-edit" href="<?php echo site_url('UserManagement_Con/setBarber/' . $row->B_ID); ?>"><i class="fas fa-pen-square"></i></a>
                    </td>
                    <td class="td-barber-queue">
                      <a class="queue-cancel" href="<?php echo site_url('UserManagement_Con/deleteBarber/' . $row->B_ID); ?>" onclick="return confirm('ยืนยัน');"><i class="fas fa-window-close"></i></a>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
              <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
</main>
</div>