<main>
  <div class="cards">
    <div class="card-single">
      <div>
        <p><?php echo $DAY; ?> <strong>คิว</strong></p>
        <span>ตัดแล้วในวันนี้</span>
      </div>
      <div>
        <span>
          <i class="las la-users"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php echo $MONTH; ?> <strong>คิว</strong></p>
        <span>ตัดแล้วในเดือนนี้</span>
      </div>
      <div>
        <span>
          <i class="las la-users"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php echo $All; ?> <strong>คิว</strong></p>
        <span>ตัดแล้วทั้งหมด</span>
      </div>
      <div>
        <span>
          <i class="las la-users"></i>
        </span>
      </div>
    </div>

    <div class="card-single">
      <div>
        <p><?php
            foreach ($INCOME as $row) {
              echo $row->B_Total;
            }
            ?> <strong>฿</strong></p>
        <span>รายได้เดือนนี้</span>
      </div>
      <div>
        <span>
          <i class="las la-coins"></i>
        </span>
      </div>
    </div>

  </div>

  <div class="recent-grid barber-income">
    <div class="projects">
      <div class="card">
        <div class="card-header barber-income">
          <h3>รายละเอียดการตัดผมของ<a href="<?php echo site_url('Admin_Con/getBarberProfile/') . $ID->B_ID; ?>"><span class="span">ช่าง<?php echo $ID->B_Nickname; ?></span></a></h3>
          <div class="img-barber-profile-small">
            <img src="<?php echo base_url(); ?>img/<?php echo $ID->B_Img; ?>" alt="BarberProfile">
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
                  <td class="th-barber-queue">วันที่</td>
                  <td class="th-barber-queue">เวลา</td>
                  <td class="th-barber-queue">ราคา</td>
                  <td></td>
                </tr>
              </thead>
              <?php
              foreach ($BH as $row) {  //ทำการจนลูปโดนนำค่า $resuult ที่เก็บไว้ในตัวแปร barber แล้วทำการ as $row โดยให้ %row ดึงข้อมูลมาทีละฟิล
              ?>
                <tbody>
                  <tr class="tr-barber-queue">
                    <td></td>
                    <td class="td-barber-queue img">
                      <img class="img-barber-queue" src="<?php echo base_url(); ?>img/<?= $row->C_Img; ?>" />
                    </td>
                    <td class="td-barber-queue"><a href="<?php echo site_url('Admin_Con/getCustomerProfile/') . $row->C_ID; ?>"><?php echo $row->C_Nickname; ?></a></td>
                    <td class="td-barber-queue"><?php echo $row->C_Name; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Lname; ?></td>
                    <td class="td-barber-queue"><?php echo $row->C_Phone; ?></td>
                    <td class="td-barber-queue"><?php echo $row->BK_Day; ?> / <?php echo $row->BK_Month; ?> / <?php echo $row->BK_Year; ?></td>
                    <td class="td-barber-queue ST_ID<?php echo $row->ST_ID; ?>"><?php echo $row->ST_Time; ?></td>
                    <td class="td-barber-queue">150 ฿</td>
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